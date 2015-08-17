<?php
namespace App\C21\Rets;

use App\Extra_Data;
use App\RecruitListing;
use App\Recruits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phrets\phRETS;


class Rets
{
    protected $rets;
    protected $rets_login_url;
    protected $rets_username;
    protected $rets_password;

    public function __construct(phRETS $rets)
    {
        $this->rets = $rets;
        $this->rets_login_url = env('Rets_Login_Url');
        $this->rets_username = env('Rets_Username');
        $this->rets_password = env('Rets_Password');

    }

    protected function connect()
    {
        $this->rets->AddHeader("RETS-Version", "RETS/1.7");
        $connect = $this->rets->Connect($this->rets_login_url, $this->rets_username, $this->rets_password);
        if ($connect) {
            return TRUE;
        } else {
            return $this->rets->Error();
        }
    }

    protected function disconnect()
    {
        $this->rets->Disconnect();
    }
    public function runOfficeProductionQuery()
    {
        if ($this->connect() == true) {
            $now = Carbon::now()->subDays(30)->format('Y-m-d\T00:00:00');
            $records = [];
            $records['listings'] = [];
            $search = $this->rets->SearchQuery('Property', 'Listing', "(ListOfficeMLSID = |CESC01,CESC02,CESC03,CESC04,CESC05,CESC07),(Status =|A,S,P),(LastChangeTimestamp = $now+)", array('Limit' => 1000));
            $records['number'] = $this->rets->TotalRecordsFound();
            while ($listing = $this->rets->FetchRow($search)) {
                array_push( $records['listings'],$listing);

            }
            return $records;
        } else {
            return false;
        }
    }
    public function runListingQuery($office,$daysBack,$timeframe)
    {
        if ($this->connect() == true) {
            $since = Carbon::now()->subDays($daysBack)->format('Y-m-d\T00:00:00');
            $end = Carbon::createFromFormat('Y-m-d\TH:i:s',$since);
            $end_date = $end->addDays($timeframe)->format('Y-m-d\T00:00:00');
            $search = $this->rets->SearchQuery('Property', 'Listing', "(ListOfficeMLSID =$office),(Status =|S),(CloseDate = $since-$end_date)", array('Limit' => 1000));
            $records = $this->rets->TotalRecordsFound();
            while ($listing = $this->rets->FetchRow($search)) {
                $args = [
                    'blc_id' => $listing['MLSNumber'],
                    'address' => $listing['StreetNumber'] . ' ' . $listing['StreetName'],
                    'city' => $listing['City'],
                    'zip' => $listing['ZipCode'],
                    'source' => 'S',
                    'selling_broker' => $listing['ListOfficeMLSID'],
                    'agent_id' => $listing['ListAgentMLSID']
                ];
                Extra_Data::updateOrCreate(['blc_id' => $listing['MLSNumber']], $args);
            }
            return $records;
        } else {
            return false;
        }
    }

    public function runBuyingQuery($office,$daysBack,$timeframe)
    {
        if ($this->connect() == true) {
            $since = Carbon::now()->subDays($daysBack)->format('Y-m-d\T00:00:00');
            $end = Carbon::createFromFormat('Y-m-d\TH:i:s',$since);
            $end_date = $end->addDays($timeframe)->format('Y-m-d\T00:00:00');
           // return $office . ' - ' . $since . ' - ' . $end_date;
            $search = $this->rets->SearchQuery('Property', 'Listing', "(SellingOfficeMLSID =$office),(Status =|S),(CloseDate = $since-$end_date)", array('Limit' => 1000));
            $records = $this->rets->TotalRecordsFound();
            while ($listing = $this->rets->FetchRow($search)) {
                while ($listing = $this->rets->FetchRow($search)) {
                    $args = [
                        'blc_id' => $listing['MLSNumber'],
                        'address' => $listing['StreetNumber'] . ' ' . $listing['StreetName'],
                        'city' => $listing['City'],
                        'zip' => $listing['ZipCode'],
                        'source' => 'B',
                        'selling_broker' => $listing['SellingOfficeMLSID'],
                        'agent_id' => $listing['SellingAgentMLSID'],
                        'closed_date' => $listing['CloseDate'],
                        'closed_price' => $listing['ClosePrice'],
                    ];
                    Extra_Data::updateOrCreate(['blc_id' => $listing['MLSNumber']], $args);
                }

            }
            return $records;
        } else {
            return false;
        }
    }

    public function runOfficeQuery()
    {
        if ($this->connect() == true) {
            $search = $this->rets->SearchQuery('Property', 'Listing', "(ListOfficeMLSID = CESC01),(Status = |A),(PropertySubType = CND)", array('Limit' => 1000));
            $records = $this->rets->TotalRecordsFound();
            while ($listing = $this->rets->FetchRow($search)) {
                while ($listing = $this->rets->FetchRow($search)) {
                    dd($listing);
                }

            }
            return $records;
        } else {
            return false;
        }
    }

    /**
     * Sync an agents data
     *
     * @param $agent_id
     * @return array|bool
     */
    public function getAgentListings($agent_id)
    {
        $numbers= [];
        $numbers['listings_taken'] = $this->checkAgentListings($agent_id, 'listing');
        $numbers['listings_sold'] = $this->checkAgentListings($agent_id, 'closed_listing');
        $numbers['buyer_sides'] = $this->checkAgentListings($agent_id, 'buyer');
        return $numbers;




    }
    public function getRecruitListings($agent_id,$recruit_id,$start = '')
    {

            $this->runAgentListings($agent_id, 'listing',$start);
            $this->runAgentListings($agent_id, 'buyer',$start);
            $recruit = Recruits::find($recruit_id);
            $recruit->synced = true;
            $recruit->save();

    }
    public function getAgentFromMls($agent_id)
    {
        if ($this->connect() == true) {
            $search = $this->rets->SearchQuery('Agent', 'Agent', "(NRDSMemberID = $agent_id)");
            $agent = $this->rets->FetchRow($search);
            return $agent;
        }else{
            return false;
        }


    }
    public function syncRecruitDataFromMls($mls_id){
        $agent = $this->getAgentFromMls($mls_id);
        $args = [
            'first_name' => $agent['FirstName'],
            'last_name' => $agent['LastName'],
            'brokerage_code' => $agent['OfficeMLSID'],
            'phone_1' => $agent['CellPhone'],
            'phone_1_type' => 'Cell',
            'phone_2' => $agent['HomePhone'],
            'phone_2_type' => 'HomePhone'
        ];
        Recruits::updateOrCreate(['mls_id' => $mls_id],$args);
    }
    public function syncRecruitProfileImage($recruit_id){

        $recruit = Recruits::where('id',$recruit_id)->first();
        if(!$recruit){
            return false;
        }
        $agent = $this->getAgentFromMls($recruit->mls_id);
        $object = $this->rets->GetObject('Agent', 'AgentPhoto', $agent['Matrix_Unique_ID'], '1', 0);
        if ($object[0]['Success'] == false) {
            return false;
        }
        $time = time();
        Storage::put('images/recruits/' . $time . '.jpg', $object[0]['Data']);
        $recruit->profile_img = url('img/recruits/' . $time . '.jpg');
        $recruit->save();
        return true;
    }
    public function agentSearch($agentName){
        $agents = [];
        if ($this->connect() == true) {
            $search = $this->rets->SearchQuery('Agent', 'Agent', "(FullName = *$agentName*),(AgentStatus = A),(MatrixUserType = AGENT)");
            while ($agent = $this->rets->FetchRow($search)) {
                array_push($agents,$agent);
            }
            $this->disconnect();
            return $agents;

        }else{
            return false;
        }
    }
    public function runAgentListings($agent_id,$status,$start = '')
    {
        if($start == ''){
            $start_range = Carbon::now()->subYears(4)->format('Y-m-d\TH:i:s');
        }else{
            $start_range = $start;
        }
        $end_range = Carbon::now()->format('Y-m-d\TH:i:s');
        if ($this->connect() == true) {
            // $since = Carbon::now()->subDays($daysBack)->format('Y-m-d\TH:i:s');
            if($status == 'listing'){
                $search = $this->rets->SearchQuery('Property', 'Listing', "(ListAgentMLSID = $agent_id),(OriginalEntryTimestamp = $start_range-$end_range)");
            }else{
                $search = $this->rets->SearchQuery('Property', 'Listing', "(SellingAgentMLSID = $agent_id),(CloseDate = $start_range-$end_range)");

            }
            $listings = [];
            while ($listing = $this->rets->FetchRow($search)) {

                $args = [
                    'id' => $listing['MLSNumber'],
                    'OriginalEntryTimestamp' => $listing['OriginalEntryTimestamp'],
                    'PendingDate' => $listing['PendingDate'],
                    'CloseDate' => $listing['CloseDate'],
                    'ClosePrice' => $listing['ClosePrice'],
                    'ListAgentMLSID' => $listing['ListAgentMLSID'],
                    'SellingAgentMLSID' => $listing['SellingAgentMLSID'],
                    'ListPrice' => $listing['ListPrice'],
                    'CDOM' => $listing['CDOM'],
                    'StreetName' => $listing['StreetName'],
                    'StreetNumber' => $listing['StreetNumber'],
                    'City' => $listing['City'],
                    'ZipCode' => $listing['ZipCode'],
                    'Status' => $listing['Status'],
                    'PropertySubType' => $listing['PropertySubType']
                ];

                RecruitListing::updateOrCreate(['id' => $listing['MLSNumber']],$args);
            }

            return $listings;
        } else {
            return false;
        }
    }
    public function checkAgentListings($agent_id,$status)
    {
        $start_range = Carbon::now()->subYears(1)->format('Y-m-d\TH:i:s');
        $end_range = Carbon::now()->format('Y-m-d\TH:i:s');
        if ($this->connect() == true) {
            // $since = Carbon::now()->subDays($daysBack)->format('Y-m-d\TH:i:s');
            if($status == 'listing'){
                $search = $this->rets->SearchQuery('Property', 'Listing', "(ListAgentMLSID = $agent_id),(OriginalEntryTimestamp = $start_range-$end_range)");
            }elseif($status == 'closed_listing'){
                $search = $this->rets->SearchQuery('Property', 'Listing', "(ListAgentMLSID = $agent_id),(CloseDate = $start_range-$end_range)");

            }else{
                $search = $this->rets->SearchQuery('Property', 'Listing', "(SellingAgentMLSID = $agent_id),(CloseDate = $start_range-$end_range)");

            }
            $listings = [];
            while ($listing = $this->rets->FetchRow($search)) {
                array_push($listings,$listing);

            }


            return $listings;
        } else {
            return false;
        }
    }

}
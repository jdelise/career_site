<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 6/17/2015
 * Time: 10:27 AM
 */

namespace app\Leads;


use App\Lead;
use App\Recruits;

class LeadsRepo {

    /**
     * @var Lead
     */
    private $lead;

    /**
     * @param Lead $lead
     */
    public function __construct(Lead $lead)
    {

        $this->lead = $lead;
    }

    public function getLead($lead_id){
        $lead = $this->lead->find($lead_id);
        return $lead;
    }
    public function getLeads(){
        $leads = $this->lead->orderBy('updated_at')->all();
        return $leads;
    }
    public function getMyLeads($user_id){
        $leads = $this->lead->where('user_id',$user_id)->orderBy('updated_at')->all();
        return $leads;
    }
    /**
     * @param array $attributes
     * @return static
     */
    public function createLead(array $attributes){
        $lead = $this->lead->create($attributes);
        return $lead;
    }

    /**
     * @param $lead_id
     * @return static
     */
    public function convertLeadToRecruit($lead_id){
        $lead = $this->lead->find($lead_id);
        $args = [];
            foreach($lead as $key => $value){
                $args[$key] = $value;
            };
        $recruit = Recruits::create($args);
        return $recruit;
    }
}
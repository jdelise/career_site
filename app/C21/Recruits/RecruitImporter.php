<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 4/27/2015
 * Time: 4:35 PM
 */

namespace App\C21\Recruits;



use App\C21\Helpers\ImportHelper;
use App\C21\Helpers\PhoneFormater;
use App\Recruits;
use Illuminate\Support\Facades\Auth;

class RecruitImporter {
    /**
     * @var PhoneFormater
     */
    private $phone;

    /**
     * @param PhoneFormater $phone
     */
    public function __construct(PhoneFormater $phone)
    {

        $this->phone = $phone;
    }
    public function import(){
        $import = new ImportHelper(storage_path() . '/c21/recruit_scrub.csv');
        $recruits = $import->readElements();
        foreach ($recruits as $recruit) {

            Recruits::updateOrCreate(['email' => $recruit->EMail],[
                'mls_id' => $recruit->AgentID,
                'first_name' => ucwords($recruit->FirstName),
                'last_name' => ucwords($recruit->LastName),
                'phone_1' =>  $this->phone->format($recruit->Phone1),
                'phone_1_type' => $recruit->Phone1Type,
                'address' => $recruit->Address,
                'city' => $recruit->City,
                'zip_code' => $recruit->Zip,
                'email' => $recruit->EMail,
                'user_id' => 1,
                'experience_level' => 'Experienced Agent'
            ]);
        }
    }
}
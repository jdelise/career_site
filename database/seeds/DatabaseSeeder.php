<?php

use App\C21\Recruits\RecruitImporter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\C21\Users\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('OfficeTableSeeder');
		$this->call('UserTableSeeder');
        $this->call('RolesPermissionsTableSeeder');
        $this->call('SchoolsAndExperienceTableSeeder');
        $this->call('TasksNamesTableSeeder');

	}

}
class OfficeTableSeeder extends Seeder{
    public function run(){
        DB::table('offices')->truncate();
        $offices = [
            ['name' => 'Carmel', 'address' => '270 E. Carmel Dr.', 'city' => 'Carmel', 'state' => 'IN', 'zip_code' => '46032'],
            ['name' => 'Greenwood', 'address' => '', 'city' => '', 'state' => '', 'zip_code' => ''],
            ['name' => 'Downtown', 'address' => '270 E. Carmel Dr.', 'city' => 'Carmel', 'state' => 'IN', 'zip_code' => '46032'],
            ['name' => '96th Street', 'address' => '270 E. Carmel Dr.', 'city' => 'Carmel', 'state' => 'IN', 'zip_code' => '46032'],
            ['name' => 'Zionsville', 'address' => '270 E. Carmel Dr.', 'city' => 'Carmel', 'state' => 'IN', 'zip_code' => '46032'],
            ['name' => 'Hendricks County', 'address' => '270 E. Carmel Dr.', 'city' => 'Carmel', 'state' => 'IN', 'zip_code' => '46032']
        ];
        foreach($offices as $office){
            \App\Office::create($office);
        }
    }
}
class TasksNamesTableSeeder extends Seeder{
    public function run(){
        DB::table('task_names')->truncate();
        $task_names = [
            ['task_name' => 'Call'],
            ['task_name' => 'Appointment'],
            ['task_name' => 'Email']
        ];
        foreach($task_names as $task_name){
            \App\TaskName::create($task_name);
        }
    }
}
class UserTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->truncate();
        $users = [
            ['first_name' => 'Joseph', 'last_name' => 'Delise','email' => 'jdelise@c21scheetz.com', 'password' => bcrypt('Dylan1234'),'can_recruit' => 1, 'office_id' => 1],
            ['first_name' => 'Emily', 'last_name' => 'Crespo','email' => 'ecrespo@c21scheetz.com', 'password' => bcrypt('C21Scheetz'), 'office_id' => 1],
            ['first_name' => 'Matt', 'last_name' => 'Mueller','email' => 'mmueller@c21scheetz.com', 'password' => bcrypt('C21Scheetz'), 'office_id' => 1],
            ['first_name' => 'Patty', 'last_name' => 'Bender','email' => 'pbender@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 1],
            ['first_name' => 'Tracy', 'last_name' => 'Hutton','email' => 'thutton@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 1],
            ['first_name' => 'Jen', 'last_name' => 'Short','email' => 'jshort@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 1],
            ['first_name' => 'Jason', 'last_name' => 'Engle','email' => 'jengle@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 5],
            ['first_name' => 'Richard', 'last_name' => 'Lampe','email' => 'rlampe@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 1],
            ['first_name' => 'Kevin', 'last_name' => 'Hudson','email' => 'khudson@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 4],
            ['first_name' => 'Brad', 'last_name' => 'Grant','email' => 'bgrant@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 6],
            ['first_name' => 'Shereen', 'last_name' => 'Wallace','email' => 'swallace@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 3],
            ['first_name' => 'Susan', 'last_name' => 'McClain','email' => 'smcclain@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 2],
            ['first_name' => 'Jennie', 'last_name' => 'Deckert','email' => 'jdeckert@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 2],
            ['first_name' => 'Annie', 'last_name' => 'Hamilton','email' => 'ahamilton@c21scheetz.com', 'password' => bcrypt('C21Scheetz'),'can_recruit' => 1, 'office_id' => 1]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}

class SchoolsAndExperienceTableSeeder extends Seeder{
    public function run(){
        DB::table('real_estate_schools')->truncate();
        DB::table('experience_levels')->truncate();
        $schools = [
            ['school_name' => 'Scheetz Online School'],
            ['school_name' => 'Tucker Live Class'],
            ['school_name' => 'Tucker online class'],
            ['school_name' => 'RECP Live Class'],
            ['school_name' => 'RECP Online Class'],
            ['school_name' => 'IREI Live Class'],
            ['school_name' => 'RU – Live Class'],
            ['school_name' => 'RU – Online Class'],
            ['school_name' => 'RECI – Online class']
        ];
        $experience_levels = [
            ['level' => 'Just thinking about Real Estate'],
            ['level' => 'In Pre-Licensing School'],
            ['level' => 'Licensed and ready to go'],
            ['level' => 'Experienced Agent'],
            ['level' => 'Referral ']
        ];

        foreach($experience_levels as $level){
            \App\ExperienceLevel::create($level);
        }
        foreach($schools as $school){
            \App\RealEstateSchool::create($school);
        }
    }
}
class RolesPermissionsTableSeeder extends Seeder{
    public function run(){
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();
        $roles = [
            ['name' => 'admin', 'display_name' => 'Site Administrator','description' => ''],
            ['name' => 'company_admin', 'display_name' => 'Company Administrator','description' => ''],
            ['name' => 'lead_router_admin', 'display_name' => 'LeadRouter Admin','description' => ''],
            ['name' => 'manager', 'display_name' => 'Office Manager','description' => ''],
            ['name' => 'recruiter', 'display_name' => 'LeadRouter Admin','description' => '']
        ];
        $permissions = [
            ['name' => 'can_view_dashboard', 'display_name' => 'View Admin Dashboard','description' => 'User can view the admin dashboard'],
            ['name' => 'can_access_leadrouter', 'display_name' => 'Access LeadRouter','description' => 'Full Access to LeadRouter'],
            ['name' => 'can_access_recruiting', 'display_name' => 'Access Recruiting','description' => 'Full access to recruiting'],
            ['name' => 'can_access_reporting', 'display_name' => 'Can Access Reporting','description' => ''],
            ['name' => 'can_send_text', 'display_name' => 'Can Send Text Message','description' => ''],
            ['name' => 'can_manage_users', 'display_name' => 'Can Manage Users','description' => 'This is user can change user permissions and add/delete users.']

        ];

        foreach($roles as $role){
            \App\C21\Users\Acl\Role::create($role);
        }
        foreach($permissions as $permission){
            \App\C21\Users\Acl\Permission::create($permission);
        }

        $admin = \App\C21\Users\Acl\Role::where('id',1)->first();
        $admin->attachPermissions(array(1,2,3,4,5,6));

        $manager = \App\C21\Users\Acl\Role::where('id',4)->first();
        $manager->attachPermissions(array(3));

        $lead_Router = \App\C21\Users\Acl\Role::where('id',3)->first();
        $lead_Router->attachPermissions(array(2));
        $recruiter = \App\C21\Users\Acl\Role::where('id',5)->first();
        $recruiter->attachPermissions(array(1,3,4));
        $company_admin = \App\C21\Users\Acl\Role::where('id',2)->first();
        $company_admin->attachPermissions(array(1,2,3,4,5));
        $user = User::find(1)->first();
        $user->attachRole(1);
        $phone = new \App\C21\Helpers\PhoneFormater();
        $importer =  new RecruitImporter($phone);
        $importer->import();
    }
}


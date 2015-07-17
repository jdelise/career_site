<?php namespace App\C21\Reporting;

use Illuminate\Database\Eloquent\Model;

class Closed_Leads extends Model {

	protected $table = 'closed_leads';
    protected $guarded = ['id'];

    public function getDates()
    {
        return ['date_closed','created_at','updated_at'];
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingLead extends Model {
    protected $table = 'pending_leads';
    protected $guarded = ['id'];

    public function getDates()
    {
        return ['est_closing_date','created_at','updated_at'];
    }

}

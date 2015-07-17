<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitListing extends Model {

    protected $fillable = ['id','OriginalEntryTimestamp','PendingDate','CloseDate','ClosePrice','ListAgentMLSID','SellingAgentMLSID','ListPrice','CDOM','StreetName','StreetNumber','City','ZipCode','Status','PropertySubType'];
	//

}

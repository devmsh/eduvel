<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contacts extends Model
{
    public function getCreatedAtAttribute($val){
    	return Carbon::parse($val)->diffForHumans();
	}
}

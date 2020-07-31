<?php

namespace App;

use Auth;
use App\History;
use Carbon\Carbon;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public function user()
	{
		return $this->belongsTo('App\User');
    }

    public function histories()
	{
		return $this->hasMany('App\History');
    }


    
}

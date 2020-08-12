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

    public static $rules = array(
      'bio' => 'max:1000',
      'image' => 'image|mimes:jpeg,png,jpg',
      );
    

    public function user()
	{
		return $this->belongsTo('App\User');
    }

    public function histories()
	{
		return $this->hasMany('App\History');
    }


    
}

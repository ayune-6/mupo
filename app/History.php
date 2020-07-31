<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Profile;

class History extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );

    public function profile()
	{
		return $this->belongsTo('App\Profile');
    }

}

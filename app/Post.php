<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = array('id');

	public static $rules = array(
        	'title' => 'required|max:100',
        	'description' => 'required|max:200',
		);
		
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}

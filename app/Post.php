<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;


class Post extends Model
{
	protected $guarded = array('id');
	protected $fillable = ['video_id', 'title', 'description'];
	public static $rules = array(
        	'title' => 'required|max:100',
        	'description' => 'required|max:200',
		);
		
	public function user()
	{
		return $this->belongsTo('App\User');
	}

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id);
    }
}

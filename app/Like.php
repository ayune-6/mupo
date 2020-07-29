<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Post' => [
            'field' => 'likes_count', //countするもの
            'foreignKey' => 'post_id'　//countされるもの
        ]
    ];

    protected $fillable = ['user_id', 'post_id'];

    public function Post() //単数
    {
      return $this->belongsTo('App\Post');
    }

    public function User() //単数
    {
      return $this->belongsTo(User::class);
    }

}

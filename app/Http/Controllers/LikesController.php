<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use Auth;
use App\Post;

class LikesController extends Controller
{
    public function user_list() {
        return $this->getUsers();
    }

    public function like(Request $request) {
        $request -> validate ([
            'user_id' => 'required|exists:user,id'
        ]);

        $exists = \App\Like::where('user_id', request()->user()->id)
            ->where('post_id', $post->id)
            ->exists();
        
        if(!$exists) {
            $post = new Post;
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->post_id = $post->id();
            $result = $like->save();
        }else{
            $post->like_by()->delete();
        }

        private function getUsers() {
            return \App\User::with('likes')
                ->withcount('likes')
                ->get();
        }
            
    }
}

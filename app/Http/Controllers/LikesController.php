<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use Auth;
use App\Post;
use App\User;

class LikesController extends Controller
{
    public function user_list() {
        return $this->getUsers();
    }

    public function like(Request $request) {
        \Debugbar::info($request);
        
        $input = $request->all();
        \Debugbar::info($input);
        \Debugbar::info($input['user_id']);
        
        $like = new Like;
        $liked = Like::where('user_id', $input['user_id'])->where('post_id', $input['post_id']);
        \Debugbar::info($liked);

        if(!$liked) { 
            $like->user_id = $input['user_id'];
            $like->post_id = $input['post_id'];
            $like->save();
        }else{
            $like->delete();
        }
    }

    private function getUsers() {
        return User::with('likes')
            ->withcount('likes')
            ->get();
    }
            
    
}

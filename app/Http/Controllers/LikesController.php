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
    public function user_list(Request $request) {

        $postId = $request->postId;
        //\Debugbar::info($postId);
        //$liked = $this->like()->liked;
        $like = Like::where('post_id', $postId)->get();
        //\Debugbar::info($like);
        if (!empty($like)){
            $liked_users = $like['userId'];
        }else{
            $liked_users = NULL;
        }
        
        //\Debugbar::info($liked_users);

        return view('home.liked', ['liked_users' => $liked_users]);
    }

    public function like(Request $request) {
        //\Debugbar::info($request);
        
        $user_id = $request['user_id'];
        $post_id = $request['post_id'];
        //\Debugbar::info($user_id);
        //\Debugbar::info($post_id);

        //$input = $request->all();
        ////\Debugbar::info($input);
        ////\Debugbar::info($input['user_id']);
        ////\Debugbar::info($input['post_id']);

        $like = new Like;
        $liked = Like::where('user_id', $user_id)->where('post_id', $post_id);
        //\Debugbar::info($liked);

        if(!empty($liked)) { 
            $like->user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();
        }else{
            $like->user_id = $liked->user_id;
            $like->post_id = $liked->post_id;
            $like->save();;
        }
        //\Debugbar::info($like);
    }

    
            
    
}

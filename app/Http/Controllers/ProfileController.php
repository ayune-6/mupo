<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use App\Post;
use App\User;

class ProfileController extends Controller
{
    //public function getuser(Request $request)
    //{
        
      //  $profile = new Profile;
       // $getuser = $request->all();
       // $getuser['post_by'] = $profile_data;
       // $getuserprofile = Profile::where('user_id', $profile_data);

    //}

    public function show($username)
    {
        $data = $username;
        \Debugbar::info($data);
        $user = User::where('username', $data)->first();
        \Debugbar::info($user);
        $userinfo = $user->id;
        $profile = Profile::where('user_id', $userinfo)->first();
        \Debugbar::info($profile);
        if(empty($profile)) {
            abort(404);
        }
        $posts = Post::where('user_id', $userinfo)->get();

        \Debugbar::info($posts);

        return view('profile.profile', ['profile' => $profile, 'posts' => $posts]);
    }


}

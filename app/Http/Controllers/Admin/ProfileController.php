<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Profile;
use App\Post;
use App\History;
use Carbon\Carbon;



class ProfileController extends Controller
{
    public function add()
    {
        return view('profile.create');
    }

    public function create(Request $request)
    {
        $profile = new Profile;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->profile_pic_id = basename($path);
          } else {
                $profile->profile_pic_id = null;
          }

        unset($form['_token']);
        unset($form['image']);

        $profile->fill($form);
        $profile['user_id']=Auth::id();
        
        $profile->save();
        
        return redirect('/home');
    }

    public function edit(Request $request)
    {
        //$profile = Profile::find($request->id);
        $profile = Profile::where('user_id', Auth::id())->first();
        if(empty($profile)) {
            abort(404);
        }
        return view('profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        
        //$profile = Profile::find($request->id);
        $profile = Profile::where('user_id', Auth::id())->first();
        $profile_form = $request->all();
        if ($request->remove == 'true') {
            $profile_form['profile_pic_id'] = null;
        } elseif ($request->file('profile_pic_id')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['profile_pic_id'] = basename($path);
        } else {
            $profile_form['profile_pic_id']= $profile->profile_pic_id;
        }
        
        unset($profile_form['_token']);
        unset($profile_form['image']);
        unset($profile_form['remove']);

        $profile->fill($profile_form);
        $profile['user_id']=Auth::id();
        $profile->save();
        
        $history = new History;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect("/home");
    }

    public function destroy(Request $request){

        $user = User::where('id', Auth::id())->first();

        \Debugbar::info($user);
        $user->delete();
    
        return redirect('/');
    }


    
}

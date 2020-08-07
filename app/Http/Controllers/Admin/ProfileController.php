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

            //$image = $request->file('image');
            $filePath = $form['image']->store('public/profile');
            \Debugbar::info($filePath);
            //$img = Image::make($request->file('image'))->resize(140, 140);
            //\Debugbar::info($img);
            //$img->save('/public/profile'.$filename);
            //$profile->profile_pic_id = str_replace('public/profile', '', $filePath)->save();
            $form['profile_pic_id'] = str_replace('public/profile', '', $filePath);
          } else {
                //$profile->profile_pic_id = null;
                //$profile->profile_pic_id->save();
                $form['profile_pic_id'] = NULL;
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
        \Debugbar::info($profile);
        $user = User::where('id', Auth::id())->first();
        if(empty($profile)) {
            abort(404);
        }
        return view('profile.edit', ['profile_form' => $profile, 'user_form' => $user]);
    }
    
    public function update(Request $request)
    {
        //$profile = Profile::find($request->id);
        $profile = Profile::where('user_id', Auth::id())->first();
        $profile_form = $request->all();
        \Debugbar::info($profile_form);
        if ($request->remove == 'true') {
            $profile_form['profile_pic_id'] = null;
        } elseif ($request->file('image')) {
            $newFilePath = $profile_form['image']->store('public/profile');
            \Debugbar::info($newFilePath);
            $profile_form['profile_pic_id'] = str_replace('public/profile', '', $newFilePath);
            //$filename = sha1(time());
            //\Debugbar::info($filename);
            //$img = Image::make($request->file('image'))->resize(140, 140);
            //\Debugbar::info($img);
            //$img->save('/public/profile'.$filename);
            //$profile_form->profile_pic_id = $filename;

        } else {
            $profile_form['profile_pic_id'] = $profile->profile_pic_id;
        }
        
        unset($profile_form['_token']);
        unset($profile_form['image']);
        unset($profile_form['remove']);

        //$profile->fill($profile_form);
        $profile['user_id']=Auth::id();
        $profile->bio = $profile_form['bio'];
        \Debugbar::info($profile->bio);
        $profile->profile_pic_id = $profile_form['profile_pic_id'];
        \Debugbar::info($profile->profile_pic_id);
        $profile->save(); 

        $user = User::where('id', Auth::id())->first();
        $user->name = $profile_form['name'];
        $user->save();

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

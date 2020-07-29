<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Post;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function add()
    {
        $user = new User;
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $profile = new Profile;
        $form = $request->all();

        unset($form['_token']);

        $profile->fill($form);
        $profile['user_id']=Auth::id();
        $profile->save();
        
        return redirect('admin/profile');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);  //check if the user's profile exists
        if(empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);　//replace "profile_form" on the blade file with the user's(found with id) data
    }
    
    public function update(Request $request)
    {
        $profile = Profile::find($request->id);　
        $profile_form = $request->all();　//set the requested new data in $profile_form as an array
        
        unset($profile_form['_token']);
        
        $profile->fill($profile_form);　//fill $profile data with $profile_form data (replacing (updating))
        $profile['user_id']=Auth::id();
        $profile->save();
        
        $history = new History;
        $history->profile_id = $profile->id;
        $history->profile_edited_at = Carbon::now();
        $history->save();
        
        return redirect("admin/profile/index");
    }
    
    public function show()
    {
        
        return view('admin.profile');
    }

}

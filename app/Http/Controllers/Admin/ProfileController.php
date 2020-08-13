<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Profile;
use App\Post;
use App\History;
use Carbon\Carbon;
use Storage;



class ProfileController extends Controller
{
    public function add()
    {
        return view('profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        
        if (isset($form['image'])) {

            $imagefile = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            
            $filename  = $request->file('image')->getClientOriginalName();
            

            $image = Image::make($imagefile)->resize(140, 140)->encode($extension);

            $filePath = Storage::disk('s3')->put('/'.$filename, $image,'public');
            
            $form['profile_pic_id'] = "https://mupo.s3-ap-northeast-1.amazonaws.com/".$filename;
            

            //$filePath = Storage::disk('s3')->putFile('/',$form['image'],'public');
            //$form['profile_pic_id'] = Storage::disk('s3')->url($filePath);
          } else {
                
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
        //\Debugbar::info($profile);
        $user = User::where('id', Auth::id())->first();
        if(empty($profile)) {
            abort(404);
        }
        return view('profile.edit', ['profile_form' => $profile, 'user_form' => $user]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = Profile::where('user_id', Auth::id())->first();
        $profile_form = $request->all();
        
        if ($request->remove == 'true') {
            $profile_form['profile_pic_id'] = null;
        } elseif ($request->file('image')) {
            $imagefile = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            //\Debugbar::info($extension);
            $filename  = $request->file('image')->getClientOriginalName();
            //\Debugbar::info($filename);

            $image = Image::make($imagefile)->resize(140, 140)->encode($extension);
            //\Debugbar::info($image);

            $newFilePath = Storage::disk('s3')->put('/'.$filename, $image,'public');
            //\Debugbar::info($newFilePath);
            //$profile_form['profile_pic_id'] = Storage::disk('s3')->url($newFilePath);
            $profile_form['profile_pic_id'] = "https://mupo.s3-ap-northeast-1.amazonaws.com/".$filename;
            //$newFilePath = Storage::disk('s3')->putFile('/',$profile_form['image'],'public');
            //$profile_form['profile_pic_id'] =  Storage::disk('s3')->url($newFilePath);

        } else {
            $profile_form['profile_pic_id'] = $profile->profile_pic_id;
        }
        
        unset($profile_form['_token']);
        unset($profile_form['image']);
        unset($profile_form['remove']);

        //$profile->fill($profile_form);
        $profile['user_id']=Auth::id();
        $profile->bio = $profile_form['bio'];
        //\Debugbar::info($profile->bio);
        $profile->profile_pic_id = $profile_form['profile_pic_id'];
        //\Debugbar::info($profile->profile_pic_id);
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

        //\Debugbar::info($user);
        $user->delete();
    
        return redirect('/');
    }


    
}

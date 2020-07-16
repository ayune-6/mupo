<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use Auth;

use  JD\Cloudder\Facades\Cloudder;

class PostController extends Controller
{
	public function  add()
	{
		return view('admin.post.create');
	}

	public function create(Request $request)
	{

		$this->validate($request, Post::$rules);

		$post = new Post;
		$data = $request->all();
		$video_name = $request->file('video')->getRealPath();

		Cloudder::uploadVideo($video_name);

		$result = Cloudder::getResult();

		$path = $result->filename->store();

		$post->title = $data['title'];
		$post->description = $data['description'];
		$post->user_id = Auth::id();
		$post->video_url = $result['url'];
		$post->video_path = basename($path);


		$post->fill($data);
		$post->save();

		return redirect('/home');
	}
}

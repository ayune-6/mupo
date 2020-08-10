<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Post;
use App\User;
use Auth;

use  JD\Cloudder\Facades\Cloudder;

class PostController extends Controller
{
	public function videoupload()
	{
		return view('admin.post.upload');
	}

	public function upload(Request $request)
	{
		$post = new Post;
		$post->video_id = $request->video_id;
		$post->save();

		return redirect ('admin/post/create');
	}

	public function informationpost(Request $request)
	{
		$video_id = $request->video_id;
		return view('admin.post.create', compact('video_id'));
	}

	public function create(Request $request)
	{

		$this->validate($request, Post::$rules);

		$post = new Post;
		$user = new User;
		$post->user_id = request()->user()->id;
		$data = $request->all();

		unset($data['_token']);

		$post->fill($data);
		$post->save();

		return redirect('/home');
	}

	public function __construct()
	{
		$this->middleware('auth', array('except' => 'index'));
	}

	/*public function show($id) {
		$post = Post::findOrFail($id);
		$like = $post->likes()->where('user_id', Auth::user()->id)->first();

		return view('posts.show')->with(array('post' => $post, 'like' => $like));
	}*/

	public function delete(Request $request)
	{
		$post = Post::find($request->id);
		//\Debugbar::info($post);
		$post->delete();

		return redirect('/home');
	}


}

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

		unset($data['_token']);
		
		$post->fill($data);
		$post->save();

		return redirect('/home');
	}
}

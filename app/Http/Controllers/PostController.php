<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Post

class PostController extends Controller
{
	public function index(Request $request)
	{

		$posts = Post::all()->sortByDesc('created_at');

		return view('home.home');
	}
}

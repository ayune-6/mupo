<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('home/home', ['posts' => $posts]);

    }

    public function get(Request $request)
    {
        $searchkey = $request->input('name');
        \Debugbar::info($searchkey);

        if(!empty($searchkey))
        {   
            //titleから検索
            $searches = Post::where('title', 'like', '%'.$searchkey.'%');
                //->paginate(15);
            //bioから検索
            $searches = Post::where('bio', 'like', '%'.$searchkey.'%');
                //->paginate(15);

        }else{
            $searches = Post::orderBy('created_at', 'desc');
                //->paginate(15);
        }

        return redirect('/search-result');

    }
    public function search()
    {
        //$searchkey = $keyword;
        //if(!empty($searchkey))
        //{   
            //titleから検索
            //$searches = Post::where('title', 'like', '%'.$keyword.'%');
                //->paginate(15);
            //bioから検索
            //$searches = Post::where('bio', 'like', '%'.$keyword.'%');
                //->paginate(15);

        //}else{
            //$searches = Post::orderBy('created_at', 'desc');
                //->paginate(15);
        //}

        $searchinfos = $this->get()->$searches;
        \Debugbar::info($searchinfos);

        return view('home.search-result',[
            'searches' => $searchinfos,
            ]);
    }





}

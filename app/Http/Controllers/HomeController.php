<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use Auth;
use App\Profile;

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
        //$liked = Like::where('user_id', Auth::user()->id)
            //->where('post_id', $posts->id);

        return view('home/home', ['posts' => $posts]);

        

    }

    public function searchResult(Request $request)
    {
        $post = new Post;

        $keywords = $request->input('keyword');
        \Debugbar::info($keywords);

        //$query = Post::query();

        if(!empty($keywords))
        {   
            //titleから検索
            $posts = Post::where('title', 'like', '%'.$keywords.'%')
                ->orWhere('description', 'like', '%'.$keywords.'%')
                ->paginate(15);
            //$query->where('title', 'like', '%'.$keywords.'%');
                //->orWhere('bio', 'like', '%'.$keywords.'%');
                //->paginate(15);
            //bioから検索
            //$searchkeys = Profile::where('bio', 'like', '%'.$keywords.'%')
                //->paginate(15);

        }else{
            $posts = Post::orderBy('created_at', 'desc')
                ->paginate(20);

        }

        //$datas = $query->orderBy('created_at','desc')->paginate(10);

        //$searchkeys = $query->get();
        /*\Debugbar::info($posts);
        \Debugbar::info($posts[0]);
        \Debugbar::info($posts[0]['user_id']); */

        return view('home.search-result',  
            ['posts' => $posts]
        );

    }
    //public function search()
    //{
        //$searchinfos = $this->get()->$searchkeys;

        //\Debugbar::info($searchkeys);

        //if(!empty($searches))
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


        //return view('home.search-result',[
            //'searches' => $searcheinfos,
            //]);
    //}

}

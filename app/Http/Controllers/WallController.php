<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class WallController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('wall', ['posts'=>$posts]);
    }
    /**
         * Write a message on the wall
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
    public function write(Request $request)
    {
        $post = new Post;
        $post->content = $request->content;
        $post->save();
        return redirect('wall');
    }
}

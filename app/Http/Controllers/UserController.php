<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $posts = Post::inRandomOrder()->paginate(50);
        return view('welcome',compact('posts'));
    }
    public function show(Request $request,$id)
    {
        $request->session()->put('id_post', $id);
        $posts = Post::where('id',$id)->get();
        $posts2 = Post::inRandomOrder()->paginate(50);
        return view('posts.user.posts',compact('posts'),compact('posts2'));
    }
}

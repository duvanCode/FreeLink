<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    //
    public function index(Request $request)
    {
    
    $posts = Post::where('title','LIKE','%'.$request->consulta.'%')->paginate(50);
    return view('welcome',compact('posts'));
    
    }
}

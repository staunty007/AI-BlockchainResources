<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\tag;

class PostController extends Controller
{
    public function post(post $post)
    {
    	$tags = tag::all();
    	$randPost = post::where('status',0)->inRandomOrder()->paginate(3);
    	return view('user.article', compact('post','tags','randPost'));
    }

    public function article()
    {
    	$posts = post::where('status',0)->paginate(6);
    	return view('user.articles', compact('posts'));
    }

    public function tag(tag $tag)
    {
    	$tags = tag::all();
    	$post_tags = $tag->posts();
    	$posts = post::all();
    	return view('user/tag', compact('posts','post_tags','tags'));
    }

    public function welcome()
    {
    	$posts = post::where('status',0)->paginate(3);
    	return view('user/welcome', compact('posts'));
    }
}

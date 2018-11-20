<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\post;
use App\tag;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:freelancer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $posts = post::where('poster_id',$user_id)->get();
        return view('freelance.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        return view('freelance.post.post', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }

        $author_name = Auth::User()->name;

        $post = new post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->slug = str_slug($post->title, '-');
        $post->body = $request->body;
        $post->posted_by = $author_name;
        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('tags')->where('id',$id)->first();

        $tags = tag::all();

        return view('freelance.post.edit', compact('tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        } 

        $author_name = Auth::User()->name . '' . Auth::User()->lastname;

        $post = Post::find($id);
        $post->image = $imageName;
        $post->title = $request->title;
        $post->slug = str_slug($post->title, '-');
        $post->body = $request->body;
        $post->posted_by = $author_name;
        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

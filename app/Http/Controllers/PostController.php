<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest as Request;

class PostController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *controler crud operacii
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //spisak s modeli na post obekti
        $posts = Post::latest()->limit(5)->get(); //podrejda po dada na sazdavane
        return view('posts.index', ['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form',[
            'post' =>new Post(),
            'method' =>'POST',
            'action' => route('posts.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Post();
        $post->fill($request->input());
        $post->author()->associate(auth()->user());
        //avtora kazvame
        if($post->save()){
                return redirect()-> route('home')->withSuccess('Saved successfully');
        }else{
            return redirect()->back()->withError('Error occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //1 url kam ito da se izprati formata 2 metoda koito trq da se izprati 
        //izprati q s post ama kaji nalaravel da go pokaje kato put
        return view('posts.form',[
            'post' =>$post,
            'method' =>'PUT',
            'action' => route('posts.update', $post)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->input());
        if($post->save()){
                return redirect()-> route('home')->withSuccess('Saved successfully');
        }else{
            return redirect()->back()->withError('Error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
                return redirect()-> route('home')->withSuccess('Deleted successfully');
        }else{
            return redirect()->back()->withError('Error occured');
        }
    }
}

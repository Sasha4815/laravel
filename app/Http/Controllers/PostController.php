<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //dd();
        if(Auth::check()) {
        return view('index', compact('posts'));
        }
        return view('auth.login');
    }

    public function register (Request $request) {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $post = new Post([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
        ]);
        $post->save();
        return redirect('/posts')->with('success', 'Пост добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $post = new Post([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
        ]);
        $post->save();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::all()->find($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $post = Post::all()->find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->price = $request->get('price');
        $post->save();
        return redirect('/posts')->with('success', 'Пост отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::all()->find($id)->delete();
        return redirect('/posts')->with('success', 'Пост удален');
    }
}

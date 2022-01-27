<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('posts.index', [
            'posts' => Post::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $post = new Post();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()
            ->route('posts.create')
            ->with('status', [
                'type' => 'success',
                'message' => 'The post was created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->user_id != Auth::user()->id)
            return redirect()
                ->route('posts.index')
                ->with('status', [
                    'type' => 'danger',
                    'message' => "You don't have the privilege for this action."
                ]);        

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::user()->id)
            return redirect()
                ->route('posts.index')
                ->with('status', [
                    'type' => 'danger',
                    'message' => "You don't have the privilege for this action"
                ]);

        

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();

        return redirect()
            ->route('posts.edit', ['id' => $post->id ])
            ->with('status', [
                'type' => 'success',
                'message' => 'Post update is successful'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

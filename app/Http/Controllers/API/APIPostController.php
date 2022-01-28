<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class APIPostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function search($key){
        $posts = Post::with('user')
            ->where('title', 'like', "%$key%")
            ->orWhere('body', 'like', "%$key%")
            ->get();
            

        return response()->json([
            'posts' => $posts
        ]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::user()->id)
            return response()->json([
                'status' => [
                    'type' => 'danger',
                    'message' => "You are not allowed to delete this data."
                ]
                ], 401);

        return response()->json([
            'status' => $post->delete()
        ]);
    }

    public function update(Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'id' => 'required',
        ]);

        $p = Post::findOrFail($data['id']);

        if ($p->user_id != Auth::user()->id)
            return response()->json([
                'status' => [
                    'type' => 'danger',
                    'message' => "YOu are not allowed to update this data."
                ]
                ], 401);

        $p->title = $data['title'];
        $p->body = $data['body'];
        $p->save();

        return response()->json([
            'post' => $p
        ]);
    }

    public function show($id){
        $post = Post::findOrFail($id);

        return response()->json([
            'post' => $post
        ]);
    }

    public function create(Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();

        return response()->json([
            'post' => $post
        ]);
    }

    public function index(){
        $posts = Post::with('user')->get();

        return response()->json([
            'posts' => $posts
        ]);
    }

}

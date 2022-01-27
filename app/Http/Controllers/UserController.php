<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        // $posts = Post::with('user')->get();

            $posts = Post::with('user')
            ->where('user_id', Auth::user()->id )
            ->get();


            // Using DB class
            //$post = DB::select('SELECT * FROM posts WHERE posts.user_id=?', [3]);
            
            // $post = DB::table('posts')->where('user_id', 3)->first();
            
            // $posts = DB::table('posts')
            //     ->join('users', 'posts.user_id', '=', 'users.id')
            //     ->select('posts.*', 'users.first_name','users.last_name')
            //     ->where('user_id', 3)
            //     ->get();
            // dd($posts);

        return view('users.home', [
            'posts' => $posts
        ]);
    }

    public function edit(){

        $user = Auth::user();

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request) {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'required|string',
            'avatar' => 'mimes:png,jpg,jpeg'
        ]);

        $user = User::find(Auth::user()->id);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->bio = $data['bio'];
        
        if ($request->hasFile('avatar')){
            $filename = "{$user->email}.{$data['avatar']->extension()}";
            $data['avatar']->storeAs('public/avatars', $filename);
            $user->avatar = $filename;
        }

        $result = $user->save();

        if (!$result)
            return redirect()
                ->route('user.edit')
                ->with('status', [
                    'type' => 'danger',
                    'message' => 'The user update failed.'
                ]);

        return redirect()
            ->route('user.edit')
            ->with('status', [
                'type' => 'success',
                'message' => 'The user update was successfull.'
            ]);
    }
}

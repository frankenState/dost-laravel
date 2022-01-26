<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return view('users.home');
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

        $user->save();

        return redirect()
            ->route('user.edit')
            ->with('status', [
                'type' => 'success',
                'message' => 'The user update was successfull.'
            ]);
    }
}

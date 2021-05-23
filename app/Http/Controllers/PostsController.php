<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Post;


class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        
        if (\Auth::check()) { 
            $user = \Auth::user();
            
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function form()
    {
        if (\Auth::check()) { 
            $user = \Auth::user();
        }

        return view('posts.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|max:255',
            'store_information' => 'required|max:255',
            'comment' => 'required|max:50',
            'photo' => 'required|image',
        ]);
        
        $disk = Storage::disk('s3');
        
        $file = $request->file('photo');
        //$path = Storage::disk('s3')->putFile('/', $file, 'public');
        $path = $disk->putFile('/', $file, 'public');
        //$photo = Storage::disk('s3')->url($path);
        $photo = $disk->url($path);

        $request->user()->posts()->create([
            'country_id' => $request->country_id,
            'store_information' => $request->store_information,
            'comment' => $request->comment,
            'photo' => $photo,
        ]);

        return redirect('/');
    }
    
    public function show($id)
    {
        $post = \App\Post::findOrFail($id);
        
        return view('users.show', [
            'post' => $post,
        ]);
    }
    
    public function edit($id)
    {
        $post = \App\Post::findOrFail($id);

            
        return view('users.edit', [
            'post' => $post,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $post = \App\Post::findOrFail($id);
        
        // メッセージを更新
        $post->store_information = $request->store_information;
        $post->comment = $request->comment;
        $post->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    
    public function destroy($id)
    {
        $post = \App\Post::findOrFail($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        return redirect('/');
    }
    
}
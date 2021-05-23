<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;



class UserController extends Controller
{
    public function index(User $id)
    {
        $data = [];
        
        if (\Auth::check()) { 
            $user = \Auth::user();
        
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
    
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('users.index', $data);
    }
    
    public function show(User $id)
    {
        $data = [];
        
        if (\Auth::check()) { 
            $user = \Auth::user();
        
            $posts = $user->likes()->orderBy('created_at', 'desc')->paginate(10);
    
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        return view('users.likes', $data);
    }
    
    public function likes($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();

        $posts = $user->likes()->paginate(10);

        return view('users.likes', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(){
        return view('comment.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'nullable',
            'content' => 'required|max:50',
        ]);
        $comment = Comment::create($validated);
        return back();
    }
}

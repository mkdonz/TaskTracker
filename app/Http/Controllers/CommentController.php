<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;

class CommentController extends Controller
{
    public function save(Request $request)

    {
       $comment = new Comment();

       $comment->comment = $request->comment;
       $comment->task_id = $request->task_id;

       $comment->save();

       return redirect()->route('home');
    }
}

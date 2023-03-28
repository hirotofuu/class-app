<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Tweet;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->namae = $request->namae;
        $comment->date = $request->date;
        $comment->tweet_id = $request->tweet_id;
        $comment->save();
    }

    public function index(Tweet $tweet)
    {
        $koments=$tweet->comments;
        return $koments;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class EditCommentActController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $posts = Post::all();

        $comments = Comments::all();

        //find para buscar 1 id
        return view('postsuser')
            ->with('posts', $posts)
            ->with('comments', $comments);
    }

    public function edit($id)
    {


        $comment = Comments::find($id);
        
        return view('editcom')->with('comment', $comment);
    }

    


}

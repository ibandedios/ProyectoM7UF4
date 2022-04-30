<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class CommentsController extends Controller
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


        $post = Post::find($id);
        
        return view('crearcomentario')->with('post', $post);
    }


    public function store(Request $request)
    {
        
        $comments = new Comments();
        $comments ->content=$request->get('content');
        $comments ->user_id=$request->get('id');
        $comments ->post_id=$request->get('post_id');
        

        $comments->save();

        return redirect('postsuser');
    }

    public function destroy($id)
    {


        $comment = Comments::find($id);

        $comment->delete();

        return redirect('postsuser');
    }


    public function update(Request $request, $id)
    {
        
        $comment = Comments::find($id);

        $comment ->content=$request->get('content');

        $comment->save();

        return redirect('postsuser');
    }
    


}

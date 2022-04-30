<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tags;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $tags = Tags::all();

        //find para buscar 1 id
        return view('createtag')
            ->with('tags', $tags);
    }

    public function create()
    {
        
        return view('createposts');
    }

    public function edit($id)
    {
        
        $post = Post::find($id);
        
        return view('editpost')->with('post', $post);
    }

    public function store(Request $request)
    {
        
        $tags = new Tags();
        $tags ->tag=$request->get('tag');

        $tags->save();

        return view('home');
    }

    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);

        $post ->title=$request->get('title');
        $post ->contents=$request->get('contents');
        //$post->user_id=$request->get('id');

        $post->save();

        return redirect('postsuser');
    }

    /*public function destroy($id)
    {
        echo("hola");
        /*$post_id = $id;

        $comment = Comments::where('post_id', $post_id)->first();

        $comment->delete();

        $post = Post::find($id);

        $post->delete();

        return view('home');
    }
    */

    public function show(Request $request)
    {
        $title = $request->get('filtrado');

        $users = User::all();

        $posts = Post::all();

        $comments = Comments::all();

        $input = $request->get('filtrado');

        return view("filtredpost")
        ->with('posts', $posts)
        ->with('comments', $comments)
        ->with('title', $title)
        ->with('users', $users);

    }



/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}

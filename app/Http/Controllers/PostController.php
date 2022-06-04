<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;
use App\User;
use App\Tags;
use App\Post_tags;

//Controlador para visualizar un post en solitario
class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index(Request $request)
    {
        
    }

    public function create()
    {

    }

    public function edit($id)
    {


        $post = Post::find($id);

        $comments = Comments::all();

        $users = User::all();

        $post_tags = Post_tags::all();

        $tags = Tags::all();

        //find para buscar 1 id
        return view('post')
            ->with('post', $post)
            ->with('comments', $comments)
            ->with('users', $users)
            ->with('Post_tags', $post_tags)
            ->with('tags', $tags);
        
    }

    public function store(Request $request)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }

    public function show(Request $request)
    {
        

    }



/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}

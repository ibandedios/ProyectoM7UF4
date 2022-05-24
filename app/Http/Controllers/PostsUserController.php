<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;
use App\User;
use App\Tags;
use App\Post_tags;
use Gate;

//controlador que muestra todos los posts de usuarios con sus comentarios 
class PostsUsercontroller extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        //$this->authorizeResource(Post::class);
        
    }
    //devuelve el indice del 
    public function index(Request $request)
    {
        
        $posts = Post::all();

        $comments = Comments::all();

        $users = User::all();

        $post_tags = Post_tags::all();

        $tags = Tags::all();

        //find para buscar 1 id
        return view('postsuser')
            ->with('posts', $posts)
            ->with('comments', $comments)
            ->with('users', $users)
            ->with('Post_tags', $post_tags)
            ->with('tags', $tags);
    }

    public function create()
    {
        $tags = Tags::all();

        //echo($tags);
        return view('createposts')->with('tags', $tags);
    }

    //devuelva la vista para editar un post

    public function edit($id)
    {
        
        $post = Post::find($id);

        $userid = $post->user_id;

        $this->authorize('edit-post', $userid);
        
        
        return view('editpost')->with('post', $post);
    }

    //almacenar un post, crearlo
    public function store(Request $request)
    {
        
        

        $posts = new Post();
        $posts ->title=$request->get('title');
        $posts ->contents=$request->get('contents');
        $posts->user_id=$request->get('id');


        
        $posts->save();

        $post_tag = new Post_tags();
        
        $post_tag->tag_id=$request->get('tag');

        $titulo = $request->get('title');
        
        $post = Post::where('title', $titulo)->first();

        $post_tag->post_id=$post->id;
        
        $post_tag->save();

        return view('home');
    }

    //actualizar un post, cambiar titulo y contenido
    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);

        $post ->title=$request->get('title');
        $post ->contents=$request->get('contents');
        //$post->user_id=$request->get('id');

        $post->save();

        return redirect('postsuser');
    }

    //borrar posts junto con todos los comentarios creados
    public function destroy($id)
    {
        $post_id = $id;

        $comment = Comments::where('post_id', $post_id)->first();
        
        if($comment != NULL){
            $comment->delete();
        }

        $pt = Post_tags::where('post_id', $post_id)->get();

        if(empty($pt)==0){
            $size = sizeof($pt);
            while($size>0){
                $pt[0]->delete();
                $size=$size-1;
            }
        }
        $post = Post::find($id);

        $post->delete();

        return view('home');
    }

    //muestra los posts segun el filtro que se le pase
    public function show(Request $request)
    {
        $title = $request->get('filtrado');

        $filtro = $request->get('filtro');

        $users = User::all();

        $posts = Post::all();

        $comments = Comments::all();

        $post_tags = Post_tags::all();

        $tags = Tags::all();

        return view("filtredpost")
        ->with('posts', $posts)
        ->with('comments', $comments)
        ->with('title', $title)
        ->with('users', $users)
        ->with('Post_tags', $post_tags)
        ->with('tags', $tags);

    }



/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}

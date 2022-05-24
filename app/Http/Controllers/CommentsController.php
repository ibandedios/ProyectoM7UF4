<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

//controlador de los comentarios
class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //guarda todos los posts
        $posts = Post::all();

        //todos los comentarios
        $comments = Comments::all();

        //devuelve la vista postsuser com uss comentarios y posts
        //find para buscar 1 id
        return view('postsuser')
            ->with('posts', $posts)
            ->with('comments', $comments);
    }

    public function edit($id)
    {


        //te devuelve la pista crearcomentario pasando por parametro el id del posta comentar
        $post = Post::find($id);
        
        return view('crearcomentario')->with('post', $post);
    }


    //almacena la informacion del comentario qu ese le pasa, el contenido del comentario, id del usuario y el id del post
    public function store(Request $request)
    {
        
        $comments = new Comments();
        $comments ->content=$request->get('content');
        $comments ->user_id=$request->get('id');
        $comments ->post_id=$request->get('post_id');
        

        $comments->save();

        //redirecciona a postsuser por lo tanto pasa por elcontrolador de postsuser antes de
        //devolver la vista, para cargar todos los datos que se muestra por la vista y se envien
        //a traves del otro controlador

        return redirect('postsuser');
    }

    public function destroy($id)
    {


        $comment = Comments::find($id);

        $comment->delete();

        return redirect('postsuser');
    }

    //actualiza el comentario

    public function update(Request $request, $id)
    {
        
        $comment = Comments::find($id);

        $comment ->content=$request->get('content');

        $comment->save();

        return redirect('postsuser');
    }
    


}

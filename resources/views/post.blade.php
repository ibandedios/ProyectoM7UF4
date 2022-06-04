@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/home">Home</a>
                
                <div class="card">
                <div class="card-header">{{ $post->title}}</div>
                                <div class="card-body">
                                    
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="bg-info">Tags:
                                <?php
                                    foreach ($Post_tags as $pt) {
                                        if($pt->post_id == $post->id){
                                            foreach ($tags as $tag) {
                                                if($tag->id == $pt->tag_id){
                                                    echo($tag->tag);
                                                }
                                            }
                                        }
                                    }
                                    ?>
                            </h5>
                                    <h2>{{ $post->title}}</h2>
                                    <br>
                                    <div>{{ $post->contents}}</div>
                                    <br><p><a href="/comments/{{ $post->id}}/edit" class="btn btn-info">Comentar</a>
                                    </p>
                                <br>
                                <div><center>Comentarios (<?php
                                    $contador = 0;
                                    foreach($comments as $comment){
                                        if($post->id==$comment->post_id){
                                        $contador+=1;
                                        }
                                    }
                                    echo($contador);
                                    ?>)</center></div>
                                @foreach ($comments as $comment)
                                <?php
                                        if($post->id==$comment->post_id){ 
                                        
                                    ?>
                                <div>
                                <label>
                                    @foreach ($users as $user)
                                    <?php
                                        if($user->id==$comment->user_id){
                                         echo($user->username);   
                                        }
                                    ?>
                                    @endforeach
                                </label><br>
                                <textarea rows="5" cols="45" readonly>{{$comment->content}}</textarea>
                                </div>
                                
                                        
                                <br>
                                <?php
                                if(Auth::user()->id==$comment->user_id){
                                    ?>
                                <a href="/comments/{{ $comment->id}}/edit" class="btn btn-info">Editar comentario</a>
                                <?php
                                }
                                    ?>
                                
                                <?php
                                if(Auth::user()->id==$comment->user_id){
                                    ?>
                        
                        <form action="{{route ('comments.destroy', $comment->id)}}" method="POST">
                            
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger">Borrar
                            </button>
                            </form>
                        <?php
                                }
                                    ?>
                                    <?php
                                }
                                ?>
                                @endforeach 

                    
                                </div>
                                

                        
                


                
            </div>
            
                <br>

                <br><a href="/home">Home</a>
            
            </div>
            

        </div>
    </div>
</div>

@endsection
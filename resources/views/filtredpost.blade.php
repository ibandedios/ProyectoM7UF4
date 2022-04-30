
@extends('layouts.app')

@section('content')
<?php
                            if(Auth::user()->role_id == 2){
                                ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p><a href="/postsuser" class="btn-secondary">All Posts</a></p><br>
                <form action="/postsuser/filtrar" method="POST">
                    @csrf
                    @method('GET')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Buscador:</span>
                    </div>
                    <input type="text" class="form-control" id="filtrado" name="filtrado" aria-describedby="basic-addon3">
                    <input type="submit" value="Filtrar" class="btn btn-primary">
                </div>
                </form>
                <div class="card">
                <div class="card-header">{{ __('Your posts') }}</div>
                    @foreach ($posts as $post)
                            <?php
                            //if(strlen(stristr($title, $post->title))>0){
                            if($post->title == $title){
                                ?>
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
                                    <form action="{{route ('postsuser.destroy', $post->id)}}" method="POST">
                                    <br><p><a href="/postsuser/{{ $post->id}}/edit" class="btn btn-info">Editar</a>
                                    
                                        @csrf
                                        @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Borrar
                                    </button>
                                
                                    </p>
                                    <br><p><a href="/comments/{{ $post->id}}/edit" class="btn btn-info">Comentar</a>
                                    </p>
                                </form>
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
                                </label>
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
                                    <?php
                                    }
                                    ?>
                                
                            @endforeach
                        
                


                
            </div>
            
            </div>
            

        </div>
    </div>
</div>
<?php
                            }
                            ?>

<?php
if(Auth::user()->role_id == 1){
    ?>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<p><a href="/postsuser" class="btn-secondary">All Posts</a></p><br>
<form action="/postsuser/filtrar" method="POST">
    @csrf
    @method('GET')
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3">Buscador:</span>
    </div>
    <input type="text" class="form-control" id="filtrado" name="filtrado" aria-describedby="basic-addon3">
    <input type="submit" value="Filtrar" class="btn btn-primary">
</div>
</form>
  <br>
<div class="card">
<div class="card-header">{{ __('All posts') }}</div>







@foreach ($posts as $post)
<?php
                            if($post->title == $title){
                                ?>
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
        
        <form action="{{route ('postsuser.destroy', $post->id)}}" method="POST">
        <br><p><a href="/postsuser/{{ $post->id}}/edit" class="btn btn-info">Editar</a>
        
            @csrf
            @method('DELETE')

        <button type="submit" class="btn btn-danger">Borrar
        </button>
        <a href="/comments/{{ $post->id}}/edit"class="btn btn-info">Comentar</a>
        </p>
    </form>
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
        </label>
        <textarea rows="5" cols="45" readonly>{{$comment->content}}</textarea>
        </div>
        
                
        <br>
        <form action="{{route ('comments.destroy', $comment->id)}}" method="POST">
        
            @csrf
            @method('DELETE')
            
            <a href="/editcommentact/{{ $comment->id}}/edit" class="btn btn-info">Editar comentario</a>

<button type="submit" class="btn btn-danger">Borrar
</button>
</form>
<?php
}
?>
        @endforeach  


</div>
<?php
}
    ?>
@endforeach






</div>

</div>
</div>
</div>
<?php
}
?>
@endsection

@extends('layouts.app')

@section('content')
<?php
                            if(Auth::user()->role_id == 2){
                                ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p><a href="home">Home</a></p>
                
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
                            if($post->user_id == Auth::user()->id){
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
                                    <h2><a href="post/{{$post->id}}/edit">{{ $post->title}}</a></h2>
                                    <br>
                                    <div>{{ $post->contents}}</div>
                                    <form action="{{route ('postsuser.destroy', $post->id)}}" method="POST">
                                    <br><p><a href="/postsuser/{{ $post->id}}/edit" class="btn btn-info">Editar</a>
                                    
                                        @csrf
                                        @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Borrar
                                    </button>
                                </form>
                                <br>

                    
                                </div>
                                    <?php
                                    //final del primer if   
                                    }
                                    ?>
                                
                            @endforeach
                        
                


                
            </div>
            
                <br>

                <div class="card">
                <div class="card-header">{{ __('Posts from other users') }}</div>

                    
                @foreach ($posts as $post)
                        <?php
                        if($post->user_id != Auth::user()->id){
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
                                <h2><a href="post/{{$post->id}}/edit">{{ $post->title}}</a></h2>
                                <br>
                                <div>{{ $post->contents}}</div>

                
                            </div>
                            <?php
                        }
                        ?>
                            
                @endforeach 

                    
                </div>
                <br><p><a href="home">Home</a></p>
            
            
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
<p><a href="home">Home</a></p>
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
        <div><h2><a href="post/{{$post->id}}/edit">{{ $post->title}}</a></h2></div>
        <br>
        
        <div>{{ $post->contents}}</div>
        
        <form action="{{route ('postsuser.destroy', $post->id)}}" method="POST">
        <br><p><a href="/postsuser/{{ $post->id}}/edit" class="btn btn-info">Editar</a>
        
            @csrf
            @method('DELETE')

        <button type="submit" class="btn btn-danger">Borrar
        </button>
    </form>
         


</div>
    
@endforeach






</div>
<br><p><a href="home">Home</a></p>

</div>
</div>
</div>
<?php
}
?>
@endsection
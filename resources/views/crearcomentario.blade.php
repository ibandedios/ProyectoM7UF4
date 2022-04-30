@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/comments/" method="POST">
                        @csrf
                    
                        <div clas="mb-3">
                            <div class="card-body">
                                
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                                <h4 class=" p-3" style="background-color: #eee;">{{ $post->contents}}</h2>
                                <br>
                        
                        
                        </div>
                    </div>

                    <div clas="mb-3">
                        <label class="form-label">Comentario</label>
                        <input type="text" id="content" name="content" class="form-control">
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
                    <br><div><a href="/home" class="btn-secondary btn">Cancelar</a>
                    <button type="submit" class="btn-primary btn">Comentar</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
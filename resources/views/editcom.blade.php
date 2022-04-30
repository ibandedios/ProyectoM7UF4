@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts from ') }} {{ Auth::user()->username ?? 'Nobody' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>EDITAR COMENTARIO</h1>
                    <form action="/comments/{{$comment->id}}" method="POST">

                        @csrf
                        @method('PUT')

                    <div clas="mb-3">
                        <label class="form-label">Content</label>
                        <input type="text" id="content" name="content" class="form-control" value="{{$comment->content}}">
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                    <br><div><a href="/home" class="btn-secondary btn">Cancelar</a>
                    <button type="submit" class="btn-primary btn">Enviar</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
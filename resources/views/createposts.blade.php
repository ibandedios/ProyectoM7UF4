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

                    <h1>CREAR POSTS</h1>
                    <form action="/postsuser" method="POST">
                        @csrf
                    <div clas="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div clas="mb-3">
                        <label class="form-label">Contents</label>
                        <input type="text" id="contents" name="contents" class="form-control">
                    </div>
                    <br>
                    <div><select name="tag">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endforeach
                    </select>
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
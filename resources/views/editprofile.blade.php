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

                    <h1>EDITAR PERFIL</h1>
                    <form action="/profile/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div clas="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="{{$user->username}}">
                    </div>
                    <div clas="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                    <br><div><a href="/home" class="btn-secondary btn">Volver</a>
                    <button type="submit" class="btn-primary btn">Guardar</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
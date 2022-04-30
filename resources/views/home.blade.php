@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    <p>{{ __('Muy buenas ') }}  {{ Auth::user()->username ?? 'Nobody' }} {{ __('!') }}<p><br>
                    <p><a href="/postsuser">Mostrar posts</a></p>
                    <p><a href="/createposts">Crear posts</a></p>
                    <p><a href="tags">Crear tags </a></p>
                    <p><a href="profile">Configuracion de usuario </a></p>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

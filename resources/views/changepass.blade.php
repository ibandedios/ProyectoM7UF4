@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                <input type="text" name="password" class="form-control">  
                <br><input type="submit" name="Enviar" value="Enviar">    
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<?php
    if(Auth::User()->role_id == 2){
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="home">Home</a></p>
            <div class="card">
                <div class="card-header">{{ __('Your profile') }}</div>
                
                
                
                
                    

                    
                    @foreach ($users as $user)
                            <?php
                            if($user->role_id == 2 && $user->id == Auth::User()->id){
                                ?>
                                <div class="card-body">
                                    
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{route ('postsuser.destroy', $user->id)}}" method="POST">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>{{ $user->username}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>*********</td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td><a href="/profile/{{ $user->id}}/edit" class="btn btn-info">Editar</a></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </form>
    
                        
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
<?php
if(Auth::User()->role_id == 1){
?>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <p><a href="home">Home</a></p>
        <div class="card">
            <div class="card-header">{{ __('Profiles') }}</div>

                
                @foreach ($users as $user)
                            <div class="card-body">
                                
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{route ('profile.destroy', $user->id)}}" method="POST">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{ $user->username}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>*********</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td><a href="/profile/{{ $user->id}}/edit" class="btn btn-info">Editar</a></td>
                                    <td>
                                        
                                        @csrf
                                        @method('DELETE')
                                        <?php
                                        if($user->id!=2){
                                        ?>
                                    <button type="submit" class="btn btn-danger">Borrar
                                    </button>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </form>

                    
                </div>
                            
                        @endforeach
            
        </div>

    </div>
</div>
</div>
<?php
}
?>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tags') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    /*
                    <h1>CREAR TAGS</h1>
                    <form action="/tags" method="POST">
                        @csrf
                    <div clas="mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" id="tag" name="tag" class="form-control">
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                    <br><div><a href="/home" class="btn-secondary btn">Cancelar</a>
                    <button type="submit" class="btn-primary btn">Crear</button>
                </div>
                */?>
                <p>Lista de Tags</p>
                <center>
                    <div>
                        <table>
                            <?php
                            foreach ($tags as $tag) {
                            
                            ?>
                            <tr><td>{{ $tag->tag}}</td></tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </center>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
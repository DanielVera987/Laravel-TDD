@extends('layout.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
          <h1>Editar usuario</h1>

          @if($errors->any())
            <h6>Por favor corrige los errores de abajo:</h6>
            <div class="alert alert-warning" role="alert">
              <strong>Hay errores</strong>
            </div>
          @endif

          <form action="{{ url("usuarios/{$user->id}") }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <input type="text" name="name" value="{{ old('user', $user->name) }}">
            @if ($errors->has('name'))
              <small>{{ $errors->first('name') }}</small>
            @endif

            <input type="email" name="email" value="{{ old('user', $user->email) }}">
            @if ($errors->has('email'))
              <small>{{ $errors->first('email') }}</small>
            @endif

            <input type="password" name="password" value="">
            @if ($errors->has('password'))
              <small>{{ $errors->first('password') }}</small>
            @endif

            <input type="submit" value="Crear">
          </form>

        </div>
    </div>
@endsection
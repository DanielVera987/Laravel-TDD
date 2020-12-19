@extends('layout.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
          <h1>Crear Nuevo Usuario</h1>

          <form action="{{ route('user.store') }}" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Crear">
          </form>

        </div>
    </div>
@endsection
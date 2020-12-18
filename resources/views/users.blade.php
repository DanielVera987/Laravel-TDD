@extends('layout.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
               <h1>Listado de usuarios</h1>
            </div>
        </div>
    </div>
    <ul>
    @forelse($users as $value)
        <li>{{ $value->name }} - {{ $value->email }}</li>
    @empty
        No hay usuarios registrados.
    @endforelse
    <ul>
@endsection

@extends('layout.layout')

@section('content')
    @foreach($users as $value)
    <h1>{{ e($value) }}</h1>
    @endforeach
    
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Welcome User
            </div>
        </div>
    </div>
@endsection

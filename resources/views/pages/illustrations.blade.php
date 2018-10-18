@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($illustrations) > 0)
        <ul class="list-group">
            @foreach($illustrations as $illustrate)
            <li class="list-group-item">{{$illustrate}}</li>
            @endforeach
        </ul>
    @endif
@endsection
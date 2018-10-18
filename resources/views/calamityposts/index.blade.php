@extends('layouts.app')

@section('content')
    <br/>
    @if(count($calamities) > 0)
        @foreach($calamities as $calamity)
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img style="width:40%" src="{{ asset('image/' . $calamity->image) }}">
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <h3><a href="/calamityposts/{{$calamity->id}}">{{$calamity->name}}</a></h3>
                        <small>Written on {{$calamity->created_at}}</small>
                    </div>
                </div>
            </div>



        @endforeach
        {{$calamities->links()}}
    @else
        <p>No calamities found.</p>
    @endif
@endsection
@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Edit a Calamity</h1>
    <br/>
    {!! Form::open(['action' => ['PostsController@update', $calamity->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="well">
        <div class="row">
            <div class="col-md-6 col-sm-6">
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $calamity->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $calamity->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
            </div>
            <div class="col-md-6 col-sm-6">
            <br/>
    <div class="form-group">
        {{Form::label('image', 'Image')}} <br/>
        {{Form::file('image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                <button type="button"  class="btn"><a href="/calamityposts">Cancel</a></button></div>
    {!! Form::close() !!}
            </div>
@endsection
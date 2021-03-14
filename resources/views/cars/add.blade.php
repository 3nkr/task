@extends('layouts.app')
@section('content')
  <h1>Add new Car</h1>
  {!! Form::open(['action' => 'App\Http\Controllers\CarsController@store','method'=>'POST','enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        {{Form::label('name', 'Car Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'name'])}}
    </div>
    <div class="form-group">
        {{Form::label('model', 'Car Model')}}
        {{Form::text('model','',['class'=>'form-control','placeholder'=>'model'])}}
    </div>
    <div class="form-group">
        {{Form::label('color', 'Car Color')}}
        {{Form::text('color','',['class'=>'form-control','placeholder'=>'color'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Car Description')}}
        {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'description'])}}

    </div>
    <div class="form-group">
        {{Form::file('image')}}
    </div>
    {{Form::submit('Add',['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection

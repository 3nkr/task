@extends('layouts.app')
@section('content')
  <h1>Edit Car</h1>
  {!! Form::open(['action' => ['App\Http\Controllers\CarsController@update',$car->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Car Name')}}
        {{Form::text('name',$car->CarName,['class'=>'form-control','placeholder'=>'name'])}}
    </div>
    <div class="form-group">
        {{Form::label('model', 'Car Model')}}
        {{Form::text('model',$car->CarModel,['class'=>'form-control','placeholder'=>'model'])}}
    </div>
    <div class="form-group">
        {{Form::label('color', 'Car Color')}}
        {{Form::text('color',$car->CarColor,['class'=>'form-control','placeholder'=>'color'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Car Description')}}
        {{Form::textarea('description',$car->CarDes,['class'=>'form-control','placeholder'=>'description'])}}

    </div>
    <div class="form-group">
        {{Form::file('image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection

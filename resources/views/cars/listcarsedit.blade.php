@extends('layouts.app')
@section('content')
    <h1>Select which car need to edited</h1>
    @if(count($cars) > 0)
        @foreach($cars as $car)
            <div class="well">
                <div class="row">

                    <img style="width:20%" src="/storage/image/{{$car->car_img}}">
                    <div class="col-md-6 col-sm-8">
                        <h3>{{$car->CarName}} </h3>
                        <small>Color: {{$car->CarColor}} <br> Model: {{$car->CarModel}} <br> Description: {{$car->CarDes}} </small>
                    </div>
                    <div class="col-sm-2 text-right" style="margin-top: 100px">
                    <a href="{{$car->id}}/edit" class="btn btn-primary ">Edit</a>
                    <br>
                    <br>
                    {!!Form::open(['action' => ['App\Http\Controllers\CarsController@destroy', $car->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No cars found</p>
    @endif
@endsection

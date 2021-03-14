
@extends('layouts.app')

@section('content')
    <h1>Cars</h1>
    @if(count($cars) > 0)
        @foreach($cars as $car)
            <div class="well">
                <div class="row">

                        <img style="width:20%" src="/storage/image/{{$car->car_img}}">

                    <div class="col-md-8 col-sm-8">
                        <h3>{{$car->CarName}} </h3>
                        <small>Color: {{$car->CarColor}} <br> Model: {{$car->CarModel}} <br> Description: {{$car->CarDes}} </small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No cars found</p>
    @endif
@endsection

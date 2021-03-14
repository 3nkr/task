@extends('layouts.app')
@section('content')
    <h1 style="text-align: center">Welcome!</h1>
    <h3>Here, there are some options that allow you to add a product, modify its data, or delete it from the database </h3>

    <div class="row">
        <div class="col-sm-6">
          <div class="card text-center">
            <div class="card-body">
              <h4 class="card-title">Add New Car</h4>
              <br>
              <a href="cars/create" class="btn btn-primary">Add</a>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title">Edit & Delete any Car info.</h4>
                <br>
                <a href="cars/list" class="btn btn-primary">Edit & Delete</a>
              </div>
            </div>
          </div>

      </div>

@endsection

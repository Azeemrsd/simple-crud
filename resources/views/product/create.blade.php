@extends('layouts.app');

@section('content')
<div class="container">
<h1>Add Product</h1>

{!! Form::open(['action'=>'ProductController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name of the product'])}}
        {{Form::label('price','Price')}}
        {{Form::text('price','',['class'=>'form-control','placeholder'=>'Enter Price of the product'])}}

         {{Form::label('desc','Description')}}
        {{Form::textarea('desc','',['class'=>'form-control','placeholder'=>'Enter Description of the product','rows'=>'4'])}}
        <div class="form-group">
            {{Form::file('product_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-success my-1'])}}


{!! Form::close() !!}
</div>

@endsection

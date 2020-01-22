@extends('layouts.app');

@section('content')
<div class="container">
<h1>Edit Product</h1>


{!! Form::open(['action'=>['ProductController@update',$product->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$product->name,['class'=>'form-control','placeholder'=>'Enter Name of the product'])}}
        {{Form::label('price','Price')}}
        {{Form::text('price',$product->price,['class'=>'form-control','placeholder'=>'Enter Price of the product'])}}

         {{Form::label('desc','Description')}}
        {{Form::textarea('desc',$product->desc,['class'=>'form-control','placeholder'=>'Enter Description of the product','rows'=>'4'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-success my-1'])}}


{!! Form::close() !!}


@endsection

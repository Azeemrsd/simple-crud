@extends('layouts.app');

@section('content')

    <div class="container">
        <a href="/products" class="btn btn-primary">Back</a>
        <div class="card my-2" style="width:500">
            <img src="/storage/product_images/{{$product->product_image}}" alt="image" height="495" width="495" class="text-center">
        <h3>{{$product->name}}</h3>
    <p>{{$product->price}}</p>
    <p>{{$product->desc}}</p>
    </div>
    <a href="/products/{{$product->id}}/edit" class="btn btn-success">Edit Product</a>
    {{-- <a href="/products" class="btn btn-danger">Delete Product</a> --}}
    {!!Form::open(['action'=>['ProductController@destroy',$product->id], 'method'=>'POST','class'=>'my-2'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete Product',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    @if(count($products)>0)
@foreach ($products as $product)
    <div class="card m-2" style="width:225">
    <a href="/products/{{$product->id}}"><img src="/storage/product_images/{{$product->product_image}}/" alt="image" height="200" width="200" class="text-center"></a>
    <div class="card-title m-2 text-center ">{{$product->name}}</div>
    <div class="text-center">Price:{{$product->price}}</div>
    <a href="/add-to-cart/{{$product->id}}" class="btn btn-success m-2  ">Add To Cart</a>
    </div>

@endforeach
{{$products->links()}}
    @else
<p>No products to load
    @endif

@endsection
</div>

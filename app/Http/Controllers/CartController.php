<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function show($id){
       $product = Product::find($id);
       $product->incart = 'yes';
       return 'Added to cart';

    }
}

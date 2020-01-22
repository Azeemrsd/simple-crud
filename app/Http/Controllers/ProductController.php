<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        $products = Product::orderBy('name','asc')->paginate(4);
        return view('product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'product_image'=>'image|nullable|max:1999'
        ]);

        //handle file upload
if($request->hasFile('product_image')){
    //Get the filename with the extension
$fileNameWithExt = $request->file('product_image')->getClientOriginalName();
//Get just filename
$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//Get just Extenstion
$extension = $request->file('product_image')->getClientOriginalExtension();
//file name to store

$fileNameToStore = $filename.'_'.time().'_'.$extension;
//Upload image
$path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);

}else{
    $fileNameToStore = 'noimage.jpg';
}

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');
        $product->product_image = $fileNameToStore;
        $product->save();
        return redirect('/products')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('product.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');
        $product->save();
        return redirect('/products')->with('success', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
          return redirect('/products')->with('success', 'Product Deleted Successfully');
    }
}

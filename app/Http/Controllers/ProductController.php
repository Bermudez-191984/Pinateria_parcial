<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::all();
        return view("layouts\products\index",compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("layouts\products\create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/products'))
            {
                mkdir('uploads/products',0777,true);
            }
            $image->move('uploads/products',$imagename);
        }else{
            $imagename = "";
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->reference = $request->reference;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->image = $imagename;
        $product->status = 1;
        $product->registerby = $request->user()->id;
        $product->save();

        return redirect()->route('product.index')->with('successMsg','El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view("layouts.products.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id){
  
        $product = Product::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/products'))
            {
                mkdir('uploads/porducts',0777,true);
            }
            $image->move('uploads/products',$imagename);
        }else{
            $imagename = $product->image;
        }
        
       
        $product->name= $request->name;
        $product->description = $request->description;
        $product->reference = $request->reference;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->image=$imagename;
        $product->status=1;
        $product->registerby=$request->user()->id;
        $product->save();
        return redirect()->route('product.index')->with('successMsg','El registro se actualizó exitosamente');
     
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product ->delete();
        return redirect()->route('product.index')->with('eliminar','ok');
    }

    public Function cambioestadoproduct(Request $request)
    {
        $product = Product::find ($request->product_id);
        $product-> status=$request->status;
        $product->save();

    }
}
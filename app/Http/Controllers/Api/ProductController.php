<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'slug' => 'required',
            'description' => 'required',
           
            
            
        ]);

        return Product::create($request->all());
    }

   
    public function show($id)
    {
        return Product::find($id);
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

   
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Product Deleted',
        ]);

       
    }



    public function search($name)
    {
      return  $product = Product::where('name', 'like', '%'.$name.'%')->get();
        

       
    }
}

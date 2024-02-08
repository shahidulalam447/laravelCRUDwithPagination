<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        // $products = Product::latest()->get();
        $products = Product::latest()->paginate(5);

        return view('products.index',['products'=>$products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        // dd($request->all());   >For check and show

        //Validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);


        //Upload image
        $imageNmae = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageNmae);

        // dd($imageNmae);
        $product = new Product;
        $product->image = $imageNmae;
        $product->name =$request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Added Successfully !!!');
    }
    public function edit($id){
        // dd($id);

        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);


    }
    public function update(Request $request, $id){
        // dd($request->all());
         //Validate data
         $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        // product fetch
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){

            //Upload image
            $imageNmae = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageNmae);
            $product->image = $imageNmae;

        }

        $product->name =$request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated Successfully !!!');


    }
    public function destroy($id){

        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully !!!');

    }
    public function show($id){

        $product = Product::where('id',$id)->first();

        return view('products.show',['product'=>$product]);

    }
}

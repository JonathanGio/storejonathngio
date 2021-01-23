<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $data = Product::all();
        
        return view('layouts.dashboard.products.index', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $user = $request->user();
        //Imagen de servicios
        if ($request->file('avatar')){
           $image = $request->file('avatar');           
           $name_image = md5($image). '_' . time() . '.' . $image->getClientOriginalExtension();            
           $image_path = public_path() . '/img/products/';
           $image->move($image_path, $name_image);   
        }else{
           $name_image = "undefined"; 
        }
         
        //generamos el objeto
        $product = new Product;
        $product->user_id = $user->id;
        $product->sku = md5(date('Y-d-H-s'));
        $product->title = ucwords(strtolower($request->title));
        $product->subtitle = $request->sub_title;
        $product->price = $request->price;
        $product->details = $request->details;;
        $product->more_info = $request->more_info;
        $product->avatar = $name_image;
        $product->available = 0;
        $product->stock_available = $request->stock_in;

        if ($product->save()) {
            # code...            
            return redirect()->back()->with('status', 'Se agrego el producto '.$product->title.' Exitosamente!!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $product = Product::find($id);

        if ($request->file('avatar')){
            $image = $request->file('avatar');           
            $name_image = md5($image). '_' . time() . '.' . $image->getClientOriginalExtension();            
            $image_path = public_path() . '/img/products/';
            $image->move($image_path, $name_image);   
         }else{
            $name_image = $product->avatar; 
         }

        
        $product->title = ucwords(strtolower($request->title));
        $product->subtitle = $request->sub_title;
        $product->price = $request->price;
        $product->details = $request->details;;
        $product->more_info = $request->more_info;
        $product->avatar = $name_image;
        $product->available = $request->active;
        $product->stock_available = $request->stock_in;
        if ($product->save()) {
            return redirect()->back()->with('status', 'Se modifico el producto '.$product->title.' exitosamente.');            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $data = Product::find($id);
        if($data->delete()){
            return redirect()->back()->with('status', 'Product '.$data->id.' deleted');
        }
    }
}

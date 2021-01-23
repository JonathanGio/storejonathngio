<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\InShoppingCart;
use App\ShoppingCart;
use App\Order;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $data = Product::where('available', 1)->get();
        
        return view('welcome', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $shopping_cart = ShoppingCart::create([
            'status' => "approved",
            'customid' => md5($request->product_id),           
        ]);

        $in_shopping_cart = InShoppingCart::create([
            'product_id' => $request->product_id,
            'shoppingcart_id' => $shopping_cart->id,
            'count' => 1        
        ]);
        //Update Stock Product 
        $minus = Product::find($request->product_id);
        $minus->stock_available = $minus->stock_available - 1;
        $minus->save();

        //Create Order
        $orderMoney = new Order;

        $orderMoney->shoppingcart_id   = $shopping_cart->id;
        $orderMoney->recipient_name = $request->recipient_name;
        $orderMoney->email = $request->email;
        $orderMoney->phone = $request->phone;
        $orderMoney->status = "paidout";
        $orderMoney->sub_total = $request->total;
        $orderMoney->details = $request->details;   

        if ($orderMoney->save()) {
            # code...
            return redirect()->route('order.response.oh', ['id' => $orderMoney->id]);            
        }

    }

    public function orderpay($id){
        # code...
        $order = Order::find($id);
        $order->each(function($order){
            $order->shoppingcart;           
        });
        
        $in_shopping_cart = InShoppingCart::where('shoppingcart_id', $order->shoppingcart_id)->first();
        
        $product = Product::find($in_shopping_cart->product_id);

        return view('orderpay', ['order' => $order, 'product' => $product]);
    }

    public function ticket($id){        
        // 
        $order = Order::find($id);
        $pdf = \PDF::loadView('layouts.components.ticket', array('data' => $order));
        // (Optional) Setup the paper pdf.ticketsize and orientation
        $pdf->setPaper('C4', 'portrait');
        return $pdf->stream('Factura_'.date('d-m-Y').'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sku){
        //
        $product = Product::where('sku', $sku)->first();     
        return view('shop.sku', ['product' => $product]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

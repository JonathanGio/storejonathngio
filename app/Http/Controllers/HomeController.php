<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prodtot = Product::count();
        $ordertot = Order::sum('sub_total');
        
        $orders = Order::all();

        return view('home', ['prodtot' => $prodtot, 'ordertot' => $ordertot, 'allorders' => $orders]);
    }
}

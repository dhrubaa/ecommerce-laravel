<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\Order_details;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('orders.index',['products' => $products, 'orders'=>$orders]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request->all();
        
        DB::transaction(function() use ($request){

            //order model
            $orders = new Order;
           
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;

            //order details model
            for ($product_id=0; $product_id < count($request->product_id ); $product_id++) { 
                $order_details = new Order_details;
                $order_details->Order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->unitprice = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
              
                $order_details->discount = $request->discount[$product_id];
                $order_details->amount = $request->amount[$product_id];
                $order_details->save();
            }
             
            //transaction model

            $transaction = new Transaction;
            $transaction->Order_id = $order_id;
            $transaction->user_id = auth()->user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->transaction_amount = $order_details->amount;
            $transaction->transaction_date = date('y-m-d');
            $transaction->save();


            //last order history
        $products = Product::all();
        $order_details = Order_details::where('order_id','$order->id')->get();
        $orderedBy = Order::where('id',$order_id)->get();

        return view('orders.index',[
            'products'=> $products,
            'order_details'=> $order_details,
            'customer_orders' =>$orderBy
        ]);

 });
       return "details cannot be inserted please check the input !!!";


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    public function index()
    {
    
        $cartItems = Cart::instance('cart')->content();
        return view('checkout', ['cartItems'=>$cartItems]);
    }

    public function thankyou()
    {
        Cart::instance('cart')->destroy();
        return view('thanksfororder');
    }

    public function store(Request $request)
    {
        $cartItems = Cart::instance('cart')->content();
        $order = new Order();
        $order->name = $request->firstName . " " . $request->lastName;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->kraj = $request->kraj;
        $order->zeme = $request->zeme;
        $order->psc = $request->psc;
        $order->total = Cart::instance('cart')->total();
        $order->paymentMethod = $request->paymentMethod;
        $order->save();
        $orderId = $order->id;
        foreach ($cartItems as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $orderId;
            $order_item->product_id = $item->id;
            $order_item->quantity = $item->qty;
            $order_item->save();
        }

        return redirect('/checkout/thankyou');
    }
}

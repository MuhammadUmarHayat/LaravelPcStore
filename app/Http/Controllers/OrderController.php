<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Auth;
class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $total = $cart->items->sum(function($item) {
            return $item->quantity * $item->item->price;
        });
    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => $total,
        'status' => 'pending'
    ]);

    foreach ($cart->items as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'item_id' => $cartItem->item_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->item->price
        ]);
    }

    $cart->items()->delete();

    return response()->json(['message' => 'Order placed successfully']);
}

public function viewOrders()
{
    $orders = Order::where('user_id', Auth::id())->with('items.item')->get();
    return view('orders.view', compact('orders'));
}
}

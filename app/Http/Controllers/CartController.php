<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Item;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $itemId)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->updateOrCreate(
            ['item_id' => $itemId],
            ['quantity' => $request->quantity]
        );

        return response()->json(['message' => 'Item added to cart']);
    }

    public function removeFromCart($itemId)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->items()->where('item_id', $itemId)->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function editCartItem(Request $request, $itemId)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItem = $cart->items()->where('item_id', $itemId)->first();
        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart item updated']);
    }

    public function viewCart()
    {
        $cart = Cart::with('items.item')->where('user_id', Auth::id())->first();
        return view('cart.view', compact('cart'));
    } 



}

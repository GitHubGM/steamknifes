<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart; // example if you store cart in DB

        return Inertia::render('Cart', [
            'cartItems' => $cart->items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
            }),
            'total' => $cart->totalPrice(),
        ]);
    }

}

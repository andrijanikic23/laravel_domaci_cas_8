<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    public function index()
    {
        return view("cart", [
           "cart" => Session::get("product")
        ]);
    }
    public function addToCart(ShoppingCartRequest $request)
    {

        Session::push("product", [
            "productId" => $request->id,
            "quantity" => $request->quantity
        ]);

        return redirect()->route("cart.index");
    }
}

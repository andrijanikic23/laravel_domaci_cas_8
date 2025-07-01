<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use App\Models\ShopModel;
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
        $product = ShopModel::where(["id" => $request->id])->first();

        $productInStock = $product->amount;

        $productName = $product->name;

        if($productInStock < $request->quantity)
        {
            return redirect()->back()->with(["error" => "Not enough product in stock"]);
        }

        Session::push("product", [
            "productId" => $request->id,
            "productName" => $productName,
            "quantity" => $request->quantity
        ]);

        return redirect()->route("cart.index");
    }
}

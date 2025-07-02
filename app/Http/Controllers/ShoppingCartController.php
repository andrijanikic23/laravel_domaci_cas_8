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

        $combined = [];
        foreach(Session::get("product") as $item)
        {
            $product = ShopModel::firstWhere(["id" => $item["productId"]]);
            if($product){
                $combined[] = [
                  "name" => $product->name,
                  "quantity" => $item["quantity"],
                  "price" => $product->price,
                  "total" => $item["quantity"] * $product->price
                ];
            }
        }

        return view("cart", [
            "combinedItems" => $combined
        ]);
    }
    public function addToCart(ShoppingCartRequest $request)
    {
        $product = ShopModel::where(["id" => $request->id])->first();


        if($product->amount < $request->quantity)
        {
            return redirect()->back()->with(["error" => "Not enough product in stock"]);
        }

        Session::push("product", [
            "productId" => $request->id,
            "quantity" => $request->quantity
        ]);


        return redirect()->route("cart.index");
    }
}

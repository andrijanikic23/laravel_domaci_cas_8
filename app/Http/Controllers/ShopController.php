<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopModel;

class ShopController extends Controller
{
    public function get_all_products()
    {
        $all_products = ShopModel::all();
        return view("all_products", compact('all_products'));
    }

    public function delete($product)
    {
        $single_product = ShopModel::where(['id' => $product])->first();
        
        if($single_product === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI!");
        }
        else
        {
            $single_product->delete();
        }

        return redirect()->back();
    }


    public function add_product(Request $request)
    {
        $request->validate([
            "name" => "required|string|unique:products,name",
            "description" => "required|string",
            "amount" => "required|int|min:0",
            "price" => "required|min:0"
        ]);

        ShopModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("amount")
        ]);

        return redirect("/admin/all-products");
    }
    public function single_product(Request $request, $id)
    {
        $product = ShopModel::where(['id' => $id])->first();
        
        if($product === null)
        {
            die("Ovaj proizvod ne postoji");
        }


        return view("products.edit", compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = ShopModel::where(['id' => $id])->first();
        
        if($product === null)
        {
            die("Ovaj proizvod ne postoji");
        }

        $product->name = $request->get("name");
        $product->description =$request->get("description");
        $product->amount = $request->get("amount");
        $product->price =$request->get("price");
        $product->save();

        return redirect()->back();


    }
    
}

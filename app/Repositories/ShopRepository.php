<?php

namespace App\Repositories;


use App\Models\ShopModel;

class ShopRepository
{
    private $shopModel;

    public function __construct()
    {
        $this->shopModel = new ShopModel();
    }

    public function createNew($request)
    {
        $this->shopModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("amount")
        ]);
    }

    public function getProductById($id)
    {
        return $this->shopModel->where(["id" => $id])->first();
    }

    public function editProduct($product, $request)
    {
        $product->name = $request->get("name");
        $product->description =$request->get("description");
        $product->amount = $request->get("amount");
        $product->price =$request->get("price");
        $product->save();
    }
}

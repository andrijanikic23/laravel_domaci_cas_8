<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveShopRequest;
use App\Models\User;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;
use App\Models\ShopModel;

class ShopController extends Controller
{

    private $shopRepo;

    public function __construct()
    {
        $this->shopRepo = new ShopRepository();
    }
    public function get_all_products()
    {
        $all_products = ShopModel::all();
        return view("all_products", compact('all_products'));
    }

    public function delete($product)
    {
        $single_product = $this->shopRepo->getProductById($product);

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


    public function add_product(SaveShopRequest $request)
    {

        $this->shopRepo->createNew($request);

        return redirect("/admin/all-products");
    }
    public function single_product(Request $request, ShopModel $product)
    {
        return view("products.edit", compact('product'));
    }

    public function edit(Request $request, ShopModel $product)
    {
        $this->shopRepo->editProduct($product, $request);

        return redirect()->back();
    }

}

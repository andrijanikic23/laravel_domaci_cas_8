<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveShopRequest;
use App\Models\User;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;
use App\Models\ShopModel;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    private $shopRepo;

    public function __construct()
    {
        $this->shopRepo = new ShopRepository();
    }

    public function index()
    {

        $products = ShopModel::all();
        return view("shop", compact("products"));
    }
    public function getAllProducts()
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


    public function addProduct(SaveShopRequest $request)
    {

        $this->shopRepo->createNew($request);

        return redirect()->route("product.all");
    }
    public function singleProduct(Request $request, ShopModel $product)
    {
        return view("products.edit", compact('product'));
    }

    public function edit(Request $request, ShopModel $product)
    {
        $this->shopRepo->editProduct($product, $request);

        return redirect()->back();
    }

    public function selectedProduct(ShopModel $product)
    {
        return view("permalink", compact("product"));
    }

}

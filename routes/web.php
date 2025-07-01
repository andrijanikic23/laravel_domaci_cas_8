<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomepageController::class, 'index']);

Route::view("/about", "about");

Route::get("/shop", [ShopController::class, "index"])
    ->name("shop.index");
Route::get("/product/{product}",[ShopController::class, "selectedProduct"])
    ->name("product.selected");
Route::post("/cart/add", [\App\Http\Controllers\ShoppingCartController::class, "addToCart"])
    ->name("cart.add");
Route::get("/cart", [\App\Http\Controllers\ShoppingCartController::class, "index"])
    ->name("cart.index");

Route::view("/contact", "contact");






Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function(){

    Route::view("/product/add", "add_product");
    Route::controller(ShopController::class)->prefix("/product")->name("product.")->group(function(){
        Route::get("/all", "getAllProducts")->name("all");
        Route::get("/delete/{product}", "delete")->name("delete");
        Route::get("/edit/{product}", "singleProduct")->name("single");
        Route::post("/save/{product}", "edit")->name("save");
        Route::post("/send", "addProduct")->name("send");
    });


    Route::controller(ContactController::class)->prefix("/contact")->name("contact.")->group(function(){
       Route::get("/all", "getAllContacts")->name("all");
       Route::get("/delete/{contact}", "delete")->name("delete");
       Route::get("/edit/{id}", "singleContact")->name("single");
       Route::post("/save/{id}", "edit")->name("save");
       Route::post("/send", "sendContact")->name("send");
    });

});




require __DIR__.'/auth.php';

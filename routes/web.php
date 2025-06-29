<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomepageController::class, 'index']);

Route::view("/about", "about");


Route::view("/contact", "contact");






Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function(){

    Route::view("/add-product", "add_product");
    Route::controller(ShopController::class)->group(function(){
        Route::get("/all-products", "getAllProducts")->name("allProducts");
        Route::get("/delete-product/{product}", "delete");
        Route::post("/send-product", "addProduct")->name("product.send");
        Route::get("/product/edit/{product}", "singleProduct")->name("product.single");
        Route::post("/product/save/{product}", "edit")->name("product.save");
    });


    Route::controller(ContactController::class)->prefix("/contact")->group(function(){
       Route::get("/all", "getAllContacts")->name("contact.all");
       Route::get("/delete/{contact}", "delete")->name("contact.delete");
       Route::get("/edit/{id}", "singleContact")->name("contact.single");
       Route::post("/save/{id}", "edit")->name("contact.save");
       Route::post("/send", "sendContact")->name("contact.send");
    });

});




require __DIR__.'/auth.php';

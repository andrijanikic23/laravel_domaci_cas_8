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
Route::post("/send-contact", [ContactController::class, "sendContact"])
    ->name("send.contact");





Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function(){

    Route::get("/all-products", [ShopController::class, 'get_all_products'])
        ->middleware("auth")
        ->name("allProducts");
    Route::get("/delete-product/{product}", [ShopController::class, "delete"]);
    Route::view("/add-product", "add_product");
    Route::get("/delete-contact/{contact}", [ContactController::class, "delete"]);


    Route::get("/product/edit/{product}", [ShopController::class, "single_product"])
        ->name("product.single");

    Route::post("/product/save/{product}", [ShopController::class, "edit"])
        ->name("product.save");

    Route::get("/contact/edit/{id}", [ContactController::class, "single_contact"])
        ->name("contact.single");

    Route::post("/contact/save/{id}", [ContactController::class, "edit"])
        ->name("contact.save");

    Route::post("/send-product", [ShopController::class, "add_product"])
        ->name("product.send");
    Route::get("/all-contacts", [ContactController::class, 'get_all_contacts']);
});




require __DIR__.'/auth.php';

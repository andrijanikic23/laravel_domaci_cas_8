<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\HomepageController::class, 'index']);

Route::view("/about", "about");




Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, 'get_all_contacts']);




Route::get("/admin/all-products", [\App\Http\Controllers\ShopController::class, 'get_all_products']);
Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ShopController::class, "delete"]);

Route::view("/contact", "contact");
Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"])
    ->name("send.contact");

Route::view("/admin/add-product", "add_product");
Route::post("/send-product", [\App\Http\Controllers\ShopController::class, "add_product"]);




Route::get("/admin/delete-contact/{contact}", [\App\Http\Controllers\ContactController::class, "delete"]);

//HOMEWORK
Route::get("/admin/product/edit/{product}", [\App\Http\Controllers\ShopController::class, "single_product"])
    ->name("product.single");

Route::post("/admin/product/save/{product}", [\App\Http\Controllers\ShopController::class, "edit"])
    ->name("product.save");

//HOMEWORK
Route::get("/admin/contact/edit/{id}", [\App\Http\Controllers\ContactController::class, "single_contact"])
    ->name("contact.single");

Route::post("/admin/contact/save/{id}", [\App\Http\Controllers\ContactController::class, "edit"])
    ->name("contact.save");


require __DIR__.'/auth.php';

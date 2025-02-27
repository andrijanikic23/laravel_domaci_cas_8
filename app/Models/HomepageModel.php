<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageModel extends Model
{
    protected $table = "products";

    protected $fillable = [
        "name", "description", "amount", "price"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = "contact"; //ContactModel -> "contact"

    protected $fillable = [
         "email", "subject", "message"
    ];
}

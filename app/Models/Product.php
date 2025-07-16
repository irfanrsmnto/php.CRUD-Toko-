<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\table;

class Product extends Model
{

    protected $table = 'products';
    protected $guarded = [
        'id'
    ];
}

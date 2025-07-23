<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Laravel\Prompts\table;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'products';
    
    protected $guarded = [
        'id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // opsional, jika kamu juga soft delete order items

class OrderItemModel extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    // Tambahkan kolom product_name dan price_at_order ke fillable
    protected $fillable = [
        'order_id', 
        'product_id', 
        'qty', 
        'harga_satuan', 
        'product_name',    // nama produk saat order dibuat
        'price_at_order',  // harga produk saat order dibuat
    ];

    public function product()
    {
        // Relasi dengan produk, denganTrashed agar produk soft deleted tetap bisa diakses
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
}

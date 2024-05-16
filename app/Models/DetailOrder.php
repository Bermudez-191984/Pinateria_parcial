<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = "detailsorders";
    protected $fillable = ['amount', 'subtotal', 'registerby', 'id_product', 'id__order'];
    protected $guarded = ['id', 'created_at', 'updated_at', 'registerby'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function _order()
    {
        return $this->belongsTo(_Order::class);
    }
}
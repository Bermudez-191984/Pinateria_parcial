<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name','amount','description','reference','price','status','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','status','registerby'];

    public function details_orders()
    {
    return $this->hasMany(DetailOrder::class);
    }
}

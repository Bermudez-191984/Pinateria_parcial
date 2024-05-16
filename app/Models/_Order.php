<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _Order extends Model
{
    use HasFactory;
    protected $table = "_orders";
    protected $fillable = ['total', 'dateorder', 'status', 'registerby', 'id_customer', 'route'];
    protected $guarded = ['id', 'created_at', 'updated_at', 'status', 'registerby'];


    public function details_orders()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
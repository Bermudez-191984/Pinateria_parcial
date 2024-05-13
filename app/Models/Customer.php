<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = ['firtname','secondname','lastname','second lastname','age','email'];
    protected $guarded = ['id','created_at', 'updated_at'];

    public function orders()
    {
    return $this->hasMany(_Order::class);
    }
}

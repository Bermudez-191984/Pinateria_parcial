<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = ['firtname', 'secondname', 'lastname', 'second lastname', 'age', 'document', 'email', 'status', 'registerby'];
    protected $guarded = ['id', 'created_at', 'updated_at', 'status', 'registerby'];

    public function orders()
    {
        return $this->hasMany(_Order::class);
    }
}
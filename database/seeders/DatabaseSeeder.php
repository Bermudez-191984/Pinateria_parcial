<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\_Order;
use App\Models\Customer;
use App\Models\DetailOrder;
use Illuminate\Database\Seeder;
use App\Models\Product; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\User::factory(5)->create();
         Product::factory(5)->create();
         Customer::factory(15)->create();
         _Order::factory(20)->create();
         DetailOrder::factory(20)->create();
         

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

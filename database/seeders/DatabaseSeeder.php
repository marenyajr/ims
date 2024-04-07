<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@ims',
            'password' => Hash::make('12345678')
        ]);
        $user->addRole('admin');

        \App\Models\Product::create([
            'name' => 'Red Bull',
            'category' => 'Beverages',
            'capacity' => '500ml',
            'description' => 'Red ull give you wings',
            'selling_price' => 15.00,
            'unit_price' => 13.50,
            'quantity_in_stock' => 45,
            'supplier_id' => 1
        ]);

        \App\Models\Product::create([
            'name' => 'Cashew Nuts',
            'category' => 'Snacks',
            'capacity' => '100g',
            'description' => 'Tasty nuts',
            'selling_price' => 12.00,
            'unit_price' => 10.00,
            'quantity_in_stock' => 89,
            'supplier_id' => 1
        ]);

        \App\Models\Product::create([
            'name' => 'Barbeque',
            'category' => 'Food staffs',
            'capacity' => '500g',
            'description' => 'Tasty roasted meat',
            'selling_price' => 12.00,
            'unit_price' => 7.50,
            'quantity_in_stock' => 7,
            'supplier_id' => 1
        ]);

        \App\Models\Product::create([
            'name' => 'Orange Juice',
            'category' => 'Beverages',
            'capacity' => '750ml',
            'description' => 'Fresh juice',
            'selling_price' => 10.00,
            'unit_price' => 5.50,
            'quantity_in_stock' => 34,
            'supplier_id' => 1
        ]);

        \App\Models\Product::create([
            'name' => 'Green Tea',
            'category' => 'Beverages',
            'capacity' => '30g',
            'description' => 'Healthy tea with health benefits',
            'selling_price' => 20.00,
            'unit_price' => 15.50,
            'quantity_in_stock' => 30,
            'supplier_id' => 1
        ]);
        
    }
}

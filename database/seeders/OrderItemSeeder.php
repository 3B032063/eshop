<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::all()->each(function($order){
            OrderItem::factory(3)->create([
                'order_id' => $order->id,
                'product_id' => function () {
                    $randomProduct = Product::inRandomOrder()->first();
                    return $randomProduct ? $randomProduct->id : Product::factory()->create()->id;
                },
            ]);
        });
    }
}

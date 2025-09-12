<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo user mẫu
        $user = User::create([
            'name' => 'Nguyen Van A',
            'email' => 'a@example.com',
            'password' => bcrypt('123456')
        ]);

        // Tạo sản phẩm mẫu
        $product = Product::create([
            'name' => 'Laptop Test',
            'thumbnail' => 'laptop.png',
            'price' => 1500,
            'stock' => 10,
        ]);

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $user->id,
            'total' => 1500,
            'status' => 'completed'
        ]);

        // Thêm chi tiết đơn hàng
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => 1500
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $data = [
          ['name' => 'The Matrix Trilogy 1', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 2', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 3', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 4', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 5', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 6', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 7', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 8', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 9', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 10', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 11', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 12', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 13', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 14', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 15', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 16', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 17', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 18', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'The Matrix Trilogy 19', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 1', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 2', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 3', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 4', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 5', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 6', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 7', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 8', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 9', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 10', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 11', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 12', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 13', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 14', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 15', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 16', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 17', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 18', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Macbook Air 19', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Server Rack', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Server Farm', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Watch', 'created_at' => $now, 'updated_at' => $now],
        ];

        Product::insert($data);
    }
}

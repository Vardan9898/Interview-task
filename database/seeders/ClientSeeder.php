<?php

namespace Database\Seeders;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
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
            ['name' => 'Acme', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apple', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Microsoft', 'created_at' => $now, 'updated_at' => $now],
        ];

        Client::insert($data);
    }
}

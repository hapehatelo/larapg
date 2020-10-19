<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randcode = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $seed_items = [
            [
                'item_name'         => 'Kayu',
                'item_description'  => 'ini deskripsi kayu',
            ],
            [
                'item_name'         => 'Papan',
                'item_description'  => 'ini deskripsi papan',
            ],
            [
                'item_name'         => 'Besi',
                'item_description'  => 'ini deskripsi besi',
            ],
            [
                'item_name'         => 'Kaca',
                'item_description'  => 'ini deskripsi kaca',
            ],
            [
                'item_name'         => 'Plastik',
                'item_description'  => 'ini deskripsi plastik',
            ],
        ];

        foreach ($seed_items as $value) {
            DB::table('items')->insert([
                'item_code'         => substr(str_shuffle($randcode), 0, 12),
                'item_name'         => $value['item_name'],
                'item_description'  => $value['item_description'],
            ]);
        }
    }
}

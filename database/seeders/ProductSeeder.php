<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products_type')->insert([
            ['name' => 'Snack'],
            ['name' => 'Drink'],
            ['name' => 'Health-Care'],
            ['name' => 'Beauty'],
            ['name' => 'Sport'],
            ['name' => 'Technology'],
            ['name' => 'Electronic'],
            ['name' => 'Wearpon'],
            ['name' => 'Fast-Food'],
            ['name' => 'Sweet'],
        ]);

        DB::table('product')->insert([
            [
                'code' => 'A001',
                'type_id' => '1',
                'name' => 'Lay',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A002',
                'type_id' => '1',
                'name' => 'Sla',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A003',
                'type_id' => '2',
                'name' => 'Coca',
                'unit_price' => 2000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A004',
                'type_id' => '2',
                'name' => 'Sting',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A005',
                'type_id' => '3',
                'name' => 'Number One',
                'unit_price' => 1500,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A006',
                'type_id' => '3',
                'name' => 'Para',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A007',
                'type_id' => '4',
                'name' => 'Sun Screen',
                'unit_price' => 10000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A008',
                'type_id' => '4',
                'name' => 'Bleu De Chanel',
                'unit_price' => 40000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A009',
                'type_id' => '5',
                'name' => 'Nike Shoes',
                'unit_price' => 60000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A010',
                'type_id' => '5',
                'name' => 'Ball',
                'unit_price' => 20000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A011',
                'type_id' => '6',
                'name' => 'Samsung Galaxy',
                'unit_price' => 2000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A012',
                'type_id' => '6',
                'name' => 'Computer',
                'unit_price' => 100000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A013',
                'type_id' => '7',
                'name' => 'Kongfu long',
                'unit_price' => 50000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A014',
                'type_id' => '7',
                'name' => 'Dinamo',
                'unit_price' => 100000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A015',
                'type_id' => '8',
                'name' => 'Ak',
                'unit_price' => 10000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A016',
                'type_id' => '8',
                'name' => 'Thomson',
                'unit_price' => 10000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A017',
                'type_id' => '9',
                'name' => 'KFC',
                'unit_price' => 12000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A018',
                'type_id' => '9',
                'name' => 'McDonald',
                'unit_price' => 16000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A019',
                'type_id' => '10',
                'name' => 'Pop Corn',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A020',
                'type_id' => '10',
                'name' => 'Candy',
                'unit_price' => 1000,
                'image' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

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
                'image' => 'static/Products/Snack/lay.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A002',
                'type_id' => '1',
                'name' => 'Sla',
                'unit_price' => 1000,
                'image' => 'static/Products/Snack/sla.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B001',
                'type_id' => '1',
                'name' => 'នំកញ្ចប់',
                'unit_price' => 1000,
                'image' => 'static/Products/Snack/1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B002',
                'type_id' => '1',
                'name' => 'នំកញ្ចប់',
                'unit_price' => 1000,
                'image' => 'static/Products/Snack/2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B003',
                'type_id' => '1',
                'name' => 'នំកញ្ចប់',
                'unit_price' => 1000,
                'image' => 'static/Products/Snack/3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A003',
                'type_id' => '2',
                'name' => 'Coca',
                'unit_price' => 2000,
                'image' => 'static/Products/Drink/coca.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B004',
                'type_id' => '2',
                'name' => 'Soda',
                'unit_price' => 20000,
                'image' => 'static/Products/Drink/4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B005',
                'type_id' => '2',
                'name' => 'Star Barge',
                'unit_price' => 120000,
                'image' => 'static/Products/Drink/5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B006',
                'type_id' => '2',
                'name' => 'Soda Fresh',
                'unit_price' => 7000,
                'image' => 'static/Products/Drink/6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A004',
                'type_id' => '2',
                'name' => 'Sting',
                'unit_price' => 1000,
                'image' => 'static/Products/Drink/sting.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A005',
                'type_id' => '3',
                'name' => 'Number One',
                'unit_price' => 1500,
                'image' => 'static/Products/Health-Care/one.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B007',
                'type_id' => '3',
                'name' => 'Sun Screen V1',
                'unit_price' => 15000,
                'image' => 'static/Products/Health-Care/7.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B008',
                'type_id' => '3',
                'name' => 'Sun Screen V2',
                'unit_price' => 1500,
                'image' => 'static/Products/Health-Care/8.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B009',
                'type_id' => '3',
                'name' => 'Sun Screen V3',
                'unit_price' => 1500,
                'image' => 'static/Products/Health-Care/9.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A006',
                'type_id' => '3',
                'name' => 'Para',
                'unit_price' => 1000,
                'image' => 'static/Products/Health-Care/para.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A007',
                'type_id' => '4',
                'name' => 'Sun Screen',
                'unit_price' => 10000,
                'image' => 'static/Products/Beauty/sun.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A008',
                'type_id' => '4',
                'name' => 'Bleu De Chanel',
                'unit_price' => 40000,
                'image' => 'static/Products/Beauty/bleu.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B010',
                'type_id' => '4',
                'name' => 'Perfume V1',
                'unit_price' => 60000,
                'image' => 'static/Products/Beauty/10.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B011',
                'type_id' => '4',
                'name' => 'Perfume V2',
                'unit_price' => 45000,
                'image' => 'static/Products/Beauty/11.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B012',
                'type_id' => '4',
                'name' => 'Perfume V3',
                'unit_price' => 40000,
                'image' => 'static/Products/Beauty/12.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A009',
                'type_id' => '5',
                'name' => 'Nike Shoes',
                'unit_price' => 60000,
                'image' => 'static/Products/Sport/nike.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B013',
                'type_id' => '5',
                'name' => 'Shirt V1',
                'unit_price' => 60000,
                'image' => 'static/Products/Sport/13.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B014',
                'type_id' => '5',
                'name' => 'Shirt V2',
                'unit_price' => 60000,
                'image' => 'static/Products/Sport/14.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B015',
                'type_id' => '5',
                'name' => 'Shirt V3',
                'unit_price' => 60000,
                'image' => 'static/Products/Sport/15.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A010',
                'type_id' => '5',
                'name' => 'Ball',
                'unit_price' => 20000,
                'image' => 'static/Products/Sport/ball.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A011',
                'type_id' => '6',
                'name' => 'Samsung Galaxy',
                'unit_price' => 2000,
                'image' => 'static/Products/Technology/sumsung.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B016',
                'type_id' => '6',
                'name' => 'Phone V1',
                'unit_price' => 2000,
                'image' => 'static/Products/Technology/16.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B017',
                'type_id' => '6',
                'name' => 'Phone V2',
                'unit_price' => 2000,
                'image' => 'static/Products/Technology/17.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B018',
                'type_id' => '6',
                'name' => 'Phone V3',
                'unit_price' => 2000,
                'image' => 'static/Products/Technology/18.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A012',
                'type_id' => '6',
                'name' => 'Computer',
                'unit_price' => 100000,
                'image' => 'static/Products/Technology/computer.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A013',
                'type_id' => '7',
                'name' => 'Kongfu long',
                'unit_price' => 50000,
                'image' => 'static/Products/Electronic/kongfulong.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B019',
                'type_id' => '7',
                'name' => 'Electronic V1',
                'unit_price' => 50000,
                'image' => 'static/Products/Electronic/19.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B020',
                'type_id' => '7',
                'name' => 'Electronic V2',
                'unit_price' => 50000,
                'image' => 'static/Products/Electronic/20.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B021',
                'type_id' => '7',
                'name' => 'Electronic V3',
                'unit_price' => 50000,
                'image' => 'static/Products/Electronic/21.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A014',
                'type_id' => '7',
                'name' => 'Dinamo',
                'unit_price' => 100000,
                'image' => 'static/Products/Electronic/denamo.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A015',
                'type_id' => '8',
                'name' => 'Ak',
                'unit_price' => 10000,
                'image' => 'static/Products/Wearpon/ak.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B022',
                'type_id' => '8',
                'name' => 'Wearpon V1',
                'unit_price' => 10000,
                'image' => 'static/Products/Wearpon/22.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B023',
                'type_id' => '8',
                'name' => 'Wearpon V2',
                'unit_price' => 10000,
                'image' => 'static/Products/Wearpon/23.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B024',
                'type_id' => '8',
                'name' => 'Wearpon V3',
                'unit_price' => 10000,
                'image' => 'static/Products/Wearpon/24.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A016',
                'type_id' => '8',
                'name' => 'Thomson',
                'unit_price' => 10000,
                'image' => 'static/Products/Wearpon/thomson.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A017',
                'type_id' => '9',
                'name' => 'KFC',
                'unit_price' => 12000,
                'image' => 'static/Products/Fast-Food/kfc.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B025',
                'type_id' => '9',
                'name' => 'Fast Food V1',
                'unit_price' => 12000,
                'image' => 'static/Products/Fast-Food/25.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B026',
                'type_id' => '9',
                'name' => 'Fast Food V2',
                'unit_price' => 12000,
                'image' => 'static/Products/Fast-Food/26.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B027',
                'type_id' => '9',
                'name' => 'Fast Food V3',
                'unit_price' => 12000,
                'image' => 'static/Products/Fast-Food/27.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A018',
                'type_id' => '9',
                'name' => 'McDonald',
                'unit_price' => 16000,
                'image' => 'static/Products/Fast-Food/mcdonald.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A019',
                'type_id' => '10',
                'name' => 'Donut',
                'unit_price' => 1000,
                'image' => 'static/Products/Sweet/donut.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A020',
                'type_id' => '10',
                'name' => 'icescream',
                'unit_price' => 1000,
                'image' => 'static/Products/Sweet/ice.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B028',
                'type_id' => '10',
                'name' => 'Sweet V1',
                'unit_price' => 1000,
                'image' => 'static/Products/Sweet/28.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B029',
                'type_id' => '10',
                'name' => 'Sweet V2',
                'unit_price' => 1000,
                'image' => 'static/Products/Sweet/29.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'B030',
                'type_id' => '10',
                'name' => 'Sweet V3',
                'unit_price' => 1000,
                'image' => 'static/Products/Sweet/30.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Create User Type: Admin & Staff
        |--------------------------------------------------------------------------
        */
        DB::table('users_type')->insert(
            [
                ['name' => 'Admin'],
                ['name' => 'staff']
            ]
        );
        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */
        $users =  [
            [
                'type_id'       => 1,
                'email'         => 'yimklok.kh@gmail.com',
                'phone'         => '0977779688',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Yim Klok',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],

            [
                'type_id'       => 2,
                'email'         => 'enok123@gmail.com',
                'phone'         => '097861435',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Rith Enok',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'sovan123@gmail.com',
                'phone'         => '097863445',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Roeun Sokvan',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'nana324@gmail.com',
                'phone'         => '097361475',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Nu Anna',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'chatra123@gmail.com',
                'phone'         => '097881455',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Vann Chatra',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'Java@gmail.com',
                'phone'         => '097861409',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Ean Jarak',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'yan013@gmail.com',
                'phone'         => '097869087',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sok Buyan',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'semsun23@gmail.com',
                'phone'         => '097861213',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sem Sovanarith',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'sokha452@gmail.com',
                'phone'         => '090861612',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sut Sokha',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'Vutha890@gmail.com',
                'phone'         => '0978042956',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sum Vutha',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'rachna@gmail.com',
                'phone'         => '097890231',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sum Rachna',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Write To Database
        |--------------------------------------------------------------------------
        |
        | It will insert to table users of database minimart.
        |
        */
        DB::table('user')->insert($users);
    }
}

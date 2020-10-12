<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(array(
            array(
                'name' => 'Hòa',
                'email' => 'contact@hoatech.vn',
                'address' => '156 Dương Đình Hội, Phước Long B, Quận 9',
                'phone_number' => '0988196169',

                'notes' => 'This is Hoa, he is our VIPGroup'

            ),
            array(
                'name' => 'Long',
                'email' => 'long@hoatech.vn',
                'address' => '156 Lê Văn Việt, Phước Long B, Quận 9',
                'phone_number' => '0988123123',

                'notes' => 'This is Long, he is our VIPGroup'
            ),
            array(
                'name' => 'Vũ',
                'email' => 'vu@hoatech.vn',
                'address' => '156 Trương Văn Thành, Phước Long B, Quận 9',
                'phone_number' => '0988145189',

                'notes' => 'This is Vũ, he is our VIPGroup'
            ),
            array(
                'name' => 'Thien',
                'email' => 'thien@hoatech.vn',
                'address' => '156 Trương Văn Thành, Phước Long B, Quận 9',
                'phone_number' => '0900002354',
                'notes' => 'This is Thien, he is our VIPGroup'
            ),
        ));
    }
}

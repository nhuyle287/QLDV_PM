<?php

use Illuminate\Database\Seeder;

class PurposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purposes')->insert(array(
            array(
                'name' => 'Cải tạo',
            ),
            array(
                'name' => 'Xây mới',
                 ),
            array(
                'name' => 'Sửa chữa',
                 ),
        ));
    }
}

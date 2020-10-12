<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(array(
            array(
                'name' => 'Sản phẩm 1',
                'code' => 'NN1',
                'id_customer' => '1',
                'id_unit' => '1',
                'price' => '25000',
                'description' => 'Sử dụng cho việc thay thế',
            ),
            array(
                'name' => 'Sẩn phẩm 2',
                'code' => 'NN2',
                'id_customer' => '2',
                'id_unit' => '2',
                'price' => '45000',
                'description' => 'Sử dụng cho việc thay thế',
            ),
            array(
                'name' => 'Sản phẩm 3',
                'code' => 'NN3',
                'id_customer' => '3',
                'id_unit' => '3',
                'price' => '35000',
                'description' => 'Sử dụng cho việc thay thế',
            ),
        ));
    }
}

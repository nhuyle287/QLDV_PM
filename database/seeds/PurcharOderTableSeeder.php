<?php

use Illuminate\Database\Seeder;

class PurcharOderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchar_orders')->insert(array(
            array(
                'id_customer' => '1',
                'id_user' => '1',
                'price' => '25000',
                'VAT_price' => '2500',
                'total' => '27500',
            ),
            array(
                'id_customer' => '2',
                'id_user' => '2',
                'price' => '35000',
                'VAT_price' => '3500',
                'total' => '38500',
            ),
            array(
                'id_customer' => '3',
                'id_user' => '3',
                'price' => '55000',
                'VAT_price' => '5500',
                'total' => '60500',
            ),
        ));
    }
}

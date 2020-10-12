<?php

use Illuminate\Database\Seeder;

class PurcharOderItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchar_orderitems')->insert(array(
            array(
                'id_product' => '2',
                'count' => '1',
                'price' => '15000',
                'VAT_price' => 'Có',
                'total' => '200000',
                'id_purpose' => '1',
                'id_purchar_order' => '1',
                'time_deliver' => '2019-04-25 08:37:17',
            ),
            array(
                'id_product' => '2',
                'count' => '2',
                'price' => '25000',
                'VAT_price' => 'Có',
                'total' => '2300000',
                'id_purpose' => '2',
                'id_purchar_order' => '2',
                'time_deliver' => '2020-04-25 08:37:17',
            ),
            array(
                'id_product' => '3',
                'count' => '3',
                'price' => '35000',
                'VAT_price' => 'Có',
                'total' => '300000',
                'id_purpose' => '3',
                'id_purchar_order' => '3',
                'time_deliver' => '2021-04-25 08:37:17',
            ),
        ));
    }
}

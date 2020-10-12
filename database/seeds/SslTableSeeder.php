<?php

use Illuminate\Database\Seeder;

class SslTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ssls')->insert(array(
            array(
                'name' => 'COMODO POSITIVE SSL',
                'price' => 18750,
                'insurance_policy' => '$10.000',
                'domain_number' => 1,
                'reliability' => 'Cơ bản',
                'green_bar' => 'Không',
                'sans' => 'Không có',
                'notes' => ' This is COMODO POSITIVE SSL',
            ),
            array(
                'name' => 'COMODO POSITIVE SSL EV',
                'price' => 308333,
                'insurance_policy' => '$10.000.000',
                'domain_number' => 1,
                'reliability' => 'Cao',
                'green_bar' => 'Có',
                'sans' => 'Không có',
                'notes' => ' This is COMODO POSITIVE SSL EV',
            ),
    ));
    }
}

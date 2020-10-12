<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('emails')->insert(array(
            array(
                'name' => 'Mail Economy #1',
                'price' => 50000,
                'capacity' => '5 GB',
                'email_number' => 5,
                'email_forwarder' => 5,
                'email_list' => 1,
                'parked_domains' => 0,
                'notes' => 'This is Mail Economy #1',

            ),
            array(
                'name' => 'Mail Economy #2',
                'price' => 110000,
                'capacity' => '10 GB',
                'email_number' => 20,
                'email_forwarder' => 20,
                'email_list' => 2,
                'parked_domains' => 0,
                'notes' => 'This is Mail Economy #3',

            ),
        ));
    }
}

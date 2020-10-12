<?php

use Illuminate\Database\Seeder;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('websites')->insert(array(
            array(
                'name' => 'Tên Website 1',
                'type_website' => 'GÓI WEBSITE CƠ BẢN',
                'price' => 400,
                'notes' => 'This is GÓI WEBSITE CƠ BẢN',
            ),
            array(
                'name' => 'Tên Website 2',
                'type_website' => 'GÓI WEBSITE NÂNG CAO',
                'price' => 800,
                'notes' => 'This is GÓI WEBSITE NÂNG CAO',
            ),
        ));
    }
}

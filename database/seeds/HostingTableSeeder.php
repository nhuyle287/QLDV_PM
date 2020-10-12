<?php

use Illuminate\Database\Seeder;

class HostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hostings')->insert(array(
            array(
                'name' => 'Sinh Viên',
                'price'=> 50000,
                'capacity'=> '300 MB [SSD]',
                'bandwith'=> 'unlimited',
                'sub_domain'=> '10',
                'email'=> '10',
                'ftp'=> 'unlimited',
                'database'=> 1,
                'adddon_domain'=> 0,
                'park_domain'=> 3,
                'notes'=> 'My Hosting',
            ),
            array(
                'name' => 'Cá Nhân',
                'price'=> 60000,
                'capacity'=> '1G [SSD]',
                'bandwith'=> 'unlimited',
                'sub_domain'=> 'unlimited',
                'email'=> 'unlimited',
                'ftp'=> 'unlimited',
                'database'=> 1,
                'adddon_domain'=> 0,
                'park_domain'=> 'unlimited',
                'notes'=> 'My Hosting',
            ),
        ));
    }
}

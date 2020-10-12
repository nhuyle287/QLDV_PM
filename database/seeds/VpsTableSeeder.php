<?php

use Illuminate\Database\Seeder;

class VpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vpss')->insert(array(
            array(
                'name' => 'VPS#1',
                'price' => 200000,
                'cpu' => '1 core',
                'capacity' => '20GB [SSD Cloud Storage]',
                'ram' => '1024 MB',
                'bandwith' => 'Unlimited',
                'technical' => 'KVM / LXC',
                'operating_system' => 'Linux',
                'backup' => 'Hàng tuần',
                'panel' => 'Free Direct Admin',
                'notes' => 'This is my VPS#1',
            ),
            array(
                'name' => 'VPS#2',
                'price' => 270000,
                'cpu' => '1 core',
                'capacity' => '30GB [SSD Cloud Storage]',
                'ram' => '2048 MB',
                'bandwith' => 'Unlimited',
                'technical' => 'KVM / LXC',
                'operating_system' => 'Linux / Windows',
                'backup' => 'Hàng tuần',
                'panel' => 'Free Direct Admin',
                'notes' => 'This is my VPS#1',
            ),

        ));
    }
}

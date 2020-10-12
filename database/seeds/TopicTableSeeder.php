<?php

use Illuminate\Database\Seeder;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert(array(
            array(
                'name' => 'Quản lý phẩn mềm hosting ',
                'description' => 'Quản lý các hosting và tên miền',
                'category_id' => 1,
                'support' => 'Có'
            ),
            array(
                'name' => 'Quản lý phần mềm CeoCoffee',
                'description' => 'Quản lý ...',
                'category_id' => 2,
                'support' => 'Có'
            ),

        ));
    }
}

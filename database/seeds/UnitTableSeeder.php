<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(array(
            array(
                'name' => 'Unit 1',
                'description' => 'Sử dụng cho việc thay thế',
            ),
            array(
                'name' => 'Unit 2',
                'description' => 'Sử dụng cho việc thay thế',
            ),
            array(
                'name' => 'Unit 3',
                'description' => 'Sử dụng cho việc thay thế',
            ),
        ));
    }
}

<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert(array(
        array(
            'name' => 'Nhân Sự',
            'code' => 'NS',
            'description' => 'Bộ phận nhân sự',
        ),
            array(
                'name' => 'Kỹ Thuật',
                'code' => 'KT',
                'description' => 'Bộ phận kỹ thuật',
            ),
            array(
                'name' => 'Kế toán',
                'code' => 'KT',
                'description' => 'Bộ phận kế toán',
            ),
        ));
    }
}

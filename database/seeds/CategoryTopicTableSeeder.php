<?php

use Illuminate\Database\Seeder;

class CategoryTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_topic')->insert(array(
            array(
                'name_category' => 'Thiết kế Website WordPress',
            ),
            array(
                'name_category' => 'SEO Google',
            ),
            array(
                'name_category' => 'Marketing Online',
            ),
            array(
                'name_category' => 'Lập trình phần mềm',
            ),
            array(
                'name_category' => 'Thiết kế Website Laravel',
            ),
            array(
                'name_category' => 'Khác',
            ),
        ));
    }
}

<?php

use Illuminate\Database\Seeder;

class TypeDomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typedomains')->insert(array(
            array(
                'id_domain' => 1,
                'type_domain' => 'Tên Miền Việt Nam',
            ),
            array(
                'id_domain' => 2,
                'type_domain' => 'Tên Miền Quốc Tế',
            ),
        ));
    }
}

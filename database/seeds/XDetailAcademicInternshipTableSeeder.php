<?php

use Illuminate\Database\Seeder;

class XDetailAcademicInternshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_internships')->insert(array(
            array(
                'internship_id' => 1,
                'academic_id' => 1,
            ),
            array(
                'internship_id' => 2,
                'academic_id' => 2,
            ),
            array(
                'internship_id' => 3,
                'academic_id' => 3,
            ),
            array(
                'internship_id' => 4,
                'academic_id' => 4,
            ),
        ));
    }
}

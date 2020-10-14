<?php

use Illuminate\Database\Seeder;

class AcademicLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_levels')->insert(array(
            array(

                'school' => 'Đại Học Công Nghệ Thông Tin DHQG TP.HCM',
                'major' => 'Hệ Thống Thông Tin',
                'degree' => 'Kỹ sư',
                'loai' => 'Khá'
            ),
            array(

                'school' => 'Đại Học Công Nghệ Thông Tin DHQG TP.HCM',
                'major' => 'Công Nghệ Thông Tin',
                'degree' => 'Cử nhân',
                'loai' => 'Khá'
            ),
            array(
                'school' => 'Đại Học Công Nghệ Thông Tin DHQG TP.HCM',
                'major' => 'Hệ Thống Thông Tin',
                'degree' => 'Kỹ sư',
                'loai' => 'Khá'
            ),
            array(
                'school' => 'Đại Học Công Nghệ Thông Tin DHQG TP.HCM',
                'major' => 'Hệ Thống Thông Tin',
                'degree' => 'Kỹ sư',
                'loai' => 'Giỏi'
            ),

        ));
    }
}

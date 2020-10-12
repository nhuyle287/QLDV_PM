<?php

use Illuminate\Database\Seeder;

class InternshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('internships')->insert(array(
            array(
                'name' => 'Đặng Hoàng Trinh',
                'email' => 'trinhhoang12@gmail.com',
                'address' => 'DakLak',
                'phone' => '0957846739',
                'image'=>null,
                'phone_family'=>'0907343557',
                'name_family'=>'Y Le',
                'birthday'=>'1999-11-08',
                'start_date'=>'2020-08-01',
                'end_date'=>null,
                'cmnd'=>'957849837',
                'addresscurrent'=>'Bình Dương',
                'issued_by'=>'DakLak',
                'position'=>'Thực tập sinh Laravel',
                'status'=>0,
                'range_date'=>'2016-05-16',
                'gender'=>'Nữ',
                'date_create' => '2020-08-07'

            ),
            array(
                'name' => 'Võ Thanh Vân',
                'email' => 'van12@gmail.com',
                'address' => 'Long An',
                'phone' => '0957846739',
                'image'=>null,
                'phone_family'=>'0907343557',
                'name_family'=>'Y Le',
                'birthday'=>'1999-04-29',
                'start_date'=>'2020-08-01',
                'end_date'=>null,
                'cmnd'=>'789578364',
                'addresscurrent'=>'Bình Dương',
                'issued_by'=>'Long An',
                'position'=>'Thực tập sinh Laravel',
                'status'=>1,
                'range_date'=>'2016-05-16',
                'gender'=>'Nữ',
                'date_create' => '2020-08-07'
            ),

        ));
    }
}

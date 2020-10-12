<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConstantsModel extends Model
{
    const SERVICES = [
        0 => 'Choose Service',
        1 => 'Domain',
        2 => 'Hosting',
        3 => 'Vps',
        4 => 'Email',
        5 => 'SSL',
        6 => 'Website',
    ];
    const INVOICE = [
        0 => 'Chưa Thanh Toán',
        1 => 'Đã Thanh Toán',

    ];

    const  STATUS_INTERNSHIP = [
        'Chờ xử lý' => 0,
        'Đang xử lý' => 1,
        'Hủy' => 2,
        'Hoàn thành' => 3
    ];


}

<?php


namespace App\Helpers;


class Helper
{
    public static function vnToString($str, $flag = null)
    {
        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        if (!$flag) {
            $str = str_replace(' ', '_', $str);
            $str = str_replace('.', '', $str);

        }
        return strtoupper($str);
    }

    public static function generateCodeById($number)
    {
        $result = '';
        if ($number) {
            $result = sprintf('%04d', $number);
        }
        return $result;
    }

    public static function generateCodeByName($str)
    {
        $result = '';
        if ($str) {
            //explode : tách 1 chuỗi sang mảng
            $arr = explode(' ', $str);
            foreach ($arr as $item) {
                if (is_numeric($item)) {
                    $result .= $item;
                } else {
//                    PREG_SPLIT_NO_EMPTY − nếu được thiết lập, chỉ có các phần không trống sẽ được trả về bởi preg_split().
//
//                    PREG_SPLIT_DELIM_CAPTURE − nếu được thiết lập, biểu thức được tham số hóa trong pattern sẽ được bắt và trả về.
//
//                    PREG_SPLIT_OFFSET_CAPTURE − nếu được thiết lập, với mỗi so khớp xuất hiện thì string offset cũng sẽ được trả về.
                    $chars = preg_split('//', $item, -1, PREG_SPLIT_NO_EMPTY);
                    $result .= strtoupper($chars[0]);
                }

            }
        }
        return $result;
    }

    public static function generateCodeBySpecialName($str, $flag = null)
    {
        $result = '';

        $vntostring = self::vnToString($str, $flag);
        //trường hợp khoảng cách cắt chuỗi
        if (!$flag) {
            if ($arr = explode("_", $vntostring)) {
                foreach ($arr as $item) {
                    $chars = preg_split('//', $item, -1, PREG_SPLIT_NO_EMPTY);

                    $result .= strtoupper($chars[0]);
                }
                $result = str_replace('#', '', $result);
            }
        }
        return $result;
    }
}

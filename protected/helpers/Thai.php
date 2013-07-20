<?php

/**
 * Description of Thai Helper
 *
 */
class Thai {

    public static $thaiday = array("",
        "จ.", "อัง.", "พ.",
        "พฤ.", "ศ.", "ส.",
        "อา.");
    public static $thaiday_full = array("",
        "จันทร์", "อังคาร", "พุธ",
        "พฤหัสบดี", "ศุกร์", "เสาร์",
        "อาทิตย์");
    public static $thaimonth = array("",
        "ม.ค.", "ก.พ.", "มี.ค.",
        "เม.ย.", "พ.ค.", "มิ.ย.",
        "ก.ค.", "ส.ค.", "ก.ย.",
        "ต.ค.", "พ.ย.", "ธ.ค.");
    public static $engmonth = array("",
        "Jan.", "Feb.", "Mar.",
        "Apr.", "May", "Jun.",
        "Jul.", "Aug.", "Sep.",
        "Oct.", "Nov.", "Dec.");
    public static $thaimonth_full = array(
        "1" => "มกราคม", "2" => "กุมภาพันธ์", "3" => "มีนาคม",
        "4" => "เมษายน", "5" => "พฤษภาคม", "6" => "มิถุนายน",
        "7" => "กรกฎาคม", "8" => "สิงหาคม", "9" => "กันยายน",
        "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");
    public static $engmonth_full = array(
        "1" => "January", "2" => "February", "3" => "March",
        "4" => "April", "5" => "May", "6" => "June",
        "7" => "July", "8" => "August", "9" => "September",
        "10" => "October", "11" => "November", "12" => "December");
    public static $thaimonth_full_all = array("",
        "มกราคม", "กุมภาพันธ์", "มีนาคม",
        "เมษายน", "พฤษภาคม", "มิถุนายน",
        "กรกฎาคม", "สิงหาคม", "กันยายน",
        "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    public static $engmonth_full_all = array("",
        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December");
    public static $thainumber = array("๐", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙");
    public static $arabicnumber = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
//    public static $arabicnumber = array(
//        "๐" => "0", "๑" => "1", "๒" => "2", "๓" => "3", "๔" => "4",
//        "๕" => "5", "๖" => "6", "๗" => "7", "๘" => "8", "๙" => "9");
    public static $thaiMoney = array("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน");
    public static $thaiReadNumber = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    public static $thaiReadNumberSib = array("", "", "ยี่", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    public static $thaiReadNumberBaht = array("", "เอ็ด", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");

    public static function thaidate($formats, $timestamp = NULL, // Delete int for flexible use by Paang on August 30, 2011
            $enable_thainumber = false, $buddhist_era = true) {
        // $formats is same as format of PHP date();
        $output = "";
        if ($timestamp == NULL)
            $timestamp = time();
        $format_char = str_split($formats);
        foreach ($format_char as $format) {
            switch ($format) {
                case "D":
                    $text = self::$thaiday[(int) date("N", $timestamp)];
                    break;
                case "l":
                    $text = self::$thaiday_full[(int) date("N", $timestamp)];
                    break;
                case "S":
                    $text = date("N", $timestamp);
                    break;
                case "F":
                    $text = self::$thaimonth_full_all[(int) date("n", $timestamp)];
                    break;
                case "M":
                    $text = self::$thaimonth[(int) date("n", $timestamp)];
                    break;
                case "o":
                case "Y":
                    if ($buddhist_era) {
                        $text = date("o", $timestamp) + 543;
                    } else {
                        $text = date("o", $timestamp);
                    }
                    break;
                case "y":
                    if ($buddhist_era) {
                        $text = date("y", $timestamp) + 43;
                        $text = substr($text, -2);
                    } else {
                        $text = date("y", $timestamp);
                    }
                    break;
                default:
                    $text = date("$format", $timestamp);
            }
            if ($enable_thainumber) {
                $output .= self::to_thainumber($text);
            } else {
                $output .= $text;
            }
        }
        return $output;
    }

    public static function to_thainumber($text) {
        $output = "";
        $text_char = str_split($text);
        foreach ($text_char as $i) {
            if (is_numeric($i)) {
                $output.= self::$thainumber[$i];
            } else {
                $output.= $i;
            }
        }
        return $output;
    }

    function thainumDigit($num) {
        return str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), array("o", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙"), $num);
    }

    /*
     * แปลง ตัวเลขไทย เป็น เลขอารบิก
     * 
     * @param text $text ข้อความที่มีเลขไทย เช่น ann๑๒๓
     * @return text ข้อความที่เปลี่ยนเลขไทยเป็นเลขอารบิก ผลที่ได้ ann123
     * 
     */

    public static function to_arabicnumber($text) {
        return str_replace(self::$thainumber, self::$arabicnumber, $text);
    }

    /**
     * แปลงตัวเลขพร้อมทศนิยม 2 ตำแหน่ง เป็นคำอ่านเงินในภาษาไทย
     *
     * @param decimal $amount
     * @return string คำอ่านจำนวนเงิน เช่น สองแสนห้าสิบบาทแปดสิบเจ็ดสตางค์
     */
    public static function thaiBaht($amount) {
        $amount = str_replace(',', '', $amount);
        if ($amount == '') {
            return '-';
        }

        $baht = (string) $amount;

        $baht = explode(".", $baht);     // $baht[0]=บาท, $baht[1]=สตางค์
        if (!isset($baht[1])) {
            if ((!is_numeric((int) $baht[0]))) {
                return '-';
            }
        } else {
            if ((!is_numeric((int) $baht[0])) || (!is_numeric((int) $baht[1]))) {
                return '-';
            }
        }


        $len = strlen($baht[0]);
        if ($len != 0) {
            $ctrl = 0;
            while ($len >= 1) {
                if ($len >= 6) {
                    $arr[$ctrl++] = substr($baht[0], -($ctrl * 6), 6);
                } else {
                    $arr[$ctrl++] = substr($baht[0], 0, $len);
                }
                $len-=6;
            }
            $str = "";
            for ($i = count($arr) - 1; $i >= 0; $i--) {
                $sub = array();
                $ctrl = strlen($arr[$i]) - 1;
                if ($ctrl == 0)
                    $ctrl = 9; // fix for 1,000,000 or 1,000,000,000,000 (every 6 position)
                for ($y = 0; $y < strlen($arr[$i]); $y++) {
                    $sub[$y] = substr($arr[$i], $y, 1);
                    if ($sub[$y] != "0") {
                        if ($ctrl == 1) {
                            $str .= self::$thaiReadNumberSib[$sub[$y]] . self::$thaiMoney[$ctrl];
                        } elseif ($ctrl == 0) {
                            $str .= self::$thaiReadNumberBaht[$sub[$y]] . self::$thaiMoney[$ctrl];
                        } else {
                            $str .= self::$thaiReadNumber[$sub[$y]] . self::$thaiMoney[$ctrl];
                        }
                    } else {
                        if ($ctrl == 1)
                            $ctrl = 9; // fix for 101,000,000 or 101
                    }
                    $ctrl--;
                }
                if ($i > 0) {
                    $str .= "ล้าน";
                }
            }
            $str .= "บาท";
        } else {
            $str = "";
        }
        // Satang
        if (isset($baht[1])) {
            if ($baht[1] != 0) {
                $len = strlen($baht[1]);
                if ($len < 2) {
                    $baht[1] = $baht[1] . '0';
                }
                $sub = array();
                $ctrl = strlen($baht[1]) - 1;
                for ($y = 0; $y < strlen($baht[1]); $y++) {
                    $sub[$y] = substr($baht[1], $y, 1);
                    if ($sub[$y] != "0") {
                        if ($y == 0) {
                            $str .= self::$thaiReadNumberSib[$sub[$y]] . self::$thaiMoney[$ctrl];
                        } else {
                            $str .= self::$thaiReadNumberBaht[$sub[$y]] . self::$thaiMoney[$ctrl];
                        }
                    }
                    $ctrl--;
                }
                $str .= "สตางค์";
            } else {
                $str .= "ถ้วน";
            }
        } else {
            $str .= "ถ้วน";
        }

        return $str;
    }

    /**
     * แปลงเดือนไทยจากเต็ม เป็นรูปแบบย่อ เช่น มกราคม เป็น ม.ค.
     *
     * @param string $fullMonth
     * @return string เดือนไทยแบบ ย่อ
     */
    public static function abbrThaiMonth($fullMonth) {
        return self::$thaimonth[array_search($fullMonth, self::$thaimonth_full_all)];
    }

    /**
     * แปลงปี พ.ศ. จากเต็ม เป็นรูปแบบย่อ เช่น 2554 เป็น 54
     * สามารถใช้กับปี ค.ศ.ก็ได้ เนื่องจากจะตัดเอา 2 ตัวหลัง return ออกมาให้
     *
     * @param string $fullY
     * @return string ปี พ.ศ. แบบย่อ
     */
    public static function abbrYear($fullY) {
        return substr($fullY, -2);
    }

}

?>

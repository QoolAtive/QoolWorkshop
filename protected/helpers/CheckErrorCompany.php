<?php

Class CheckErrorCompany {

    public static function haveBusiness($idBusiness) {
        $countBusiness = CompanyTypeBusiness::model()->count('id=:id', array(':id' => $idBusiness));
        if ($countBusiness > 0)
            $message = null;
        else
            $message = 'ประเภทธุรกิจ ' . $idBusiness . ' ' . 'ไม่มีอยู่ในระบบ';

        return $message;
    }

    public static function haveErrorDup($attribute, $value, $messageError) {
        $count = Company::model()->findAll("{$attribute}=:{$attribute}", array(":{$attribute}" => $value));
        if (Count($count) < 1) {
            $message = null;
        } else {
            $message = $messageError . ' มีอยู่ในระบบแล้ว กรุณาตรวจสอบ';
        }

        return $message;
    }

    public static function haveErrorDupProduct($attribute = array(), $value = array(), $messageError) {
        $count = CompanyProduct::model()->findAll(
                "{$attribute[0]}=:{$attribute[0]} and {$attribute[1]}=:{$attribute[1]}", array(":{$attribute[0]}" => $value[0], ":{$attribute[1]}" => $value[1])
        );
        if (Count($count) < 1) {
            $message = null;
        } else {
            $message = $messageError . ' มีอยู่ในระบบแล้ว กรุณาตรวจสอบ';
        }

        return $message;
    }

    public static function verify_email($value, $messageError) {
        list($email_user, $email_host) = explode("@", $value);
        $host_ip = gethostbyname($email_host);
        if (eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $value) && !ereg($host_ip, $email_host)) {
            return null;
        } else {
            return 'รูปแบบอีเมล์หรืออีเมล์ผิดพลาด กรุณาตรวจสอบ';
        }
    }

    public static function varify_web($value, $message) {
        
    }

    public static function haveErrorNull($value, $messageError) {
//        echo "Value : " . $value . "<br />";
        if ($value != null) {
            $message = null;
        } else {
            $message = $messageError . ' ไม่ควรเป็นค่าว่าง';
        }

        return $message;
    }

    public static function errorTableBegin() {
        return '<table style="width:100%; border:#000 1px solid;">
                    <thead>
                        <tr>
                            <th style="border:#000 1px solid;padding:5px;font-weight:bold;text-align:center; width: 10%;"> บรรทัดที่ </th>
                            <th style="border:#000 1px solid;padding:5px;font-weight:bold;text-align:center; width: 90%;"> รายละเอียดข้อผิดพลาด </th>
                        </tr>
               </thead>';
    }

    public static function errorTableDetail($line, $error, $insert = true) {
        if ($insert) {
            $txt = 'เพิ่ม';
        } else {
            $txt = 'แก้ไข';
        }
        if ($error != '') {
            return '<tr>
                    <td style="border:#000 1px solid;padding:5px;text-align:center; width: 10%;">' . ($line + 1) . '</td>
                    <td style="border:#000 1px solid;padding:5px; width: 90%;">' . $error . '</td>
                </tr>';
        } else {
            return '<tr>
                    <td style="border:#000 1px solid;padding:5px;text-align:center; width: 10%;">' . ($line + 1) . '</td>
                    <td style="border:#000 1px solid;padding:5px; width: 90%;"> ' . $txt . 'ข้อมูลสำเร็จ </td>
                </tr>';
        }
    }

    public static function errorTableEnd() {
        return '</table>';
    }

}

?>

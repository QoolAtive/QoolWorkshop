<?php

Class CheckErrorCompany {

    public static function haveBusiness($idBusiness) {
        $countBusiness = SpTypeBusiness::model()->count('id=:id', array(':id' => $idBusiness));
        if ($countBusiness > 0)
            $message = null;
        else
            $message = 'ประเภทธุรกิจ ' . $idBusiness . ' ' . 'ไม่มีอยู่ในระบบ';

        return $message;
    }

    public static function haveErrorDup($attribute, $value, $messageError) {
        if ($value != null) {
            $count = Company::model()->findAll("{$attribute}=:{$attribute}", array(":{$attribute}" => $value));
            if ($count > 0) {
                $message = null;
            } else {
                $message = $messageError;
            }
        } else {
            $messageError = Company::model()->getAttributeLabel($attribute) . ' ' . 'ไม่ควรเป็นค่าว่าง';
            $message = CheckErrorCompany::haveErrorNull($value, $messageError);
        }

        return $message;
    }

    public static function haveErrorNull($value, $messageError) {
        if ($value != null) {
            $message = null;
        } else {
            $message = $messageError;
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
                    <td style="border:#000 1px solid;padding:5px;text-align:center; width: 10%;">' . $line . '</td>
                    <td style="border:#000 1px solid;padding:5px; width: 90%;">' . $error . '</td>
                </tr>';
        } else {
            return '<tr>
                    <td style="border:#000 1px solid;padding:5px;text-align:center; width: 10%;">' . $line . '</td>
                    <td style="border:#000 1px solid;padding:5px; width: 90%;"> ' . $txt . 'ข้อมูลสำเร็จ </td>
                </tr>';
        }
    }

    public static function errorTableEnd() {
        return '</table>';
    }

}

?>

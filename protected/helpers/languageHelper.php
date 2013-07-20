<?php
/*
 * languageHelper Create By Ann
 * Add Date : 20-07-56
 * Update Date : 20-07-56
 */

class languageHelper {

    /*
     * แปลงค่าให้ดึงข้อมูลจาก Database ให้ถูกตามภาษาที่เลือก
     * 
     * @param   text $value_th ข้อความภาษาไทย
     *          text $value_en ข้อความภาษาอังกฤษ
     * @return  text ข้อความที่เปลี่ยนตามภาษาที่เลือก
     * 
     * Add Date : 20-07-56
     * Update Date : 20-07-56
     */

    static public function changeDB($value_th, $value_en) {
        $currentLang = Yii::app()->language;
        $value = $value_th;
        if ($currentLang == 'en') {
            if ($value_en != '') {
                $value = $value_en;
            }
        }
        return $value;
    }

}

?>

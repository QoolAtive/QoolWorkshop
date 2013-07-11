<?php

Class Tool {

    public static function GenList($list) {
        foreach ($list as $ls) {
            echo "<li class='" . $ls['select'] . "'>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . ++$n,)) . "</li>";
        }
    }

    public static function getDropdownListYear() {
        $year = 2548;
        $year_now = date("Y") + 543;
        $arr_year = array();
        for ($year; $year <= $year_now; $year++) {
            $arr_year[$year] = $year;
        }

        return $arr_year;
    }

    public static function limitString($text, $length = 100) {
        $length = abs((int) $length);
        if (strlen($text) > $length) {
            $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
        }
        return $text;
    }

    public static function ChangeDateTimeToShow($datetime) {
        $res = '';
        if ($datetime != '') {
            list($date, $time) = explode(" ", $datetime);
            list($y, $m, $d) = explode("-", $date);
            $res = $d . ' ' . Thai::$thaimonth_full[str_replace('0', '', $m)] . ' ' . ($y + 543) . " " . $time;
        }
        return $res;
    }

    public static function checkPID($pid) {
        if (strlen($pid) != 13)
            return false;
        for ($i = 0, $sum = 0; $i < 12; $i++)
            $sum += (int) ($pid{$i}) * (13 - $i);
        if ((11 - ($sum % 11)) % 10 == (int) ($pid{12}))
            return true;
        return false;
    }

    public static function GenPass($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < $length; $i++)
            $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        return $password;
    }

    //ส่ง email
    public static function mailsend($data) {
        $mail = Yii::app()->Smtpmail;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPSecure = "STARTTLS";
        $mail->CharSet = 'UTF-8';

        $mail->SetFrom('dbdmart2013@gmail.com', 'ผู้ดูแลระบบ DBDmart.');
        $mail->Subject = $data['subject'];
        $mail->MsgHTML($data['message']);
        $mail->AddAddress($data['to']);
        $mail->send();
//        if (!$mail->Send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
//        } else {
//            echo "Message sent!";
//        }
    }

    //ส่ง email Contact
    public static function mailsendContact($data) {
        $mail = Yii::app()->Smtpmail;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPSecure = "STARTTLS";
        $mail->CharSet = 'UTF-8';

        $mail->SetFrom($data['from'], $data['name']);
        $mail->Subject = $data['subject'];
        $mail->MsgHTML($data['message']);
        $mail->AddAddress($data['to']);
        $mail->send();
//        if (!$mail->Send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
//        } else {
//            echo "Message sent!";
//        }
    }

    // ข้อความสำหรับการส่งเมล์
    public static function messageEmail($data, $select) {
        $message = array(
            'confirm_email' => "
            <strong>" . Yii::t('language', 'สวัสดี คุณ ') . $data['name'] . "</strong>
            <hr/>
             " . Yii::t('language', 'รหัสยืนยันของคุณคือ ') . $data['password'] . "
            <br >" . CHtml::link(Yii::t('language', 'ยืนยันการสมัครสมาชิก'), array('/member/manage/registerConfirm')) . "
            ",
            'forgotPassword' => "
                <strong>" . Yii::t('language', 'สวัสดี คุณ') . ' ' . $data['name'] . "</strong><br>
                    <hr>
                    " . Yii::t('language', 'รหัสผู้ใช้ : ') . $data['username'] . " <br>
                    " . Yii::t('language', 'รหัสผ่าน : ') . $data['password'] . " <br>
                ");
        return $message[$select];
    }

    /**
     * เข้ารหัส
     *
     * @วิธีใช้งาน  Yim::Encrypted($string);
     * 
     * @param string $key, $string
     * @return string ที่เข้ารหัส
     */
    public static function Encrypted($string) {
        $key = 'yimqoolative';
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
        return $output;
    }

    /**
     * ถอดรหัส
     * 
     * @วิธีใช้งาน Yim::Decrypted($encrypted);
     * 
     * @param string $key, $encrypted ที่เข้ารหัสไว้
     * @return string ที่ถอดรหัส
     */
    public static function Decrypted($encrypted) {
        $key = 'yimqoolative';
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $output;
    }

    public static function getProfile($id = null) {
        $user = MemUser::model()->find('id = ' . $id);
        if ($user->type == '1') {
            $person = MemPerson::model()->find('user_id = ' . $user->id);
            $name = $person->ftname . ' ' . $person->ltname;
            $type = 'บุคคลทั่วไป';
        } else if ($user->type == '2') {
            $registration = MemRegistration::model()->find('user_id = ' . $user->id);
            $name = $registration->ftname . ' ' . $registration->ltname;
            $type = 'นิติบุคคล';
        } else {
            $name = 'Admin.';
            $type = 'ผู้ดูแลระบบ';
        }

        return array(
            'name' => $name,
            'type' => $tyle,
        );
    }

}

?>

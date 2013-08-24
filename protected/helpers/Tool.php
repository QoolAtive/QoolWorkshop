<?php

Class Tool {

    public static function GenList($list) {
        $n = 1;
        foreach ($list as $ls) {
            echo "<li class='" . $ls['select'] . "'>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++,)) . "</li>";
        }
    }

    public static function getDropdownListYear($year = null) {
        if ($year == null)
            $year = LanguageHelper::changeDB(2548, 2005);

        $year_now = LanguageHelper::changeDB(date("Y") + 543, date("Y")); //date("Y") + 543;

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
            $y = LanguageHelper::changeDB($y + 543, $y);
            $m = date('n', strtotime('2013-' . $m . '-01'));
            $m_full = LanguageHelper::changeDB(Thai::$thaimonth_full[$m], Thai::$engmonth_full[$m]);
            $res = $d . ' ' . $m_full . ' ' . ($y) . " " . $time;
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
//        $mail->Mailer = "smtp";
//        $mail->SMTPSecure = "STARTTLS";
        $mail->CharSet = 'UTF-8';

        $mail->SetFrom('dbdmart2013@gmail.com', 'ผู้ดูแลระบบ DBDmart.');
        $mail->Subject = $data['subject'];
        $mail->MsgHTML($data['message']);
        $mail->AddAddress($data['to']);
//        $mail->send();
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
//            echo "Message sent!";
        }
    }

    //ส่ง news email
    public static function sendNewsMail($data) {
        $mail = Yii::app()->Smtpmail;
        $mail->IsSMTP();
//        $mail->Mailer = "smtp";
//        $mail->SMTPSecure = "STARTTLS";
        $mail->CharSet = 'UTF-8';



        $mail->SetFrom('dbdmart2013@gmail.com', $data['name']);
        $mail->Subject = $data['subject'];

        $mail->AddAddress($data['to']);


        // Add By Ann 23-08-56 For AddAttachment in E-mail
        $mail->ClearAttachments();
        $model_news_file = NewsFile::model()->findAll("news_id=" . $data['news_id']);
        if (isset($model_news_file)) {
            foreach ($model_news_file as $k => $m) {
                $file_path = substr($m->file_path, 1);
                $mail->AddAttachment($file_path, $m->file_name);
            }
        }
        // End Add By Ann 23-08-56 For AddAttachment in E-mail

        $mail->MsgHTML($data['message']);

        return $mail->Send();
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
//        $mail->Mailer = "smtp";
//        $mail->SMTPSecure = "STARTTLS";
        $mail->CharSet = 'UTF-8';

        $mail->SetFrom($data['from'], $data['name']);
        $mail->Subject = $data['subject'];
        $mail->MsgHTML($data['message']);
        $mail->AddAddress($data['to']);
        return $mail->Send();
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
            <br >" . CHtml::link(Yii::t('language', 'เข้าสู่ระบบเพื่อทำการยื่นยันการสมัครสมาชิก'), $_SERVER['SERVER_NAME']) . "
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

    public static function getProfile() {
        $user = MemUser::model()->find('id = ' . Yii::app()->user->id);
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
            'type' => $type,
        );
    }

    public static function stripText($data, $len) {

        $data = strip_tags(trim($data));
        if (strlen($data) > $len) {
            $return = txtTruncate($data, $len);
            $return .= " ...";
        } else {
            $return = $data;
        }
        return $return;

        function txtTruncate($string, $limit, $break = " ") {
            if (strlen($string) <= $limit)
                return $string;
            if (false !== ($breakpoint = strpos($string, $break, $limit))) {
                if ($breakpoint < strlen($string) - 1) {
                    $string = substr($string, 0, $breakpoint);
                }
            }
            return $string;
        }

    }

    public static function AutoMotionWarning() {
        $model_motion = CompanyMotionSetting::model()->find('`use`= :use', array(':use' => 1));
        $dataCondition = '-' . $model_motion->amount . ' ' . $model_motion->type;
        $motion = CompanyMotion::model()->findAll("update_at < date_add(now(),interval {$dataCondition})");

        foreach ($motion as $data) {
            
            $model = CompanyThem::model()->find('main_id = :main_id', array(':main_id' => $data->company_id));
            $model_company = Company::model()->findByPk($data->company_id);
            $model_profile_user = MemRegistration::model()->find('user_id=:user_id', array(':user_id' => $model_company->user_id));
            if (count($model_profile_user)) {
                $name = $model_profile_user->ftname . ' ' . $model_profile_user->ltname;

                $model->status_block = 1;
                $model->date_warning = date('Y-m-d');
                $model->save();

                $message = '
                <strong>' . Yii::t('language', 'เรียน') . ' ' . Yii::t('language', 'คุณ') . $name . '</strong>
                <p>
                ร้านค้าของคุณไม่ได้รับการอัพเดทข้อมูลเป็นระยะเวลานาน<br />
                คุณจำเป็นต้องทำการอัพเดทข้อมูลของร้าน เพื่อที่จะให้ร้านค้าของคุณอยู่ในระบบต่อไป
                </p>
                <p>
                ผู้ดูแลระบบ
                </p>
                ';

                $sendEmail = array(
                    'subject' => Yii::t('language', 'รายการแจ้งเตือน'),
                    'message' => $message,
                    'to' => $model_profile_user->email,
                );
                Tool::mailsend($sendEmail);
            }
        }
    }

}

?>

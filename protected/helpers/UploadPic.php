<?php

class UploadPic {

    public static function upload($model, $attribute) {
        $fileSave = CUploadedFile::getInstance($model, $attribute);
        if ($fileSave != NULL) {
            $dir = '/upload/img/websim/item/';
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            if ($model->$attribute != NULL) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                if (fopen('.' . $model->$attribute, 'w'))
                    if (unlink('.' . $model->$attribute)) {
                        
                    }
            }

            $filename = $dir . rand('000', '999') . $fileSave->name;
            $model->$attribute = $filename;
            $fileSave->saveAs('.' . $filename);
        } else {
            if ($model->$attribute == NULL)
                $model->$attribute = NULL;
        }
        return $model;
    }

}

?>

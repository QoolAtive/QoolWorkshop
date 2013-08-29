<?php

class ShopController extends Controller {

    public $format;
    public $shop;
    public $busket;

    public function init() {
        Yii::app()->theme = 'web_sim';
        parent::init();
    }

    public function settingShop($id) {
        $model = WebShop::model()->findByPk($id);
        $this->shop = $model;
        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $id));
        $this->format = $format;
        $this->busket = Yii::app()->session['busket'];
        return $model;
    }

    public function actionIndex($id) {
//        $model = WebShop::model()->findByPk($id);
//        $this->shop = $model;
//        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $id));
//        $this->format = $format;
        $model = $this->settingShop($id);
//        Yii::app()->getClientScript()->registerCssFile(yii::app()->theme->baseUrl . '/' . $format['theme'] . '/css/style.css', 'screen');
        if ($model != NULL) {
            $this->render('index', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionProductShop($id) {
        $model = $this->settingShop($id);

        if ($model != NULL) {
            $this->render('product_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionPayShop($id) {
        $model = $this->settingShop($id);

        if ($model != NULL) {
            $this->render('pay_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionAboutShop($id) {
        $model = $this->settingShop($id);

        if ($model != NULL) {
            $this->render('about_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionProductDetail($id, $p_id) {
        $model = $this->settingShop($id);
        $model_item = WebShopItem::model()->findByPk($p_id);

        if ($model_item != NULL) {
            $this->render('product_detail', array(
                'id' => $id,
                'p_id' => $p_id,
                'item_detail' => $model_item,
                'busket' => Yii::app()->session['busket'],
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบสินค้าที่ท่านต้องการ'));
        }
    }

    public function actionCategory($id, $category_id) {
        $model = $this->settingShop($id);
        $category = WebShopCategory::model()->findByPk($category_id);
        if ($category != NULL) {
            $this->render('category', array(
                'id' => $id,
                'category_id' => $category_id,
                'category' => $category,
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบหมวดหมู่ที่ท่านต้องการ'));
        }
    }

    public function actionBox($id, $box_id) {
        $model = $this->settingShop($id);
        $box = WebShopBox::model()->findByPk($box_id);
        if ($box != NULL) {
            $this->render('box', array(
                'id' => $id,
                'box_id' => $box_id,
                'box' => $box,
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบกล่องแสดงสินค้าที่ท่านต้องการ'));
        }
    }

    public function actionSelectItem($item_id) {
        $this->busket = Yii::app()->session['busket'];
        if (isset($_POST['number'])) {
            $number = $_POST['number'];
            $this->busket[$item_id] = $number;
        } else {
            unset($this->busket[$item_id]);
        }
        Yii::app()->session['busket'] = $this->busket;

//        print_r(Yii::app()->session['busket']);
//        $this->renderPartial('busket_btn_', array('busket' => $this->busket, 'item_id' => $item_id));
        echo CJSON::encode(
                array(
                    'div1' => $this->renderPartial('busket_btn_', array('busket' => $this->busket, 'item_id' => $item_id), true, true),
                    'div2' => $this->renderPartial('//layouts/busket_side_', array('busket' => $this->busket), true, true),
                )
        );
    }

    public function actionRemoveAllItem() {
        unset(Yii::app()->session['busket']);
        echo "<script language='javascript'>
            alert('" . Yii::t('language', 'ตะกร้าว่างแล้ว') . "');
                    history.back();
        </script>";
    }

    public function actionBusket($id) {
        $model = $this->settingShop($id);
        $this->busket = Yii::app()->session['busket'];
        $this->render('busket', array(
            'id' => $id,
            'busket' => $this->busket,
        ));
    }

    public function actionOrder($id, $price_all) {
        $model = $this->settingShop($id);
        $this->busket = Yii::app()->session['busket'];

        $order = new WebShopOrder();
        $order->web_shop_id = $id;
        $order->order_at = date("Y-m-d H:i:s");
        $order->price_all = $price_all;
        $order->status = '0';
        if (isset($_POST['WebShopOrder'])) {
            $order->attributes = $_POST['WebShopOrder'];
            if ($order->save()) {
                $order_id = $order->getPrimaryKey();

                foreach ($this->busket as $amount) {
                    $order_detail = new WebShopOrderDetail();
                    $order_detail->web_shop_order_id = $order_id;
                    $order_detail->web_shop_id = $id;
                    $item_id = array_search($amount, $this->busket);
                    $item = WebShopItem::model()->findByPk($item_id);
                    if ($item['price_special'] != NULL) {
                        $price = $item['price_special'];
                    } else {
                        $price = $item['price_normal'];
                    }
                    $order_detail->web_shop_item_id = $item_id; //item_id
                    $order_detail->amount = $amount; //จำนวน
                    $order_detail->price = $price;
                    $order_detail->save();
                }
                echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'สั่งซื้อสินค้าเรียบร้อย') . "');
                            window.top.location.href = '/webSimulation/shop/index/id/" . $id . "';
                </script>";
            }//end if ($order->save()) {
        }//end if(isset($_POST['WebShopOrder'])){

        $this->render('order', array(
            'id' => $id,
            'order' => $order,
            'busket' => $this->busket,
        ));
    }

}

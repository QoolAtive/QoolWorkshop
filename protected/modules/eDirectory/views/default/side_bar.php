<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/edir.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $type_list = SpTypeBusiness::model()->findAll();
            $n = 3;
            echo '<li class="">' . CHtml::ajaxLink(
                    'ทั้งหมด', Yii::app()->createUrl('/eDirectory/default/search'), array(// ajaxOptions
                'type' => 'POST',
//                    'beforeSend' => "function( request )
//                                    {
//                                      asdfadf
//                                    }",
//                    'success' => "function( data )
//                                { 
//                                  // handle return data
//                                  alert( data );
//                                }",
                'update' => 'div#show_detail',
                'data' => array('type' => '')
                    ), array(//htmlOptions
//                'class' => '',
                'rel' => 'view1',
            )) . '</li>';
            if (Yii::app()->user->isAdmin())
                echo '<li class"">' . CHtml::link(Yii::t('language', 'จัดการร้านค้า'), array('/eDirectory/admin/index'), array('rel' => 'view2')) . '</li>';
            foreach ($type_list as $data) {
//                if ($data['id'] == 1) {
//                    $select = 'selected';
//                } else {
//                    $select = '';
//                }
                echo '<li class="">' . CHtml::ajaxLink(
                        $data['name'], Yii::app()->createUrl('/eDirectory/default/search'), array(// ajaxOptions
                    'type' => 'POST',
//                    'beforeSend' => "function( request )
//                                    {
//                                      asdfadf
//                                    }",
//                    'success' => "function( data )
//                                { 
//                                  // handle return data
//                                  alert( data );
//                                }",
                    'update' => 'div#show_detail',
                    'data' => array('type' => $data['id'], 'name' => $_POST['name'], 'address' => 'js:$("#address").val()')
                        ), array(//htmlOptions
//                    'class' => $class
                    'rel' => 'view' . $n++,
                )) . '</li>';
            }
            ?>
        </ul>
    </div>
</div>
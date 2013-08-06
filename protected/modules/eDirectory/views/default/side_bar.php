<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/edir.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $type_list = SpTypeBusiness::model()->findAll();
            $select = '';
            echo '<li selected=' . $select . '>' . CHtml::ajaxLink(
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
                'data' => array('type' => '', 'name' => '#')
                    ), array(//htmlOptions
                'class' => $class
            )) . '</li>';

            foreach ($type_list as $data) {
//                if ($data['id'] == 1) {
//                    $select = 'selected';
//                } else {
//                    $select = '';
//                }
                echo '<li selected=' . $select . '>' . CHtml::ajaxLink(
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
                    'data' => array('type' => $data['id'], 'name' => 'js:$("#name").val()', 'address' => 'js:$("#address").val()')
                        ), array(//htmlOptions
                    'class' => $class
                )) . '</li>';
            }
            ?>
        </ul>
    </div>
</div>
<style type="text/css">

    html, body{
        height: 100% !important;
    }
    #header{
        display: none !important;
    }
    #footer{
        display: none !important;
    }

    div.page{
        padding: 0px !important;
        margin: 0 !important;
        width: 800px;
        height: 200px !important;
        min-height: 200px !important;
        max-height: 200px !important;
        border: 0px !important;
        background-color: #f9f9f9;
    }

    #wrapper .bg{
        background: #f9f9f9 !important;
    }



</style>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'register_rules-form',
    'enableAjaxValidation' => false,
        ));
?>
<h2>นโยบายและเงื่อนไขข้อตกลง</h2>
<p>สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า มีนโยบายในการคุ้มครองข้อมูลส่วนบุคคลของผู้ใช้บริการทุกท่าน เพื่อเป็นการสร้างความมั่นใจและเชื่อมั่นในบริการของสำนักพาณิชย์ อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า จึงขอแจ้งรายละเอียด ดังนี้</p>

<p><strong>1. ข้อมูลส่วนบุคคลของผู้ใช้บริการ</strong></p>

<p style="margin-left:40px"><strong>1.1</strong> ข้อมูลส่วนบุคคล ที่ท่านได้ให้ หรือผ่านการประมวลผลทางคอมพิวเตอร์ของทางสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ทั้งหมด ท่านยอมรับและตกลงว่าเป็นสิทธิและกรรมสิทธิ์ของสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ซึ่งสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า จะใช้ความพยายามอย่างดีที่สุด ที่จะคุ้มครองข้อมูลส่วนบุคคลดังกล่าว<br />
    <strong>1.2</strong> ในกรณีที่ท่านได้รับความเสียหาย อันเกิดจากความสูญหาย หรือเสียหายของข้อมูลส่วนบุคคล หรือเกิดจากเหตุใดก็ตาม ซึ่งรวมถึงแต่ไม่จำกัดเฉพาะ เกิดจากการถูกจารกรรม โดยวิธีการทางอิเล็กทรอนิกส์ (hack) หรือเกิดจากเหตุสุดวิสัย หรือไม่ว่ากรณีใดๆ ทั้งสิ้น ส่วนสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ขอสงวนสิทธิในการปฏิเสธความรับผิดจากเหตุดังกล่าวทั้งหมด และส่วนสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ไม่ต้องรับผิดชอบต่อความเสียหาย สูญหายใดๆ ที่เกิดขึ้นทั้งสิ้น<br />
    <strong>1.3</strong> ผู้ใช้บริการตกลงว่า จะไม่กระทำการใดอันขัดต่อกฎหมาย และ/หรือศีลธรรมอันดีของประชาชน โดยจะไม่ลงเนื้อหาในเว็ปไซต์ ส่งเนื้อหา รวมถึง การนำข้อความ รูปภาพ หรือ ภาพเคลื่อนไหว ที่ไม่เหมาะสม ไม่สุภาพ มีลักษณะเสียดสี ก่อให้เกิดความขัดแย้ง หรือเป็นเท็จ รวมทั้งข้อความ และรูปภาพ ที่มีลักษณะขัดต่อกฎหมาย หรือศีลธรรมอันดีของประชาชน เผยแพร่ผ่านเว็บไซต์ของตนเอง หรือกระทำการอื่นใดอันอาจก่อให้เกิดความสูญเสีย หรือเสียหายต่อสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า และ/หรือบุคคลภายนอก หากปรากฎว่ามีการนำเสนอขายสินค้า และ/หรือให้บริการ ที่มีลักษณะขัด ละเมิดต่อกฎหมายตามข้อความ ในวรรคนี้ หรือ สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า มีเหตุผลในการสงสัยว่าข้อมูลดังกล่าวไม่เป็นจริง ไม่ถูกต้อง สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ขอสงวนสิทธิ ในการปิดเว็บไซต์ โดยไม่ต้องบอกกล่าวล่วงหน้า และ สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ไม่ต้องรับผิดชอบในความเสียหายใด ๆ ทั้งสิ้น</p>

<p><strong>2. สิทธิส่วนบุคคลของผู้ใช้บริการ</strong></p>

<p style="margin-left:40px">สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า มีนโยบายในการเคารพสิทธิส่วนบุคคลของลูกค้า สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า จะไม่ทำการตรวจสอบ แก้ไขข้อมูล เว้นแต่ว่า สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า มีความเชื่อที่ดีว่า การกระทำดังกล่าว จำเป็นเพื่อที่จะ<br />
    * ทำตามความต้องการทางกระบวนการด้านกฎหมาย<br />
    * เพื่อป้องกันและปกป้องสิทธิหรือทรัพย์สินของสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า<br />
    * เพื่อบังคับให้เป็นไปตามเงื่อนไขในการให้บริการของสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า<br />
    * กระทำเพื่อปกป้องผลประโยชน์ของลูกค้าท่านอื่น</p>

<p><strong>3. การไม่มีตัวแทน หุ้นส่วน หรือมีนิติสัมพันธ์ใดๆ</strong></p>

<p style="margin-left:40px"><strong>3.1</strong> สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ไม่มีตัวแทน หุ้นส่วน หรือมีนิติสัมพันธ์ใดๆ กับหน่วยงาน ร้านค้า บริษัท บุคคลอื่นใด สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ขอเรียนว่า หากมีผู้อื่นใด นำเสนอข้อมูลหรือแจ้งข้อความ หรือบอกให้กระทำการที่นอกเหนือจากเว็บไซต์สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า แจ้งไว้ หากก่อให้เกิดความเสียหาย แก่ผู้ใช้บริการ หรือบุคคลภายนอก จึงไม่ก่อให้เกิดสิทธิ ความรับผิด และ/หรือ ภาระผูกพันทาง กฎหมายไม่ว่ากรณีใด ๆ ทั้งสิ้น ระหว่างสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า เจ้าของข้อมูลข่าวสาร ผู้ใช้บริการ สมาชิกของเว็บไซด์ และบุคคลภายนอก</p>

<p><strong>4. สิทธิตามกฎหมาย</strong></p>

<p style="margin-left:40px"><strong>4.1</strong> เนื้อหา ส่วนประกอบใด ๆ ทั้งหมดของเว็บไซด์สำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า เป็นเนื้อหาอันได้รับความคุ้มครองตามกฎหมาย โดยชอบด้วยกฎหมายของสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า หากบุคคลใด ลอกเลียน ปลอมแปลง ทำซ้ำ ดัดแปลง เผยแพร่ต่อสาธารณชน หรือกระทำการใด ๆ ในลักษณะที่เป็นการแสวงหาประโยชน์ ทางการค้าหรือ ประโยชน์โดยมิชอบ ไม่ว่าโดยประการใด ๆ โดยไม่ได้รับอนุญาตจากสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า ทางสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า จะดำเนินการตามกฎหมายกับผู้ละเมิดสิทธิดังกล่าวโดยทันที</p>

<p><strong>5. การปรับปรุงนโยบายความเป็นส่วนตัว</strong></p>

<p style="margin-left:40px"><strong>5.1</strong> อาจมีการปรับปรุง แก้ไขนโยบายคุ้มครองข้อมูลส่วนบุคคลของผู้ใช้บริการ โดยไม่ได้แจ้งให้ผู้ใช้บริการทราบล่วงหน้า ทั้งนี้เพื่อความเหมาะสม และมีประสิทธิภาพในการให้บริการ จึงขอให้ผู้ใช้บริการอ่านนโยบายคุ้มครองข้อมูลส่วนบุคคลของผู้ใช้บริการทุก ครั้งที่ใช้บริการของสำนักพาณิชย์อิเล็กทรอนิกส์ กรมพัฒนาธุรกิจการค้า</p>

<div style="text-align: center; padding:10px 0;">	
    <!--<a href="/member/manage/registerPerson" class="btn purple twhite " target="_parent" >Accept</a>-->
    <?php echo CHtml::submitButton(Yii::t('language', 'Accept'), array('class' => 'btn purple twhite', 'target' => '_parent')); ?>
    <input type="button" value="Cancle" class="grey" onClick="javascript:parent.jQuery.fancybox.close();"> 
<!--  -->
</div>


<?php
$this->endWidget();
?>
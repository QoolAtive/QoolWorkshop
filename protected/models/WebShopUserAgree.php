<?php

/**
 * This is the model class for table "web_shop_user_agree".
 *
 * The followings are the available columns in table 'web_shop_user_agree':
 * @property integer $mem_user_id
 *
 * The followings are the available model relations:
 * @property MemUser $memUser
 */
class WebShopUserAgree extends WebShopUserAgreeBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopUserAgreeBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'web_shop_user_agree';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mem_user_id', 'required'),
			array('mem_user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mem_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'memUser' => array(self::BELONGS_TO, 'MemUser', 'mem_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mem_user_id' => 'Mem User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('mem_user_id',$this->mem_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
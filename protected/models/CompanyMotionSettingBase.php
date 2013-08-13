<?php

/**
 * This is the model class for table "company_motion_setting".
 *
 * The followings are the available columns in table 'company_motion_setting':
 * @property integer $company_motion_setting_id
 * @property integer $amount
 * @property string $type
 * @property integer $use
 */
class CompanyMotionSettingBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyMotionSettingBase the static model class
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
		return 'company_motion_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, type, use', 'required'),
			array('amount, use', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_motion_setting_id, amount, type, use', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_motion_setting_id' => 'Company Motion Setting',
			'amount' => 'Amount',
			'type' => 'Type',
			'use' => 'Use',
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

		$criteria->compare('company_motion_setting_id',$this->company_motion_setting_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('use',$this->use);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
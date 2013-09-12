<?php

/**
 * This is the model class for table "sp_type_com".
 *
 * The followings are the available columns in table 'sp_type_com':
 * @property integer $id
 * @property integer $com_id
 * @property string $type_id
 * @property integer $sp_type_business_sub_id
 */
class SpTypeComBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpTypeComBase the static model class
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
		return 'sp_type_com';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, type_id', 'required'),
			array('com_id, sp_type_business_sub_id', 'numerical', 'integerOnly'=>true),
			array('type_id', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, com_id, type_id, sp_type_business_sub_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'com_id' => 'Com',
			'type_id' => 'Type',
			'sp_type_business_sub_id' => 'Sp Type Business Sub',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('type_id',$this->type_id,true);
		$criteria->compare('sp_type_business_sub_id',$this->sp_type_business_sub_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
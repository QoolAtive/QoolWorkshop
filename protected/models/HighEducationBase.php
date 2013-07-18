<?php

/**
 * This is the model class for table "high_education".
 *
 * The followings are the available columns in table 'high_education':
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property string $abbreviation
 * @property string $abbreviation_en
 */
class HighEducationBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HighEducationBase the static model class
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
		return 'high_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, name_en', 'required'),
			array('name, name_en, abbreviation, abbreviation_en', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, name_en, abbreviation, abbreviation_en', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'name_en' => 'Name En',
			'abbreviation' => 'Abbreviation',
			'abbreviation_en' => 'Abbreviation En',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('abbreviation',$this->abbreviation,true);
		$criteria->compare('abbreviation_en',$this->abbreviation_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "company_them".
 *
 * The followings are the available columns in table 'company_them':
 * @property integer $id
 * @property integer $main_id
 * @property integer $status_appro
 * @property string $date_write
 * @property string $date_appro
 *
 * The followings are the available model relations:
 * @property Company $main
 */
class CompanyThemBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyThemBase the static model class
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
		return 'company_them';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, status_appro, date_write', 'required'),
			array('main_id, status_appro', 'numerical', 'integerOnly'=>true),
			array('date_appro', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, main_id, status_appro, date_write, date_appro', 'safe', 'on'=>'search'),
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
			'main' => array(self::BELONGS_TO, 'Company', 'main_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'main_id' => 'Main',
			'status_appro' => 'Status Appro',
			'date_write' => 'Date Write',
			'date_appro' => 'Date Appro',
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
		$criteria->compare('main_id',$this->main_id);
		$criteria->compare('status_appro',$this->status_appro);
		$criteria->compare('date_write',$this->date_write,true);
		$criteria->compare('date_appro',$this->date_appro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
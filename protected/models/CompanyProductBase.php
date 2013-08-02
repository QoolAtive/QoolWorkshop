<?php

/**
 * This is the model class for table "company_product".
 *
 * The followings are the available columns in table 'company_product':
 * @property integer $id
 * @property integer $main_id
 * @property string $pic
 * @property string $name
 * @property string $name_en
 * @property string $detail
 * @property string $detail_en
 * @property string $date_write
 * @property integer $guide
 *
 * The followings are the available model relations:
 * @property Company $main
 */
class CompanyProductBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyProductBase the static model class
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
		return 'company_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, pic, name, name_en, detail, detail_en, date_write, guide', 'required'),
			array('main_id, guide', 'numerical', 'integerOnly'=>true),
			array('pic', 'length', 'max'=>100),
			array('name, name_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, main_id, pic, name, name_en, detail, detail_en, date_write, guide', 'safe', 'on'=>'search'),
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
			'pic' => 'Pic',
			'name' => 'Name',
			'name_en' => 'Name En',
			'detail' => 'Detail',
			'detail_en' => 'Detail En',
			'date_write' => 'Date Write',
			'guide' => 'Guide',
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
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('date_write',$this->date_write,true);
		$criteria->compare('guide',$this->guide);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
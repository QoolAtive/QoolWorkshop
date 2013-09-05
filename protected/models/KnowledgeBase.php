<?php

/**
 * This is the model class for table "knowledge".
 *
 * The followings are the available columns in table 'knowledge':
 * @property integer $id
 * @property integer $type_id
 * @property string $subject
 * @property string $subject_en
 * @property string $detail
 * @property string $detail_en
 * @property string $guide_status
 * @property string $date_write
 * @property string $image
 * @property integer $position
 * @property integer $count
 *
 * The followings are the available model relations:
 * @property KnowledgeThem[] $knowledgeThems
 */
class KnowledgeBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KnowledgeBase the static model class
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
		return 'knowledge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, subject, detail, guide_status, date_write, position', 'required'),
			array('type_id, position, count', 'numerical', 'integerOnly'=>true),
			array('subject, subject_en', 'length', 'max'=>255),
			array('guide_status', 'length', 'max'=>1),
			array('image', 'length', 'max'=>100),
			array('detail_en', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, subject, subject_en, detail, detail_en, guide_status, date_write, image, position, count', 'safe', 'on'=>'search'),
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
			'knowledgeThems' => array(self::HAS_MANY, 'KnowledgeThem', 'main_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Type',
			'subject' => 'Subject',
			'subject_en' => 'Subject En',
			'detail' => 'Detail',
			'detail_en' => 'Detail En',
			'guide_status' => 'Guide Status',
			'date_write' => 'Date Write',
			'image' => 'Image',
			'position' => 'Position',
			'count' => 'Count',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('subject_en',$this->subject_en,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('guide_status',$this->guide_status,true);
		$criteria->compare('date_write',$this->date_write,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
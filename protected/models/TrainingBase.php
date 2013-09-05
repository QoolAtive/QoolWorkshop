<?php

/**
 * This is the model class for table "training".
 *
 * The followings are the available columns in table 'training':
 * @property integer $id
 * @property string $subject_th
 * @property string $detail_th
 * @property string $subject_en
 * @property string $detail_en
 * @property string $link
 * @property string $start_at
 * @property string $end_at
 * @property string $event_color
 *
 * The followings are the available model relations:
 * @property Calendar[] $calendars
 */
class TrainingBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrainingBase the static model class
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
		return 'training';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_th, detail_th, subject_en, detail_en, link, start_at, end_at, event_color', 'required'),
			array('subject_th, subject_en', 'length', 'max'=>200),
			array('link', 'length', 'max'=>100),
			array('event_color', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject_th, detail_th, subject_en, detail_en, link, start_at, end_at, event_color', 'safe', 'on'=>'search'),
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
			'calendars' => array(self::HAS_MANY, 'Calendar', 'training_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject_th' => 'Subject Th',
			'detail_th' => 'Detail Th',
			'subject_en' => 'Subject En',
			'detail_en' => 'Detail En',
			'link' => 'Link',
			'start_at' => 'Start At',
			'end_at' => 'End At',
			'event_color' => 'Event Color',
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
		$criteria->compare('subject_th',$this->subject_th,true);
		$criteria->compare('detail_th',$this->detail_th,true);
		$criteria->compare('subject_en',$this->subject_en,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('start_at',$this->start_at,true);
		$criteria->compare('end_at',$this->end_at,true);
		$criteria->compare('event_color',$this->event_color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "learning_video".
 *
 * The followings are the available columns in table 'learning_video':
 * @property integer $id
 * @property integer $main_id
 * @property string $video
 * @property string $video_en
 */
class LearningVideoBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LearningVideoBase the static model class
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
		return 'learning_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, video, video_en', 'required'),
			array('main_id', 'numerical', 'integerOnly'=>true),
			array('video', 'length', 'max'=>100),
			array('video_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, main_id, video, video_en', 'safe', 'on'=>'search'),
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
			'main_id' => 'Main',
			'video' => 'Video',
			'video_en' => 'Video En',
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
		$criteria->compare('video',$this->video,true);
		$criteria->compare('video_en',$this->video_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "learning".
 *
 * The followings are the available columns in table 'learning':
 * @property integer $id
 * @property integer $group_id
 * @property string $subject
 * @property string $subject_en
 * @property string $detail
 * @property string $detail_en
 * @property string $author
 * @property string $guide_status
 * @property string $date_write
 */
class LearningBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LearningBase the static model class
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
		return 'learning';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, subject, subject_en, detail, detail_en, author, guide_status, date_write', 'required'),
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('subject, subject_en', 'length', 'max'=>255),
			array('author', 'length', 'max'=>100),
			array('guide_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, subject, subject_en, detail, detail_en, author, guide_status, date_write', 'safe', 'on'=>'search'),
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
			'group_id' => 'Group',
			'subject' => 'Subject',
			'subject_en' => 'Subject En',
			'detail' => 'Detail',
			'detail_en' => 'Detail En',
			'author' => 'Author',
			'guide_status' => 'Guide Status',
			'date_write' => 'Date Write',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('subject_en',$this->subject_en,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('guide_status',$this->guide_status,true);
		$criteria->compare('date_write',$this->date_write,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
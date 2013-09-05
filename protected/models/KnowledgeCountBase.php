<?php

/**
 * This is the model class for table "knowledge_count".
 *
 * The followings are the available columns in table 'knowledge_count':
 * @property integer $knowledge_count_id
 * @property integer $user_id
 * @property integer $count
 */
class KnowledgeCountBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KnowledgeCountBase the static model class
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
		return 'knowledge_count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, count', 'required'),
			array('user_id, count', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('knowledge_count_id, user_id, count', 'safe', 'on'=>'search'),
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
			'knowledge_count_id' => 'Knowledge Count',
			'user_id' => 'User',
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

		$criteria->compare('knowledge_count_id',$this->knowledge_count_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
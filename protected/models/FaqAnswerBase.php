<?php

/**
 * This is the model class for table "faq_answer".
 *
 * The followings are the available columns in table 'faq_answer':
 * @property integer $id
 * @property integer $fq_id
 * @property string $detail
 * @property string $author
 * @property string $date_write
 */
class FaqAnswerBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FaqAnswerBase the static model class
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
		return 'faq_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fq_id, author, date_write', 'required'),
			array('fq_id', 'numerical', 'integerOnly'=>true),
			array('author', 'length', 'max'=>100),
			array('detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fq_id, detail, author, date_write', 'safe', 'on'=>'search'),
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
			'fq_id' => 'Fq',
			'detail' => 'Detail',
			'author' => 'Author',
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
		$criteria->compare('fq_id',$this->fq_id);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('date_write',$this->date_write,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
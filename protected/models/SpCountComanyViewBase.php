<?php

/**
 * This is the model class for table "sp_count_comany_view".
 *
 * The followings are the available columns in table 'sp_count_comany_view':
 * @property integer $sp_id
 * @property integer $sp_company_id
 * @property integer $count_company_view
 * @property string $update_at
 */
class SpCountComanyViewBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpCountComanyViewBase the static model class
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
		return 'sp_count_comany_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sp_company_id, count_company_view, update_at', 'required'),
			array('sp_id, sp_company_id, count_company_view', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sp_id, sp_company_id, count_company_view, update_at', 'safe', 'on'=>'search'),
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
			'sp_id' => 'Sp',
			'sp_company_id' => 'Sp Company',
			'count_company_view' => 'Count Company View',
			'update_at' => 'Update At',
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

		$criteria->compare('sp_id',$this->sp_id);
		$criteria->compare('sp_company_id',$this->sp_company_id);
		$criteria->compare('count_company_view',$this->count_company_view);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
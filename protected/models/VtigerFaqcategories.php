<?php

/**
 * This is the model class for table "vtiger_faqcategories".
 *
 * The followings are the available columns in table 'vtiger_faqcategories':
 * @property integer $faqcategories_id
 * @property string $faqcategories
 * @property integer $presence
 * @property integer $picklist_valueid
 */
class VtigerFaqcategories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_faqcategories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('presence, picklist_valueid', 'numerical', 'integerOnly'=>true),
			array('faqcategories', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('faqcategories_id, faqcategories, presence, picklist_valueid', 'safe', 'on'=>'search'),
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
			'faqcategories_id' => 'Faqcategories',
			'faqcategories' => 'Faqcategories',
			'presence' => 'Presence',
			'picklist_valueid' => 'Picklist Valueid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('faqcategories_id',$this->faqcategories_id);
		$criteria->compare('faqcategories',$this->faqcategories,true);
		$criteria->compare('presence',$this->presence);
		$criteria->compare('picklist_valueid',$this->picklist_valueid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerFaqcategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

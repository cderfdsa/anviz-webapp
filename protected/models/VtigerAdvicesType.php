<?php

/**
 * This is the model class for table "vtiger_advices_type".
 *
 * The followings are the available columns in table 'vtiger_advices_type':
 * @property integer $advices_typeid
 * @property string $advices_type
 * @property integer $presence
 * @property integer $picklist_valueid
 * @property string $_MASK_TO_V2
 */
class VtigerAdvicesType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_advices_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advices_type', 'required'),
			array('presence, picklist_valueid', 'numerical', 'integerOnly'=>true),
			array('advices_type', 'length', 'max'=>200),
			array('_MASK_TO_V2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('advices_typeid, advices_type, presence, picklist_valueid, _MASK_TO_V2', 'safe', 'on'=>'search'),
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
			'advices_typeid' => 'Advices Typeid',
			'advices_type' => 'Advices Type',
			'presence' => 'Presence',
			'picklist_valueid' => 'Picklist Valueid',
			'_MASK_TO_V2' => 'Mask To V2',
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

		$criteria->compare('advices_typeid',$this->advices_typeid);
		$criteria->compare('advices_type',$this->advices_type,true);
		$criteria->compare('presence',$this->presence);
		$criteria->compare('picklist_valueid',$this->picklist_valueid);
		$criteria->compare('_MASK_TO_V2',$this->_MASK_TO_V2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerAdvicesType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

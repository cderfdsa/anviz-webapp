<?php

/**
 * This is the model class for table "vtiger_ticketcategories".
 *
 * The followings are the available columns in table 'vtiger_ticketcategories':
 * @property integer $ticketcategories_id
 * @property string $ticketcategories
 * @property integer $presence
 * @property integer $picklist_valueid
 */
class VtigerTicketcategories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_ticketcategories';
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
			array('ticketcategories', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ticketcategories_id, ticketcategories, presence, picklist_valueid', 'safe', 'on'=>'search'),
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
			'ticketcategories_id' => 'Ticketcategories',
			'ticketcategories' => 'Ticketcategories',
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

		$criteria->compare('ticketcategories_id',$this->ticketcategories_id);
		$criteria->compare('ticketcategories',$this->ticketcategories,true);
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
	 * @return VtigerTicketcategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

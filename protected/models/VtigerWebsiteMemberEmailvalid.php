<?php

/**
 * This is the model class for table "vtiger_website_member_emailvalid".
 *
 * The followings are the available columns in table 'vtiger_website_member_emailvalid':
 * @property integer $id
 * @property integer $crmid
 * @property string $t
 * @property string $sendtime
 * @property string $validtype
 * @property string $validtime
 * @property integer $active
 */
class VtigerWebsiteMemberEmailvalid extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_website_member_emailvalid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('crmid, active', 'numerical', 'integerOnly'=>true),
			array('t, validtype', 'length', 'max'=>200),
			array('sendtime, validtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, crmid, t, sendtime, validtype, validtime, active', 'safe', 'on'=>'search'),
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
			'crmid' => 'Crmid',
			't' => 'T',
			'sendtime' => 'Sendtime',
			'validtype' => 'Validtype',
			'validtime' => 'Validtime',
			'active' => 'Active',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('crmid',$this->crmid);
		$criteria->compare('t',$this->t,true);
		$criteria->compare('sendtime',$this->sendtime,true);
		$criteria->compare('validtype',$this->validtype,true);
		$criteria->compare('validtime',$this->validtime,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerWebsiteMemberEmailvalid the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

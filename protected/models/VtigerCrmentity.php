<?php

/**
 * This is the model class for table "vtiger_crmentity".
 *
 * The followings are the available columns in table 'vtiger_crmentity':
 * @property integer $crmid
 * @property integer $smcreatorid
 * @property string $smcreatorip
 * @property integer $smownerid
 * @property integer $modifiedby
 * @property string $modifiedip
 * @property string $setype
 * @property string $description
 * @property string $createdtime
 * @property string $modifiedtime
 * @property string $viewedtime
 * @property string $status
 * @property integer $version
 * @property integer $presence
 * @property integer $deleted
 * @property string $smcreatedip
 */
class VtigerCrmentity extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_crmentity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('crmid, setype, createdtime, modifiedtime', 'required'),
			array('crmid, smcreatorid, smownerid, modifiedby, version, presence, deleted', 'numerical', 'integerOnly'=>true),
			array('smcreatorip, modifiedip, smcreatedip', 'length', 'max'=>25),
			array('setype', 'length', 'max'=>30),
			array('status', 'length', 'max'=>50),
			array('description, viewedtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('crmid, smcreatorid, smcreatorip, smownerid, modifiedby, modifiedip, setype, description, createdtime, modifiedtime, viewedtime, status, version, presence, deleted, smcreatedip', 'safe', 'on'=>'search'),
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
			'crmid' => 'Crmid',
			'smcreatorid' => 'Smcreatorid',
			'smcreatorip' => 'Smcreatorip',
			'smownerid' => 'Smownerid',
			'modifiedby' => 'Modifiedby',
			'modifiedip' => 'Modifiedip',
			'setype' => 'Setype',
			'description' => 'Description',
			'createdtime' => 'Createdtime',
			'modifiedtime' => 'Modifiedtime',
			'viewedtime' => 'Viewedtime',
			'status' => 'Status',
			'version' => 'Version',
			'presence' => 'Presence',
			'deleted' => 'Deleted',
			'smcreatedip' => 'Smcreatedip',
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

		$criteria->compare('crmid',$this->crmid);
		$criteria->compare('smcreatorid',$this->smcreatorid);
		$criteria->compare('smcreatorip',$this->smcreatorip,true);
		$criteria->compare('smownerid',$this->smownerid);
		$criteria->compare('modifiedby',$this->modifiedby);
		$criteria->compare('modifiedip',$this->modifiedip,true);
		$criteria->compare('setype',$this->setype,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createdtime',$this->createdtime,true);
		$criteria->compare('modifiedtime',$this->modifiedtime,true);
		$criteria->compare('viewedtime',$this->viewedtime,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('version',$this->version);
		$criteria->compare('presence',$this->presence);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('smcreatedip',$this->smcreatedip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerCrmentity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

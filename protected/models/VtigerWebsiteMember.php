<?php

/**
 * This is the model class for table "vtiger_website_member".
 *
 * The followings are the available columns in table 'vtiger_website_member':
 * @property integer $crmid
 * @property string $password
 * @property string $islogin
 * @property string $isadmin
 * @property string $registertime
 * @property string $registerip
 * @property integer $isvalid
 * @property string $validtime
 * @property string $validip
 * @property string $lastlogintime
 * @property string $lastloginip
 * @property string $deleted
 * @property string $deletedtime
 * @property string $registerfrom
 * @property integer $registerby
 */
class VtigerWebsiteMember extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_website_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('crmid', 'required'),
			array('crmid, isvalid, registerby', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max'=>200),
			array('islogin, isadmin', 'length', 'max'=>2),
			array('registerip, validip, lastloginip', 'length', 'max'=>20),
			array('deleted', 'length', 'max'=>14),
			array('registerfrom', 'length', 'max'=>100),
			array('registertime, validtime, lastlogintime, deletedtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('crmid, password, islogin, isadmin, registertime, registerip, isvalid, validtime, validip, lastlogintime, lastloginip, deleted, deletedtime, registerfrom, registerby', 'safe', 'on'=>'search'),
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
			'password' => 'Password',
			'islogin' => 'Islogin',
			'isadmin' => 'Isadmin',
			'registertime' => 'Registertime',
			'registerip' => 'Registerip',
			'isvalid' => 'Isvalid',
			'validtime' => 'Validtime',
			'validip' => 'Validip',
			'lastlogintime' => 'Lastlogintime',
			'lastloginip' => 'Lastloginip',
			'deleted' => 'Deleted',
			'deletedtime' => 'Deletedtime',
			'registerfrom' => 'Registerfrom',
			'registerby' => 'Registerby',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('islogin',$this->islogin,true);
		$criteria->compare('isadmin',$this->isadmin,true);
		$criteria->compare('registertime',$this->registertime,true);
		$criteria->compare('registerip',$this->registerip,true);
		$criteria->compare('isvalid',$this->isvalid);
		$criteria->compare('validtime',$this->validtime,true);
		$criteria->compare('validip',$this->validip,true);
		$criteria->compare('lastlogintime',$this->lastlogintime,true);
		$criteria->compare('lastloginip',$this->lastloginip,true);
		$criteria->compare('deleted',$this->deleted,true);
		$criteria->compare('deletedtime',$this->deletedtime,true);
		$criteria->compare('registerfrom',$this->registerfrom,true);
		$criteria->compare('registerby',$this->registerby);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerWebsiteMember the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

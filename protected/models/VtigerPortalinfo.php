<?php

/**
 * This is the model class for table "vtiger_portalinfo".
 *
 * The followings are the available columns in table 'vtiger_portalinfo':
 * @property integer $id
 * @property string $user_name
 * @property string $user_password
 * @property string $type
 * @property string $last_login_time
 * @property string $login_time
 * @property string $logout_time
 * @property integer $isactive
 */
class VtigerPortalinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_portalinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, isactive', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>50),
			array('user_password', 'length', 'max'=>30),
			array('type', 'length', 'max'=>5),
			array('last_login_time, login_time, logout_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, user_password, type, last_login_time, login_time, logout_time, isactive', 'safe', 'on'=>'search'),
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
			'user_name' => 'User Name',
			'user_password' => 'User Password',
			'type' => 'Type',
			'last_login_time' => 'Last Login Time',
			'login_time' => 'Login Time',
			'logout_time' => 'Logout Time',
			'isactive' => 'Isactive',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('login_time',$this->login_time,true);
		$criteria->compare('logout_time',$this->logout_time,true);
		$criteria->compare('isactive',$this->isactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerPortalinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

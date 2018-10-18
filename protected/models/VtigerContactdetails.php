<?php

/**
 * This is the model class for table "vtiger_contactdetails".
 *
 * The followings are the available columns in table 'vtiger_contactdetails':
 * @property integer $contactid
 * @property string $contact_no
 * @property integer $accountid
 * @property string $salutation
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $title
 * @property string $department
 * @property string $fax
 * @property string $reportsto
 * @property string $training
 * @property string $usertype
 * @property string $contacttype
 * @property string $otheremail
 * @property string $secondaryemail
 * @property string $donotcall
 * @property string $emailoptout
 * @property string $imagename
 * @property string $reference
 * @property string $notify_owner
 */
class VtigerContactdetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_contactdetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_no, lastname', 'required'),
			array('contactid, accountid', 'numerical', 'integerOnly'=>true),
			array('contact_no, email, otheremail, secondaryemail', 'length', 'max'=>100),
			array('salutation', 'length', 'max'=>200),
			array('firstname', 'length', 'max'=>40),
			array('lastname', 'length', 'max'=>80),
			array('phone, mobile, title, fax, training, usertype, contacttype', 'length', 'max'=>50),
			array('department, reportsto', 'length', 'max'=>30),
			array('donotcall, emailoptout, reference, notify_owner', 'length', 'max'=>3),
			array('imagename', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contactid, contact_no, accountid, salutation, firstname, lastname, email, phone, mobile, title, department, fax, reportsto, training, usertype, contacttype, otheremail, secondaryemail, donotcall, emailoptout, imagename, reference, notify_owner', 'safe', 'on'=>'search'),
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
			'contactid' => 'Contactid',
			'contact_no' => 'Contact No',
			'accountid' => 'Accountid',
			'salutation' => 'Salutation',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'title' => 'Title',
			'department' => 'Department',
			'fax' => 'Fax',
			'reportsto' => 'Reportsto',
			'training' => 'Training',
			'usertype' => 'Usertype',
			'contacttype' => 'Contacttype',
			'otheremail' => 'Otheremail',
			'secondaryemail' => 'Secondaryemail',
			'donotcall' => 'Donotcall',
			'emailoptout' => 'Emailoptout',
			'imagename' => 'Imagename',
			'reference' => 'Reference',
			'notify_owner' => 'Notify Owner',
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

		$criteria->compare('contactid',$this->contactid);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('accountid',$this->accountid);
		$criteria->compare('salutation',$this->salutation,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('reportsto',$this->reportsto,true);
		$criteria->compare('training',$this->training,true);
		$criteria->compare('usertype',$this->usertype,true);
		$criteria->compare('contacttype',$this->contacttype,true);
		$criteria->compare('otheremail',$this->otheremail,true);
		$criteria->compare('secondaryemail',$this->secondaryemail,true);
		$criteria->compare('donotcall',$this->donotcall,true);
		$criteria->compare('emailoptout',$this->emailoptout,true);
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('notify_owner',$this->notify_owner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerContactdetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

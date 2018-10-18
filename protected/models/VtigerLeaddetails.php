<?php

/**
 * This is the model class for table "vtiger_leaddetails".
 *
 * The followings are the available columns in table 'vtiger_leaddetails':
 * @property integer $leadid
 * @property string $lead_no
 * @property string $email
 * @property string $interest
 * @property string $firstname
 * @property string $salutation
 * @property string $lastname
 * @property string $company
 * @property integer $annualrevenue
 * @property string $industry
 * @property string $campaign
 * @property string $rating
 * @property string $leadstatus
 * @property string $leadsource
 * @property integer $converted
 * @property string $designation
 * @property string $licencekeystatus
 * @property string $space
 * @property string $comments
 * @property string $priority
 * @property string $demorequest
 * @property string $partnercontact
 * @property string $productversion
 * @property string $product
 * @property string $maildate
 * @property string $nextstepdate
 * @property string $fundingsituation
 * @property string $purpose
 * @property string $evaluationstatus
 * @property string $transferdate
 * @property string $revenuetype
 * @property integer $noofemployees
 * @property string $secondaryemail
 * @property integer $assignleadchk
 * @property string $applystatus
 */
class VtigerLeaddetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_leaddetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leadid, lead_no, lastname, company', 'required'),
			array('leadid, annualrevenue, converted, noofemployees, assignleadchk', 'numerical', 'integerOnly'=>true),
			array('lead_no, email, company, secondaryemail', 'length', 'max'=>100),
			array('interest, leadstatus, designation, licencekeystatus, priority, demorequest, partnercontact, product, fundingsituation, purpose, evaluationstatus, revenuetype', 'length', 'max'=>50),
			array('firstname', 'length', 'max'=>40),
			array('salutation, industry, rating, leadsource, applystatus', 'length', 'max'=>200),
			array('lastname', 'length', 'max'=>80),
			array('campaign', 'length', 'max'=>30),
			array('space', 'length', 'max'=>250),
			array('productversion', 'length', 'max'=>20),
			array('comments, maildate, nextstepdate, transferdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('leadid, lead_no, email, interest, firstname, salutation, lastname, company, annualrevenue, industry, campaign, rating, leadstatus, leadsource, converted, designation, licencekeystatus, space, comments, priority, demorequest, partnercontact, productversion, product, maildate, nextstepdate, fundingsituation, purpose, evaluationstatus, transferdate, revenuetype, noofemployees, secondaryemail, assignleadchk, applystatus', 'safe', 'on'=>'search'),
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
			'leadid' => 'Leadid',
			'lead_no' => 'Lead No',
			'email' => 'Email',
			'interest' => 'Interest',
			'firstname' => 'Firstname',
			'salutation' => 'Salutation',
			'lastname' => 'Lastname',
			'company' => 'Company',
			'annualrevenue' => 'Annualrevenue',
			'industry' => 'Industry',
			'campaign' => 'Campaign',
			'rating' => 'Rating',
			'leadstatus' => 'Leadstatus',
			'leadsource' => 'Leadsource',
			'converted' => 'Converted',
			'designation' => 'Designation',
			'licencekeystatus' => 'Licencekeystatus',
			'space' => 'Space',
			'comments' => 'Comments',
			'priority' => 'Priority',
			'demorequest' => 'Demorequest',
			'partnercontact' => 'Partnercontact',
			'productversion' => 'Productversion',
			'product' => 'Product',
			'maildate' => 'Maildate',
			'nextstepdate' => 'Nextstepdate',
			'fundingsituation' => 'Fundingsituation',
			'purpose' => 'Purpose',
			'evaluationstatus' => 'Evaluationstatus',
			'transferdate' => 'Transferdate',
			'revenuetype' => 'Revenuetype',
			'noofemployees' => 'Noofemployees',
			'secondaryemail' => 'Secondaryemail',
			'assignleadchk' => 'Assignleadchk',
			'applystatus' => 'Applystatus',
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

		$criteria->compare('leadid',$this->leadid);
		$criteria->compare('lead_no',$this->lead_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('salutation',$this->salutation,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('annualrevenue',$this->annualrevenue);
		$criteria->compare('industry',$this->industry,true);
		$criteria->compare('campaign',$this->campaign,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('leadstatus',$this->leadstatus,true);
		$criteria->compare('leadsource',$this->leadsource,true);
		$criteria->compare('converted',$this->converted);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('licencekeystatus',$this->licencekeystatus,true);
		$criteria->compare('space',$this->space,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('priority',$this->priority,true);
		$criteria->compare('demorequest',$this->demorequest,true);
		$criteria->compare('partnercontact',$this->partnercontact,true);
		$criteria->compare('productversion',$this->productversion,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('maildate',$this->maildate,true);
		$criteria->compare('nextstepdate',$this->nextstepdate,true);
		$criteria->compare('fundingsituation',$this->fundingsituation,true);
		$criteria->compare('purpose',$this->purpose,true);
		$criteria->compare('evaluationstatus',$this->evaluationstatus,true);
		$criteria->compare('transferdate',$this->transferdate,true);
		$criteria->compare('revenuetype',$this->revenuetype,true);
		$criteria->compare('noofemployees',$this->noofemployees);
		$criteria->compare('secondaryemail',$this->secondaryemail,true);
		$criteria->compare('assignleadchk',$this->assignleadchk);
		$criteria->compare('applystatus',$this->applystatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerLeaddetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

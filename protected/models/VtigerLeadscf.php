<?php

/**
 * This is the model class for table "vtiger_leadscf".
 *
 * The followings are the available columns in table 'vtiger_leadscf':
 * @property integer $leadid
 * @property string $cf_620
 * @property string $cf_628
 * @property string $cf_629
 * @property string $cf_623
 * @property string $cf_632
 * @property string $cf_653
 * @property string $cf_654
 * @property string $cf_659
 * @property string $cf_660
 * @property string $cf_788
 * @property string $cf_789
 * @property string $cf_790
 * @property string $cf_791
 * @property string $cf_792
 * @property string $cf_793
 * @property string $cf_794
 * @property string $cf_795
 * @property string $cf_796
 * @property string $cf_812
 * @property string $cf_813
 */
class VtigerLeadscf extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_leadscf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leadid', 'numerical', 'integerOnly'=>true),
			array('cf_620, cf_623, cf_632, cf_659, cf_660', 'length', 'max'=>255),
			array('cf_628, cf_629, cf_793, cf_813', 'length', 'max'=>50),
			array('cf_788, cf_789, cf_794, cf_795, cf_796', 'length', 'max'=>100),
			array('cf_790, cf_791', 'length', 'max'=>30),
			array('cf_812', 'length', 'max'=>3),
			array('cf_653, cf_654, cf_792', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('leadid, cf_620, cf_628, cf_629, cf_623, cf_632, cf_653, cf_654, cf_659, cf_660, cf_788, cf_789, cf_790, cf_791, cf_792, cf_793, cf_794, cf_795, cf_796, cf_812, cf_813', 'safe', 'on'=>'search'),
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
			'cf_620' => 'Cf 620',
			'cf_628' => 'Cf 628',
			'cf_629' => 'Cf 629',
			'cf_623' => 'Cf 623',
			'cf_632' => 'Cf 632',
			'cf_653' => 'Cf 653',
			'cf_654' => 'Cf 654',
			'cf_659' => 'Cf 659',
			'cf_660' => 'Cf 660',
			'cf_788' => 'Cf 788',
			'cf_789' => 'Cf 789',
			'cf_790' => 'Cf 790',
			'cf_791' => 'Cf 791',
			'cf_792' => 'Cf 792',
			'cf_793' => 'Cf 793',
			'cf_794' => 'Cf 794',
			'cf_795' => 'Cf 795',
			'cf_796' => 'Cf 796',
			'cf_812' => 'Cf 812',
			'cf_813' => 'Cf 813',
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
		$criteria->compare('cf_620',$this->cf_620,true);
		$criteria->compare('cf_628',$this->cf_628,true);
		$criteria->compare('cf_629',$this->cf_629,true);
		$criteria->compare('cf_623',$this->cf_623,true);
		$criteria->compare('cf_632',$this->cf_632,true);
		$criteria->compare('cf_653',$this->cf_653,true);
		$criteria->compare('cf_654',$this->cf_654,true);
		$criteria->compare('cf_659',$this->cf_659,true);
		$criteria->compare('cf_660',$this->cf_660,true);
		$criteria->compare('cf_788',$this->cf_788,true);
		$criteria->compare('cf_789',$this->cf_789,true);
		$criteria->compare('cf_790',$this->cf_790,true);
		$criteria->compare('cf_791',$this->cf_791,true);
		$criteria->compare('cf_792',$this->cf_792,true);
		$criteria->compare('cf_793',$this->cf_793,true);
		$criteria->compare('cf_794',$this->cf_794,true);
		$criteria->compare('cf_795',$this->cf_795,true);
		$criteria->compare('cf_796',$this->cf_796,true);
		$criteria->compare('cf_812',$this->cf_812,true);
		$criteria->compare('cf_813',$this->cf_813,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerLeadscf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

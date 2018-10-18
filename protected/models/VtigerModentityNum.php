<?php

/**
 * This is the model class for table "vtiger_modentity_num".
 *
 * The followings are the available columns in table 'vtiger_modentity_num':
 * @property integer $num_id
 * @property string $semodule
 * @property string $prefix
 * @property string $start_id
 * @property string $cur_id
 * @property string $active
 */
class VtigerModentityNum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_modentity_num';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_id, semodule, start_id, cur_id, active', 'required'),
			array('num_id', 'numerical', 'integerOnly'=>true),
			array('semodule, prefix, start_id, cur_id', 'length', 'max'=>50),
			array('active', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('num_id, semodule, prefix, start_id, cur_id, active', 'safe', 'on'=>'search'),
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
			'num_id' => 'Num',
			'semodule' => 'Semodule',
			'prefix' => 'Prefix',
			'start_id' => 'Start',
			'cur_id' => 'Cur',
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

		$criteria->compare('num_id',$this->num_id);
		$criteria->compare('semodule',$this->semodule,true);
		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('start_id',$this->start_id,true);
		$criteria->compare('cur_id',$this->cur_id,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerModentityNum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "vtiger_picklist_dependency".
 *
 * The followings are the available columns in table 'vtiger_picklist_dependency':
 * @property integer $id
 * @property integer $tabid
 * @property string $sourcefield
 * @property string $targetfield
 * @property string $sourcevalue
 * @property string $targetvalues
 * @property string $criteria
 */
class VtigerPicklistDependency extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_picklist_dependency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, tabid', 'required'),
			array('id, tabid', 'numerical', 'integerOnly'=>true),
			array('sourcefield, targetfield', 'length', 'max'=>255),
			array('sourcevalue', 'length', 'max'=>100),
			array('targetvalues, criteria', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tabid, sourcefield, targetfield, sourcevalue, targetvalues, criteria', 'safe', 'on'=>'search'),
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
			'tabid' => 'Tabid',
			'sourcefield' => 'Sourcefield',
			'targetfield' => 'Targetfield',
			'sourcevalue' => 'Sourcevalue',
			'targetvalues' => 'Targetvalues',
			'criteria' => 'Criteria',
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
		$criteria->compare('tabid',$this->tabid);
		$criteria->compare('sourcefield',$this->sourcefield,true);
		$criteria->compare('targetfield',$this->targetfield,true);
		$criteria->compare('sourcevalue',$this->sourcevalue,true);
		$criteria->compare('targetvalues',$this->targetvalues,true);
		$criteria->compare('criteria',$this->criteria,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerPicklistDependency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

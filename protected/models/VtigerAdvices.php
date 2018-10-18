<?php

/**
 * This is the model class for table "vtiger_advices".
 *
 * The followings are the available columns in table 'vtiger_advices':
 * @property integer $advicesid
 * @property string $title
 * @property string $contents
 * @property string $advices_type
 * @property integer $related_id
 * @property string $_MASK_TO_V2
 */
class VtigerAdvices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_advices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advicesid, related_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('advices_type', 'length', 'max'=>100),
			array('contents, _MASK_TO_V2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('advicesid, title, contents, advices_type, related_id, _MASK_TO_V2', 'safe', 'on'=>'search'),
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
			'advicesid' => 'Advicesid',
			'title' => 'Title',
			'contents' => 'Contents',
			'advices_type' => 'Advices Type',
			'related_id' => 'Related',
			'_MASK_TO_V2' => 'Mask To V2',
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

		$criteria->compare('advicesid',$this->advicesid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('advices_type',$this->advices_type,true);
		$criteria->compare('related_id',$this->related_id);
		$criteria->compare('_MASK_TO_V2',$this->_MASK_TO_V2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerAdvices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

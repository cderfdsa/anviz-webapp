<?php

/**
 * This is the model class for table "vtiger_faq".
 *
 * The followings are the available columns in table 'vtiger_faq':
 * @property integer $id
 * @property string $faq_no
 * @property string $product_id
 * @property string $question
 * @property string $answer
 * @property string $category
 * @property string $status
 * @property string $pushed
 */
class VtigerFaq extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_faq';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faq_no, category, status', 'required'),
			array('faq_no, product_id', 'length', 'max'=>100),
			array('category, status', 'length', 'max'=>200),
			array('pushed', 'length', 'max'=>3),
			array('question, answer', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, faq_no, product_id, question, answer, category, status, pushed', 'safe', 'on'=>'search'),
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
			'faq_no' => 'Faq No',
			'product_id' => 'Product',
			'question' => 'Question',
			'answer' => 'Answer',
			'category' => 'Category',
			'status' => 'Status',
			'pushed' => 'Pushed',
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
		$criteria->compare('faq_no',$this->faq_no,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('pushed',$this->pushed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerFaq the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

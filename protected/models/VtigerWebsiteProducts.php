<?php

/**
 * This is the model class for table "vtiger_website_products".
 *
 * The followings are the available columns in table 'vtiger_website_products':
 * @property integer $website_productsid
 * @property string $product_model
 * @property string $product_name
 * @property string $website_product_status
 * @property string $product_specification
 * @property string $product_modules
 * @property string $publictime
 * @property string $imagename
 * @property string $product_parameter
 * @property string $product_application
 * @property string $product_feature
 */
class VtigerWebsiteProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_website_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('website_productsid', 'required'),
			array('website_productsid', 'numerical', 'integerOnly'=>true),
			array('product_model, product_name, website_product_status, product_specification, imagename', 'length', 'max'=>200),
			array('product_modules, publictime, product_parameter, product_application, product_feature', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('website_productsid, product_model, product_name, website_product_status, product_specification, product_modules, publictime, imagename, product_parameter, product_application, product_feature', 'safe', 'on'=>'search'),
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
			'website_productsid' => 'Website Productsid',
			'product_model' => 'Product Model',
			'product_name' => 'Product Name',
			'website_product_status' => 'Website Product Status',
			'product_specification' => 'Product Specification',
			'product_modules' => 'Product Modules',
			'publictime' => 'Publictime',
			'imagename' => 'Imagename',
			'product_parameter' => 'Product Parameter',
			'product_application' => 'Product Application',
			'product_feature' => 'Product Feature',
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

		$criteria->compare('website_productsid',$this->website_productsid);
		$criteria->compare('product_model',$this->product_model,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('website_product_status',$this->website_product_status,true);
		$criteria->compare('product_specification',$this->product_specification,true);
		$criteria->compare('product_modules',$this->product_modules,true);
		$criteria->compare('publictime',$this->publictime,true);
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('product_parameter',$this->product_parameter,true);
		$criteria->compare('product_application',$this->product_application,true);
		$criteria->compare('product_feature',$this->product_feature,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerWebsiteProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

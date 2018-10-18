<?php

/**
 * This is the model class for table "vtiger_website_casestudy".
 *
 * The followings are the available columns in table 'vtiger_website_casestudy':
 * @property integer $website_casestudyid
 * @property string $title
 * @property string $publictime
 * @property string $country
 * @property string $website_casestudy_status
 * @property string $imagename
 * @property string $content
 * @property integer $relate_id
 */
class VtigerWebsiteCasestudy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_website_casestudy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('website_casestudyid', 'required'),
			array('website_casestudyid, relate_id', 'numerical', 'integerOnly'=>true),
			array('title, country, website_casestudy_status, imagename', 'length', 'max'=>200),
			array('publictime, content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('website_casestudyid, title, publictime, country, website_casestudy_status, imagename, content, relate_id', 'safe', 'on'=>'search'),
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
			'website_casestudyid' => 'Website Casestudyid',
			'title' => 'Title',
			'publictime' => 'Publictime',
			'country' => 'Country',
			'website_casestudy_status' => 'Website Casestudy Status',
			'imagename' => 'Imagename',
			'content' => 'Content',
			'relate_id' => 'Relate',
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

		$criteria->compare('website_casestudyid',$this->website_casestudyid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('publictime',$this->publictime,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('website_casestudy_status',$this->website_casestudy_status,true);
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('relate_id',$this->relate_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerWebsiteCasestudy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

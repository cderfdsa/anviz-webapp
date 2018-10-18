<?php

/**
 * This is the model class for table "vtiger_news".
 *
 * The followings are the available columns in table 'vtiger_news':
 * @property integer $newsid
 * @property string $newstitle
 * @property string $contents
 * @property string $publictime
 * @property string $news_type
 * @property integer $push
 * @property integer $readed
 * @property string $imagename
 * @property string $news_desc
 * @property string $news_status
 * @property integer $push_menu
 * @property integer $relate_id
 * @property string $exh_start_date
 */
class VtigerNews extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('newsid, exh_start_date', 'required'),
			array('newsid, push, readed, push_menu, relate_id', 'numerical', 'integerOnly'=>true),
			array('newstitle, imagename, news_status', 'length', 'max'=>200),
			array('news_type', 'length', 'max'=>100),
			array('contents, publictime, news_desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('newsid, newstitle, contents, publictime, news_type, push, readed, imagename, news_desc, news_status, push_menu, relate_id, exh_start_date', 'safe', 'on'=>'search'),
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
			'newsid' => 'Newsid',
			'newstitle' => 'Newstitle',
			'contents' => 'Contents',
			'publictime' => 'Publictime',
			'news_type' => 'News Type',
			'push' => 'Push',
			'readed' => 'Readed',
			'imagename' => 'Imagename',
			'news_desc' => 'News Desc',
			'news_status' => 'News Status',
			'push_menu' => 'Push Menu',
			'relate_id' => 'Relate',
			'exh_start_date' => 'Exh Start Date',
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

		$criteria->compare('newsid',$this->newsid);
		$criteria->compare('newstitle',$this->newstitle,true);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('publictime',$this->publictime,true);
		$criteria->compare('news_type',$this->news_type,true);
		$criteria->compare('push',$this->push);
		$criteria->compare('readed',$this->readed);
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('news_desc',$this->news_desc,true);
		$criteria->compare('news_status',$this->news_status,true);
		$criteria->compare('push_menu',$this->push_menu);
		$criteria->compare('relate_id',$this->relate_id);
		$criteria->compare('exh_start_date',$this->exh_start_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "vtiger_notes".
 *
 * The followings are the available columns in table 'vtiger_notes':
 * @property integer $notesid
 * @property string $note_no
 * @property string $title
 * @property string $filename
 * @property string $notecontent
 * @property integer $folderid
 * @property string $filetype
 * @property string $filelocationtype
 * @property integer $filedownloadcount
 * @property integer $filestatus
 * @property integer $filesize
 * @property string $fileversion
 * @property string $push
 * @property string $updatetime
 * @property string $certificate_type
 */
class VtigerNotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note_no, title', 'required'),
			array('notesid, folderid, filedownloadcount, filestatus, filesize', 'numerical', 'integerOnly'=>true),
			array('note_no, certificate_type', 'length', 'max'=>100),
			array('title, filename', 'length', 'max'=>200),
			array('filetype, fileversion', 'length', 'max'=>50),
			array('filelocationtype', 'length', 'max'=>5),
			array('push', 'length', 'max'=>3),
			array('notecontent, updatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('notesid, note_no, title, filename, notecontent, folderid, filetype, filelocationtype, filedownloadcount, filestatus, filesize, fileversion, push, updatetime, certificate_type', 'safe', 'on'=>'search'),
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
			'notesid' => 'Notesid',
			'note_no' => 'Note No',
			'title' => 'Title',
			'filename' => 'Filename',
			'notecontent' => 'Notecontent',
			'folderid' => 'Folderid',
			'filetype' => 'Filetype',
			'filelocationtype' => 'Filelocationtype',
			'filedownloadcount' => 'Filedownloadcount',
			'filestatus' => 'Filestatus',
			'filesize' => 'Filesize',
			'fileversion' => 'Fileversion',
			'push' => 'Push',
			'updatetime' => 'Updatetime',
			'certificate_type' => 'Certificate Type',
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

		$criteria->compare('notesid',$this->notesid);
		$criteria->compare('note_no',$this->note_no,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('notecontent',$this->notecontent,true);
		$criteria->compare('folderid',$this->folderid);
		$criteria->compare('filetype',$this->filetype,true);
		$criteria->compare('filelocationtype',$this->filelocationtype,true);
		$criteria->compare('filedownloadcount',$this->filedownloadcount);
		$criteria->compare('filestatus',$this->filestatus);
		$criteria->compare('filesize',$this->filesize);
		$criteria->compare('fileversion',$this->fileversion,true);
		$criteria->compare('push',$this->push,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('certificate_type',$this->certificate_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerNotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

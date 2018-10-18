<?php

/**
 * This is the model class for table "vtiger_troubletickets".
 *
 * The followings are the available columns in table 'vtiger_troubletickets':
 * @property integer $ticketid
 * @property string $ticket_no
 * @property string $groupname
 * @property string $parent_id
 * @property string $product_id
 * @property string $priority
 * @property string $severity
 * @property string $status
 * @property string $category
 * @property string $title
 * @property string $solution
 * @property string $update_log
 * @property integer $version_id
 * @property string $hours
 * @property string $days
 */
class VtigerTroubletickets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_troubletickets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ticketid, ticket_no, title', 'required'),
			array('ticketid, version_id', 'numerical', 'integerOnly'=>true),
			array('ticket_no, groupname, parent_id, product_id', 'length', 'max'=>100),
			array('priority, severity, status, category, hours, days', 'length', 'max'=>200),
			array('title', 'length', 'max'=>255),
			array('solution, update_log', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ticketid, ticket_no, groupname, parent_id, product_id, priority, severity, status, category, title, solution, update_log, version_id, hours, days', 'safe', 'on'=>'search'),
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
			'ticketid' => 'Ticketid',
			'ticket_no' => 'Ticket No',
			'groupname' => 'Groupname',
			'parent_id' => 'Parent',
			'product_id' => 'Product',
			'priority' => 'Priority',
			'severity' => 'Severity',
			'status' => 'Status',
			'category' => 'Category',
			'title' => 'Title',
			'solution' => 'Solution',
			'update_log' => 'Update Log',
			'version_id' => 'Version',
			'hours' => 'Hours',
			'days' => 'Days',
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

		$criteria->compare('ticketid',$this->ticketid);
		$criteria->compare('ticket_no',$this->ticket_no,true);
		$criteria->compare('groupname',$this->groupname,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('priority',$this->priority,true);
		$criteria->compare('severity',$this->severity,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('solution',$this->solution,true);
		$criteria->compare('update_log',$this->update_log,true);
		$criteria->compare('version_id',$this->version_id);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('days',$this->days,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerTroubletickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

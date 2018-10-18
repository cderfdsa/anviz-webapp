<?php

/**
 * This is the model class for table "vtiger_users".
 *
 * The followings are the available columns in table 'vtiger_users':
 * @property integer $id
 * @property string $user_name
 * @property string $user_password
 * @property string $user_hash
 * @property string $cal_color
 * @property string $first_name
 * @property string $last_name
 * @property string $emp_no
 * @property string $reports_to_id
 * @property string $is_admin
 * @property string $is_sales
 * @property integer $currency_id
 * @property string $description
 * @property string $date_entered
 * @property string $date_modified
 * @property string $modified_user_id
 * @property string $title
 * @property string $department
 * @property string $phone_home
 * @property string $phone_mobile
 * @property string $phone_work
 * @property string $phone_other
 * @property string $phone_fax
 * @property string $email1
 * @property string $email2
 * @property string $secondaryemail
 * @property string $status
 * @property string $signature
 * @property string $address_street
 * @property string $address_city
 * @property string $address_state
 * @property string $address_country
 * @property string $address_postalcode
 * @property string $user_preferences
 * @property string $tz
 * @property string $holidays
 * @property string $namedays
 * @property string $workdays
 * @property integer $weekstart
 * @property string $date_format
 * @property string $hour_format
 * @property string $start_hour
 * @property string $end_hour
 * @property string $activity_view
 * @property string $lead_view
 * @property string $imagename
 * @property integer $deleted
 * @property string $confirm_password
 * @property string $internal_mailer
 * @property string $reminder_interval
 * @property string $reminder_next_time
 * @property string $crypt_type
 * @property string $accesskey
 * @property string $theme
 * @property string $language
 * @property string $time_zone
 * @property string $currency_grouping_pattern
 * @property string $currency_decimal_separator
 * @property string $currency_grouping_separator
 * @property string $currency_symbol_placement
 * @property string $chinese_name
 */
class VtigerUsers extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vtiger_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_entered', 'required'),
			array('currency_id, weekstart, deleted', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>255),
			array('user_password, date_format, activity_view, lead_view, time_zone', 'length', 'max'=>200),
			array('user_hash', 'length', 'max'=>32),
			array('cal_color, status, address_country', 'length', 'max'=>25),
			array('first_name, last_name, tz, workdays, hour_format, start_hour, end_hour', 'length', 'max'=>30),
			array('emp_no', 'length', 'max'=>15),
			array('reports_to_id, modified_user_id, accesskey, language', 'length', 'max'=>36),
			array('is_admin, is_sales, internal_mailer', 'length', 'max'=>3),
			array('title, department, phone_home, phone_mobile, phone_work, phone_other, phone_fax', 'length', 'max'=>50),
			array('email1, email2, secondaryemail, address_city, address_state, reminder_interval, reminder_next_time, theme, currency_grouping_pattern, chinese_name', 'length', 'max'=>100),
			array('signature', 'length', 'max'=>1000),
			array('address_street', 'length', 'max'=>150),
			array('address_postalcode', 'length', 'max'=>9),
			array('holidays, namedays', 'length', 'max'=>60),
			array('imagename', 'length', 'max'=>250),
			array('confirm_password', 'length', 'max'=>300),
			array('crypt_type, currency_symbol_placement', 'length', 'max'=>20),
			array('currency_decimal_separator, currency_grouping_separator', 'length', 'max'=>2),
			array('description, date_modified, user_preferences', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, user_password, user_hash, cal_color, first_name, last_name, emp_no, reports_to_id, is_admin, is_sales, currency_id, description, date_entered, date_modified, modified_user_id, title, department, phone_home, phone_mobile, phone_work, phone_other, phone_fax, email1, email2, secondaryemail, status, signature, address_street, address_city, address_state, address_country, address_postalcode, user_preferences, tz, holidays, namedays, workdays, weekstart, date_format, hour_format, start_hour, end_hour, activity_view, lead_view, imagename, deleted, confirm_password, internal_mailer, reminder_interval, reminder_next_time, crypt_type, accesskey, theme, language, time_zone, currency_grouping_pattern, currency_decimal_separator, currency_grouping_separator, currency_symbol_placement, chinese_name', 'safe', 'on'=>'search'),
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
			'user_name' => 'User Name',
			'user_password' => 'User Password',
			'user_hash' => 'User Hash',
			'cal_color' => 'Cal Color',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'emp_no' => 'Emp No',
			'reports_to_id' => 'Reports To',
			'is_admin' => 'Is Admin',
			'is_sales' => 'Is Sales',
			'currency_id' => 'Currency',
			'description' => 'Description',
			'date_entered' => 'Date Entered',
			'date_modified' => 'Date Modified',
			'modified_user_id' => 'Modified User',
			'title' => 'Title',
			'department' => 'Department',
			'phone_home' => 'Phone Home',
			'phone_mobile' => 'Phone Mobile',
			'phone_work' => 'Phone Work',
			'phone_other' => 'Phone Other',
			'phone_fax' => 'Phone Fax',
			'email1' => 'Email1',
			'email2' => 'Email2',
			'secondaryemail' => 'Secondaryemail',
			'status' => 'Status',
			'signature' => 'Signature',
			'address_street' => 'Address Street',
			'address_city' => 'Address City',
			'address_state' => 'Address State',
			'address_country' => 'Address Country',
			'address_postalcode' => 'Address Postalcode',
			'user_preferences' => 'User Preferences',
			'tz' => 'Tz',
			'holidays' => 'Holidays',
			'namedays' => 'Namedays',
			'workdays' => 'Workdays',
			'weekstart' => 'Weekstart',
			'date_format' => 'Date Format',
			'hour_format' => 'Hour Format',
			'start_hour' => 'Start Hour',
			'end_hour' => 'End Hour',
			'activity_view' => 'Activity View',
			'lead_view' => 'Lead View',
			'imagename' => 'Imagename',
			'deleted' => 'Deleted',
			'confirm_password' => 'Confirm Password',
			'internal_mailer' => 'Internal Mailer',
			'reminder_interval' => 'Reminder Interval',
			'reminder_next_time' => 'Reminder Next Time',
			'crypt_type' => 'Crypt Type',
			'accesskey' => 'Accesskey',
			'theme' => 'Theme',
			'language' => 'Language',
			'time_zone' => 'Time Zone',
			'currency_grouping_pattern' => 'Currency Grouping Pattern',
			'currency_decimal_separator' => 'Currency Decimal Separator',
			'currency_grouping_separator' => 'Currency Grouping Separator',
			'currency_symbol_placement' => 'Currency Symbol Placement',
			'chinese_name' => 'Chinese Name',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_hash',$this->user_hash,true);
		$criteria->compare('cal_color',$this->cal_color,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('emp_no',$this->emp_no,true);
		$criteria->compare('reports_to_id',$this->reports_to_id,true);
		$criteria->compare('is_admin',$this->is_admin,true);
		$criteria->compare('is_sales',$this->is_sales,true);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('modified_user_id',$this->modified_user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('phone_mobile',$this->phone_mobile,true);
		$criteria->compare('phone_work',$this->phone_work,true);
		$criteria->compare('phone_other',$this->phone_other,true);
		$criteria->compare('phone_fax',$this->phone_fax,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('secondaryemail',$this->secondaryemail,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('address_street',$this->address_street,true);
		$criteria->compare('address_city',$this->address_city,true);
		$criteria->compare('address_state',$this->address_state,true);
		$criteria->compare('address_country',$this->address_country,true);
		$criteria->compare('address_postalcode',$this->address_postalcode,true);
		$criteria->compare('user_preferences',$this->user_preferences,true);
		$criteria->compare('tz',$this->tz,true);
		$criteria->compare('holidays',$this->holidays,true);
		$criteria->compare('namedays',$this->namedays,true);
		$criteria->compare('workdays',$this->workdays,true);
		$criteria->compare('weekstart',$this->weekstart);
		$criteria->compare('date_format',$this->date_format,true);
		$criteria->compare('hour_format',$this->hour_format,true);
		$criteria->compare('start_hour',$this->start_hour,true);
		$criteria->compare('end_hour',$this->end_hour,true);
		$criteria->compare('activity_view',$this->activity_view,true);
		$criteria->compare('lead_view',$this->lead_view,true);
		$criteria->compare('imagename',$this->imagename,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('confirm_password',$this->confirm_password,true);
		$criteria->compare('internal_mailer',$this->internal_mailer,true);
		$criteria->compare('reminder_interval',$this->reminder_interval,true);
		$criteria->compare('reminder_next_time',$this->reminder_next_time,true);
		$criteria->compare('crypt_type',$this->crypt_type,true);
		$criteria->compare('accesskey',$this->accesskey,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('time_zone',$this->time_zone,true);
		$criteria->compare('currency_grouping_pattern',$this->currency_grouping_pattern,true);
		$criteria->compare('currency_decimal_separator',$this->currency_decimal_separator,true);
		$criteria->compare('currency_grouping_separator',$this->currency_grouping_separator,true);
		$criteria->compare('currency_symbol_placement',$this->currency_symbol_placement,true);
		$criteria->compare('chinese_name',$this->chinese_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VtigerUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

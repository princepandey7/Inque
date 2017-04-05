<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_description
 * @property string $event_evenue
 * @property string $event_start_date
 * @property string $event_end_date
 * @property string $event_images
 * @property integer $event_status
 * @property string $created_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Events extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_title, event_start_date', 'required'),
			array('event_status, delete_flag', 'numerical', 'integerOnly'=>true),

			array('event_images', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'width' => 600, 'height' => 260, 'on' => 'insert,update', 'allowEmpty' => 'true'),
			array('event_images1', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'width' => 600, 'height' => 260, 'on' => 'insert,update', 'allowEmpty' => 'true'),
			array('event_images2', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'width' => 600, 'height' => 260, 'on' => 'insert,update', 'allowEmpty' => 'true'),
			array('event_description, event_evenue, event_start_date, event_images, event_images1, event_images2 , event_end_date, modified_date', 'safe'),
			array('event_id, event_title, event_description, event_evenue, event_start_date, event_end_date, event_images , event_images1, event_images2  , event_status, created_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'event_id' => 'Event',
			'event_title' => 'Event Title',
			'event_description' => 'Event Description',
			'event_evenue' => 'Event Evenue',
			'event_start_date' => 'Event Start Date',
			'event_end_date' => 'Event End Date',

			'event_images' => 'Event Image 1',
			'event_images1' => 'Event Image 2',
			'event_images2' => 'Event Image 3',

			'event_status' => 'Event Status',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
			'delete_flag' => 'Delete Flag',
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

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('event_title',$this->event_title,true);
		$criteria->compare('event_description',$this->event_description,true);
		$criteria->compare('event_evenue',$this->event_evenue,true);
		$criteria->compare('event_start_date',$this->event_start_date,true);
		$criteria->compare('event_end_date',$this->event_end_date,true);
		$criteria->compare('event_images',$this->event_images,true);
		$criteria->compare('event_status',$this->event_status);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('delete_flag',$this->delete_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

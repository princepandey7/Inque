<?php

/**
 * This is the model class for table "gallery".
 *
 * The followings are the available columns in table 'gallery':
 * @property integer $gallery_id
 * @property string $gallery_title
 * @property string $gallery_description
 * @property string $gallery_main_image
 * @property string $gallery_thumnail_image
 * @property integer $gallery_status
 * @property string $created_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Gallery extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_title', 'required'),

			array('gallery_status, delete_flag', 'numerical', 'integerOnly'=>true),

			array('gallery_title', 'length', 'max'=>255),
			
			array('gallery_main_image', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'on' => 'insert'),
			array('gallery_thumnail_image', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'on' => 'insert'),
			
			//'width' => 1024, 'height' => 1024, 'dimensionError' => 'Image dimension error', 
			//  'width' => 300, 'height' => 300, 'dimensionError' => 'Image dimension error',
			// array('gallery_main_image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'insert,update'),
			// array('gallery_thumnail_image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'insert,update'),


			array('gallery_description, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gallery_id, gallery_title, gallery_description, gallery_main_image, gallery_thumnail_image, gallery_status, created_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'gallery_id' => 'Gallery',
			'gallery_title' => 'Gallery Title',
			'gallery_description' => 'Gallery Description',
			'gallery_main_image' => 'Main Image', // (1920 * 1080)
			'gallery_thumnail_image' => 'Thumnail Image ', // (300 * 300) 
			'gallery_status' => 'Gallery Status',
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

		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('gallery_title',$this->gallery_title,true);
		$criteria->compare('gallery_description',$this->gallery_description,true);
		$criteria->compare('gallery_main_image',$this->gallery_main_image,true);
		$criteria->compare('gallery_thumnail_image',$this->gallery_thumnail_image,true);
		$criteria->compare('gallery_status',$this->gallery_status);
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
	 * @return Gallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

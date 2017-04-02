<?php

/**
 * This is the model class for table "subcategories".
 *
 * The followings are the available columns in table 'subcategories':
 * @property integer $sub_categories_id
 * @property integer $categories_id
 * @property string $sub_categories_name
 * @property string $sub_categories_slug
 * @property string $sub_categories_description
 * @property integer $sub_categories_status
 * @property string $created_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Subcategories extends CActiveRecord
{

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subcategories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categories_id, sub_categories_name, sub_categories_slug', 'required'),
			array('categories_id, sub_categories_status, delete_flag', 'numerical', 'integerOnly'=>true),
			array('sub_categories_name, sub_categories_slug', 'length', 'max'=>50),
			array('sub_categories_description, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('upload_pdf', 'file', 'allowEmpty'=>true,'types'=>'pdf', 'message'=>'pdf files only', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'File has to be smaller than 10MB', 'allowEmpty'=>true, 'on'=>'insert,update'),

			array('sub_categories_id, categories_id, sub_categories_name, sub_categories_slug, upload_pdf, sub_categories_description, sub_categories_status, created_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'sub_categories_id' => 'Sub Categories',
			'categories_id' => 'Categories',
			'sub_categories_name' => 'Sub Categories Name',
			'sub_categories_slug' => 'Sub Categories Slug',
			'sub_categories_description' => 'Sub Categories Description',
			'sub_categories_status' => 'Sub Categories Status',
			'upload_pdf' => 'Upload Pdf',
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

		$criteria->compare('sub_categories_id',$this->sub_categories_id);
		$criteria->compare('categories_id',$this->categories_id);
		$criteria->compare('sub_categories_name',$this->sub_categories_name,true);
		$criteria->compare('sub_categories_slug',$this->sub_categories_slug,true);
		$criteria->compare('sub_categories_description',$this->sub_categories_description,true);
		$criteria->compare('sub_categories_status',$this->sub_categories_status);
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
	 * @return Subcategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public static function getSubCategoryName($sub_cat_id){
		$data = self::model()->findByPk($sub_cat_id);
		if( !empty( $data ) ){
			return $data->sub_categories_name;
		}
	}

	public static function getActiveSubCategory($categories_id){
		return Yii::app()->db->createCommand('SELECT sub_categories_id,sub_categories_name FROM subcategories WHERE categories_id = '. $categories_id .' AND sub_categories_status='. self::STATUS_ACTIVE )->queryAll();
	}

	// public static function getActiveCategory(){
	// 	$criteria=new CDbCriteria();
	// 	$criteria->compare('categories_status',self::STATUS_ACTIVE);
	// 	return Categories::model()->findAll($criteria);
	// }

	// public static function itemAlias($type, $code = NULL) {
 //        $_items = array(
 //            'status' => array(
 //                self::STATUS_ACTIVE => 'Male',
 //                self::STATUS_INACTIVE => 'Female',
 //            ),
 //        );
 //        if (isset($code))
 //            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
 //        else
 //            return isset($_items[$type]) ? $_items[$type] : false;
 //    }

}

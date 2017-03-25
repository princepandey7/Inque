<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $categories_id
 * @property string $categories_name
 * @property string $categories_slug
 * @property string $categories_description
 * @property integer $categories_status
 * @property string $created_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Categories extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categories_name, categories_slug', 'required'),
			array('categories_status, delete_flag', 'numerical', 'integerOnly'=>true),
			array('categories_name, categories_slug', 'length', 'max'=>50),
			array('categories_description, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('categories_id, categories_name, categories_slug, categories_description, categories_status, created_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'categories_id' => 'Categories',
			'categories_name' => 'Categories Name',
			'categories_slug' => 'Categories Slug',
			'categories_description' => 'Categories Description',
			'categories_status' => 'Categories Status',
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

		$criteria->compare('categories_id',$this->categories_id);
		$criteria->compare('categories_name',$this->categories_name,true);
		$criteria->compare('categories_slug',$this->categories_slug,true);
		$criteria->compare('categories_description',$this->categories_description,true);
		$criteria->compare('categories_status',$this->categories_status);
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
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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

	public static function getActiveCategory(){
		$criteria=new CDbCriteria();
		$criteria->compare('categories_status',self::STATUS_ACTIVE);
		return Categories::model()->findAll($criteria);
	}

	public static function getCategoryName($categories_id){
		$data = self::model()->findByPk($categories_id);
		if( !empty( $data ) ){
			return $data->categories_name;
		}
	}
}

<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $title
 * @property string $size
 * @property string $finish
 * @property string $height
 * @property string $material
 * @property string $features
 * @property string $product_main_image
 * @property string $kit_package_image
 * @property integer $product_status
 * @property string $created_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Products extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, size, categories_id, subcategories_id', 'required'),
			array('product_status, delete_flag', 'numerical', 'integerOnly'=>true),
			array('title, finish, height, material', 'length', 'max'=>100),
			array('size', 'length', 'max'=>100),
			array('features, modified_date', 'safe'),
			//  'width' => 515, 'height' => 450, 'dimensionError' => 'Image dimension error',
			array('product_main_image', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'on' => 'insert,update', 'allowEmpty' => 'true'),

			array('product_thum_image', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'width' => 390, 'height' => 280, 'dimensionError' => 'Image dimension error', 'on' => 'insert,update', 'allowEmpty' => 'true'),
			
			array('kit_package_image', 'ext.EImageValidator', 'types' => "gif, jpg, png", 'typesError' => 'Types error message', 'width' => 873, 'height' => 246, 'dimensionError' => 'Image dimension error', 'on' => 'insert,update', 'allowEmpty' => 'true'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categories_id, subcategories_id, title, size, finish, height, material, features, product_main_image, product_thum_image, kit_package_image, product_status, created_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'size' => 'Size',
			'finish' => 'Finish',
			'height' => 'Height',
			'material' => 'Material',
			'features' => 'Features',
			'product_main_image' => 'Product Main Image',
			'kit_package_image' => 'Kit Package Image',
			'product_status' => 'Product Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('finish',$this->finish,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('material',$this->material,true);
		$criteria->compare('features',$this->features,true);
		$criteria->compare('product_main_image',$this->product_main_image,true);
		$criteria->compare('kit_package_image',$this->kit_package_image,true);
		$criteria->compare('product_status',$this->product_status);
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
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

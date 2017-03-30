<?php

/**
 * This is the model class for table "requestedpdf".
 *
 * The followings are the available columns in table 'requestedpdf':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $company
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $requested_by
 * @property integer $is_visible
 * @property string $creted_date
 * @property string $modified_date
 * @property integer $delete_flag
 */
class Requestedpdf extends CActiveRecord
{
	const CATALOGUE = "get_catalogue_pdf";
	const CATEGORY = "get_category_pdf";
	const PRODUCT = "get_product_pdf";

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requestedpdf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('creted_date', 'required'),
			array('is_visible, delete_flag', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('email', 'length', 'max'=>200),
			array('mobile', 'length', 'max'=>50),
			array('company, country, state, city, requested_by', 'length', 'max'=>100),
			array('modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, mobile, company, country, state, city, requested_by, is_visible, creted_date, modified_date, delete_flag', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'email' => 'Email',
			'mobile' => 'Mobile',
			'company' => 'Company',
			'country' => 'Country',
			'state' => 'State',
			'city' => 'City',
			'requested_by' => 'Requested By',
			'is_visible' => 'Is Visible',
			'creted_date' => 'Creted Date',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('requested_by',$this->requested_by,true);
		$criteria->compare('is_visible',$this->is_visible);
		$criteria->compare('creted_date',$this->creted_date,true);
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
	 * @return Requestedpdf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

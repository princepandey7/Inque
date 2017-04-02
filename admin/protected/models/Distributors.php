<?php

/**
 * This is the model class for table "distributors".
 *
 * The followings are the available columns in table 'distributors':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $telephone_no
 * @property string $address
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property integer $distributor_status
 * @property string $create_date
 * @property string $modified_date
 */
class Distributors extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'distributors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, telephone_no, address, country, state, city', 'required'),
			array('telephone_no, country, state, city, distributor_status', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>255),
			array('create_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, telephone_no, address, country, state, city, distributor_status, create_date, modified_date', 'safe', 'on'=>'search'),
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
			'telephone_no' => 'Telephone No',
			'address' => 'Address',
			'country' => 'Country',
			'state' => 'State',
			'city' => 'City',
			'distributor_status' => 'Distributor Status',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('telephone_no',$this->telephone_no);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('state',$this->state);
		$criteria->compare('city',$this->city);
		$criteria->compare('distributor_status',$this->distributor_status);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Distributors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

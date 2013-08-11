<?php

/**
 * This is the model class for table "g_performance".
 *
 * The followings are the available columns in table 'g_performance':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $individual_weight
 * @property integer $individual_target
 * @property integer $individual_value
 * @property integer $superior_value
 * @property integer $superior_weight
 * @property integer $remark
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property GPerson $parent
 */
class gPerformance extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'g_performance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aspect_id, parent_id, individual_weight, individual_target, individual_value, superior_value, superior_weight', 'required'),
			array('aspect_id, parent_id, individual_weight, individual_target, individual_value, superior_value, superior_weight, remark, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
            array('remark', 'length', 'max' => 300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, individual_weight, individual_target, individual_value, superior_value, superior_weight, remark, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'gPerson', 'parent_id'),
			'aspect' => array(self::BELONGS_TO, 'gParamPerformance', 'aspect_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'aspect_id' => 'Aspect',
			'parent_id' => 'Parent',
			'individual_weight' => 'Individual Weight',
			'individual_target' => 'Individual Target',
			'individual_value' => 'Individual Value',
			'superior_value' => 'Superior Value',
			'superior_weight' => 'Superior Weight',
			'remark' => 'Remark',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'updated_date' => 'Updated Date',
			'updated_by' => 'Updated By',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('individual_weight',$this->individual_weight);
		$criteria->compare('individual_target',$this->individual_target);
		$criteria->compare('individual_value',$this->individual_value);
		$criteria->compare('superior_value',$this->superior_value);
		$criteria->compare('superior_weight',$this->superior_weight);
		$criteria->compare('remark',$this->remark);
		$criteria->compare('created_date',$this->created_date);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_date',$this->updated_date);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return gPerformance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

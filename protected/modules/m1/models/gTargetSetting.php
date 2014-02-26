<?php

/**
 * This is the model class for table "g_target_setting".
 *
 * The followings are the available columns in table 'g_target_setting':
 * @property integer $id
 * @property string $parent_id
 * @property string $strategic_objective
 * @property string $strategic_desc
 * @property string $weight
 * @property string $kpi_desc
 * @property string $target
 * @property string $remark
 * @property string $strategic_initiative
 */
class gTargetSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'g_target_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit', 'length', 'max'=>25),
			array('strategic_objective', 'length', 'max'=>50),
			array('strategic_desc', 'length', 'max'=>80),
			array('weight', 'length', 'max'=>5),
			array('kpi_desc', 'length', 'max'=>113),
			array('target,realization', 'numerical'),
			array('value_type_id,superior_score', 'numerical','integerOnly'=>true),
			array('remark', 'length', 'max'=>58),
			array('strategic_initiative', 'length', 'max'=>154),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, strategic_objective, strategic_desc, weight, kpi_desc, target, remark, strategic_initiative', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'strategic_objective' => 'Strategic Objective',
			'strategic_desc' => 'Description',
			'weight' => 'Weight',
			'kpi_desc' => 'KPI Desc',
			'target' => 'Target',
			'unit' => 'Unit',
			'remark' => 'Remark',
			'strategic_initiative' => 'Strategic Initiative',
			'realization' => 'Realization',
			'value_type_id' => 'Value Type',
			'superior_score' => 'Superior Score',
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
	public function search($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('parent_id',$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>50,
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return gTargetSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

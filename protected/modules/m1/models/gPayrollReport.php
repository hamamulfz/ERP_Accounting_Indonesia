<?php

/**
 * This is the model class for table "g_payroll_report".
 *
 * The followings are the available columns in table 'g_payroll_report':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $yearmonth
 * @property integer $basic_salary
 * @property integer $benefit
 * @property integer $deduction
 * @property string $remark
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 */
class gPayrollReport extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return gPayrollReport the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_payroll_report';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, yearmonth, basic_salary, benefit, deduction, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly' => true),
            array('remark', 'length', 'max' => 300),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, yearmonth, basic_salary, benefit, deduction, remark, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'yearmonth' => 'Yearmonth',
            'basic_salary' => 'Basic Salary',
            'benefit' => 'Benefit',
            'deduction' => 'Deduction',
            'remark' => 'Remark',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('yearmonth', $this->yearmonth);
        $criteria->compare('basic_salary', $this->basic_salary);
        $criteria->compare('benefit', $this->benefit);
        $criteria->compare('deduction', $this->deduction);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('created_date', $this->created_date);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_date', $this->updated_date);
        $criteria->compare('updated_by', $this->updated_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
<?php

/**
 * This is the model class for table "u_ap_payment".
 *
 * The followings are the available columns in table 'u_ap_payment':
 * @property integer $id
 * @property integer $parent_id
 * @property string $payment_date
 * @property string $payment_ref
 * @property integer $payment_source_id
 * @property integer $payment_type_id
 * @property string $description
 * @property string $amount
 * @property string $effective_date
 * @property integer $created_date
 * @property string $created_by
 * @property integer $updated_date
 * @property string $updated_by
 */
class uApPayment extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'u_ap_payment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, payment_date, amount', 'required'),
            array('parent_id, payment_source_id, payment_type_id, created_date, updated_date', 'numerical', 'integerOnly' => true),
            array('payment_ref', 'length', 'max' => 100),
            array('description', 'length', 'max' => 500),
            array('amount, created_by, updated_by', 'length', 'max' => 15),
            array('effective_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, payment_date, payment_ref, payment_source_id, payment_type_id, description, amount, effective_date, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'payment_source' => array(self::BELONGS_TO, 'tAccount', 'payment_source_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'payment_date' => 'Payment Date',
            'payment_ref' => 'Payment Ref',
            'payment_source_id' => 'Payment Source',
            'payment_type_id' => 'Payment Type',
            'description' => 'Description',
            'amount' => 'Amount',
            'effective_date' => 'Effective Date',
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
    public function search($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return uApPayment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

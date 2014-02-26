<?php

/**
 * This is the model class for table "u_po".
 *
 * The followings are the available columns in table 'u_po':
 * @property integer $id
 * @property integer $entity_id
 * @property integer $supplier_id
 * @property string $input_date
 * @property string $system_ref
 * @property integer $periode_date
 * @property integer $so_type_id
 * @property string $remark
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 * @property integer $approved_date
 * @property integer $approved_by
 */
class uPo extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'u_po';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('input_date', 'required'),
            array('state_id, entity_id, supplier_id, po_type_id, created_date, created_by, updated_date, updated_by, approved_date, approved_by', 'numerical', 'integerOnly' => true),
            array('system_ref', 'length', 'max' => 100),
            array('remark', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, entity_id, supplier_id, input_date, system_ref, po_type_id, remark, created_date, created_by, updated_date, updated_by, approved_date, approved_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'entity' => array(self::BELONGS_TO, 'aOrganization', 'entity_id'),
            'supplier' => array(self::BELONGS_TO, 'uSupplier', 'supplier_id'),
            'ap' => array(self::HAS_ONE, 'uAp', 'id'),
            'poDetail' => array(self::HAS_MANY, 'uPoDetail', 'parent_id'),
            'poSum' => array(self::STAT, 'uPoDetail', 'parent_id', 'select' => 'sum(qty*amount)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'entity_id' => 'Entity',
            'supplier_id' => 'Supplier',
            'input_date' => 'Input Date',
            'system_ref' => 'System Ref',
            'po_type_id' => 'PO Type',
            'state_id' => 'Status',
            'remark' => 'Remark',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'approved_date' => 'Approved Date',
            'approved_by' => 'Approved By',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('entity_id', $this->entity_id);
        $criteria->compare('supplier_id', $this->supplier_id);
        $criteria->compare('input_date', $this->input_date, true);
        $criteria->compare('system_ref', $this->system_ref, true);
        $criteria->compare('po_type_id', $this->po_type_id);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('created_date', $this->created_date);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_date', $this->updated_date);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('approved_date', $this->approved_date);
        $criteria->compare('approved_by', $this->approved_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function newEntry() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('state_id', 1); //New Entry


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function delivered() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('state_id', 2); //Delivered


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function newPo() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->with = array('ap', 'ap.payment');
        $criteria->together = true;
        $criteria->condition = 't.state_id = 2  AND (ap.id is null or payment.id is null)';


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function apSupplierView($id) {

        $criteria = new CDbCriteria;
        $criteria->compare('supplier_id', $id);
        //$criteria->with=array('ap','ap.payment');
        //$criteria->together=true;
        //$criteria->condition='t.state_id = 2  AND (ap.id is null or payment.id is null)';


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 100,
            )
        ));
    }

    public static function getTopCreated() {

        $models = self::model()->findAll(array('limit' => 10, 'order' => 'created_date DESC'));

        $returnarray = array();

        foreach ($models as $model) {
            $returnarray[] = array('id' => $model->system_ref, 'label' => $model->system_ref, 'icon' => 'list-alt', 'url' => array('/m2/uPo/view', 'id' => $model->id));
        }

        return $returnarray;
    }

    public static function getTopUpdated() {

        $models = self::model()->findAll(array('limit' => 10, 'order' => 'updated_date DESC'));

        $returnarray = array();

        foreach ($models as $model) {
            $returnarray[] = array('id' => $model->system_ref, 'label' => $model->system_ref, 'icon' => 'list-alt', 'url' => array('/m2/uPo/view', 'id' => $model->id));
        }

        return $returnarray;
    }

    public static function getTopRelated($name) {

        //$_related = self::model()->find((int)$id)->account_name;
        $_exp = explode(" ", $name);


        $criteria = new CDbCriteria;
        //$criteria->compare('account_name',$_related,true,'OR');

        if (isset($_exp[0]))
            $criteria->compare('system_ref', $_exp[0], true, 'OR');

        if (isset($_exp[1]))
            $criteria->compare('system_ref', $_exp[1], true, 'OR');

        $criteria->limit = 10;
        $criteria->order = 'updated_date DESC';

        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $returnarray[] = array('id' => $model->system_ref, 'label' => $model->system_ref, 'icon' => 'list-alt', 'url' => array('/m2/tAccount/view', 'id' => $model->id));
        }

        return $returnarray;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return uPo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

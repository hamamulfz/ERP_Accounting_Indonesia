<?php

/**
 * This is the model class for table "eb_asset_condition".
 *
 * The followings are the available columns in table 'eb_asset_condition':
 * @property integer $id
 * @property integer $parent_id
 * @property string $input_date
 * @property integer $state_id
 * @property string $description
 * @property string $checked_by
 */
class ebAssetCondition extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return EbAssetCondition the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'eb_asset_condition';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, input_date, state_id', 'required'),
            array('parent_id, state_id', 'numerical', 'integerOnly' => true),
            array('description', 'length', 'max' => 255),
            array('checked_by', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, input_date, state_id, description, checked_by', 'safe', 'on' => 'search'),
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
            'input_date' => 'Input Date',
            'state_id' => 'State',
            'description' => 'Description',
            'checked_by' => 'Checked By',
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
        $criteria->compare('input_date', $this->input_date, true);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('checked_by', $this->checked_by, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
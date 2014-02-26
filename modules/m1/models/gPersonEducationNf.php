<?php

/**
 * This is the model class for table "g_person_education_nf".
 *
 * The followings are the available columns in table 'g_person_education_nf':
 * @property integer $id
 * @property integer $parent_id
 * @property string $education_name
 * @property string $category
 * @property string $start
 * @property string $end
 * @property integer $sertificate
 * @property string $country
 */
class gPersonEducationNf extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GPersonEducationNf the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_person_education_nf';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('education_name, start, end', 'required'),
            array('parent_id, sertificate', 'numerical', 'integerOnly' => true),
            array('country', 'length', 'max' => 50),
            array('education_name', 'length', 'max' => 100),
            array('category', 'length', 'max' => 75),
            array('start, end', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, education_name, category, start, end, sertificate, country', 'safe', 'on' => 'search'),
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
            'education_name' => 'Institution Name',
            'category' => 'Subject',
            'start' => 'Start',
            'end' => 'End',
            'sertificate' => 'Certificate',
            'country' => 'Country',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

}
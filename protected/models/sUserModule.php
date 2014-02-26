<?php

class sUserModule extends BaseModel {

	public $s_user_name;
	
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 's_user_module';
    }

    public function rules() {
        return array(
            array('s_user_id, s_module_id, s_matrix_id', 'required'),
            //array('s_user_id, s_module_id', 'unique'),
            array('s_user_id', 'unique', 'criteria' => array(
                    'condition' => '`s_module_id`=:s_module_id',
                    'params' => array(
                        ':s_module_id' => $this->s_module_id
                    )
                )),
            array('s_user_id, s_module_id, s_matrix_id', 'numerical', 'integerOnly' => true),
            array('s_user_name', 'length', 'max' => 50),
            array('id, s_user_id, s_module_id, s_matrix_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            's_user' => array(self::BELONGS_TO, 'sUser', array('s_user_id' => 'id')),
            's_module' => array(self::BELONGS_TO, 'sModule', 's_module_id'),
            's_matrix' => array(self::BELONGS_TO, 'sMatrix', 's_matrix_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            's_user_id' => 'User ID',
            's_user_name' => 'User Name',
            's_module_id' => 'Module',
            's_matrix_id' => 'Matrix',
        );
    }

    public function search($id) {
        $criteria = new CDbCriteria;

        $criteria->compare('s_user_id', $id, true);
        $criteria->compare('s_module_id', $this->s_module_id, true);
        $criteria->compare('s_matrix_id', $this->s_matrix_id, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public function searchUser($uid) {
        $criteria = new CDbCriteria;
        $criteria->compare('s_user_id', $uid);
        $criteria->with = array('s_module');
        $criteria->order = 's_module.sort';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
    }

    public function searchModule($id) {
        $criteria = new CDbCriteria;
        $criteria->compare('s_module_id', $id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            )
        ));
    }

}
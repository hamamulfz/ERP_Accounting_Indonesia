<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class fBusinessIntellegence extends CFormModel {

    public $field;
    public $group;
    public $fieldfilter;
    public $expression;
    public $value;
    public $limit;
    public $plusResign;
    public $export;

    public function rules() {
        return array(
            // username and password are required
            array('field, group', 'required'),
            array('limit', 'numerical', 'integerOnly' => true),
            array('export', 'boolean'),
            array('field, group', 'length', 'max' => 15),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'field' => 'Field',
            'group' => 'Group',
            'limit' => 'Limit',
            'plusResign' => 'Include Resign Employee',
            'export' => 'Export to Excel',
        );
    }

}

<?php

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => false,
    'headerIcon' => 'icon-globe',
    'htmlHeaderOptions' => array('style' => 'background:white'),
        //'htmlContentOptions'=>array('style'=>'background:#FFA573'),
));
?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => array(
        'id' => 1,
        'employee_id' => $model->employeeShortId,
        'company' => $model->mCompany(),
        'department' => $model->mDepartment(),
        'job_title' => $model->mJobTitle(),
        'level' => $model->mLevel(),
        'status' => ($model->countContract() != "") ? $model->mStatus() . " ( " . $model->countContract() . " )" : $model->mStatus(),
        'join_date' => (isset($model->companyfirst)) ? $model->companyfirst->start_date . " ( " . $model->countJoinDate() . " )" : "",
        'join_dateG' => (isset($model->companyfirstG)) ? $model->companyfirstG->start_date . " ( " . $model->countJoinDateG() . " )" : "",
        'superior' => ($this->id == "gEss") ? $model->mSuperior() : $model->mSuperiorLink(),
    ),
    'attributes' => array(
        array('name' => 'employee_id', 'label' => 'Employee ID'),
        array('name' => 'company', 'label' => 'Company'),
        array('name' => 'department', 'label' => 'Department'),
        array('name' => 'job_title', 'label' => 'Job Title'),
        array('name' => 'level', 'label' => 'Level'),
        array('name' => 'status', 'label' => 'Status'),
        array('name' => 'join_date', 'label' => 'Join Date'),
        array('name' => 'join_dateG', 'label' => 'Join Date APG','visible'=>(isset($model->companyfirstG))),
        array('name' => 'superior', 'type' => 'raw', 'label' => 'Superior'),
    ),
));
?>

<?php

$this->endWidget();
?>



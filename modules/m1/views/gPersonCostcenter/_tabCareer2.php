<?php

EQuickDlgs::iframeButton(
        array(
            'controllerRoute' => 'm1/gPersonCostcenter/createAssignmentAjax',
            'actionParams' => array('id' => $model->id),
            'dialogTitle' => 'Create New Assignment',
            'dialogWidth' => 800,
            'dialogHeight' => 600,
            'openButtonText' => 'New Assignment',
            // 'closeButtonText' => 'Close',
            'closeOnAction' => true, //important to invoke the close action in the actionCreate
            'refreshGridId' => 'g-karir2-grid', //the grid with this id will be refreshed after closing
            'openButtonHtmlOptions' => array('class' => 'pull-right btn btn-primary'),
        )
);
?> 


<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-karir2-grid',
    'dataProvider' => gPersonCareer2::model()->search($model->id),
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        'start_date',
        'end_date',
        array(
            'header' => 'Status',
            'value' => 'isset($data->status->name) ? $data->status->name : ""',
        ),
        array(
            'header' => 'Company',
            'value' => 'isset($data->company->name) ? $data->company->name : ""',
        ),
        array(
            'header' => 'Department',
            'value' => 'isset($data->department->name) ? $data->department->name : ""',
        ),
        //'department_id',
        array(
            'header' => 'Level',
            'value' => 'isset($data->level->name) ? $data->level->name : ""',
        ),
        'job_title',
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}{delete}',
            //'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gPerson/deleteCareer2",array("id"=>$data->id))',
            'updateDialog' => array(
                'controllerRoute' => 'm1/gPerson/updateCareer2',
                'actionParams' => array('id' => '$data->id'),
                'dialogTitle' => 'Update Career',
                'dialogWidth' => 512, //override the value from the dialog config
                'dialogHeight' => 530
            ),
            'visible' => ($this->id == "gPersonCostcenter")
        ),
    ),
));

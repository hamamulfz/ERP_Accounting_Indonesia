<?php
$this->breadcrumbs = array(
    'Notification' => array('index'),
    'index',
);


$this->menu = array(
//array('label'=>'Create', 'url'=>array('create')),
);

//$this->menu4=ModelNotifyii::getTopOther();
?>

<div class="page-header">
    <h1>
        <i class="icon-fa-reorder"></i>
        Notification Manager
    </h1>
</div>

<?php
if (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff')) {
?>

<div class="pull-right">
    <?php
    $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'buttons' => array(
            array('label' => 'Mark All as Read', 'url' => Yii::app()->createUrl('/sNotification/markRead')),
        ),
    ));
    ?>
</div>
<br/>

<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'id' => 'notification-grid',
		'dataProvider' => $dataProvider,
		'itemsCssClass' => 'table table-condensed',
		'template' => '{items}{pager}',
		'columns' => array(
			array(
				'header'=>'',
				'type' =>'raw',
				'value'=>'$data->photo_path',
				'htmlOptions'=>array(
					'style'=>'width:40px',
				)
			),
			array(
				'header' => 'Detail',
				'type' => 'raw',
				'value' =>'$data->linkReplace',
			),
			array(
				'header' => 'Time',
				'type' =>'raw',
				'value' => function($data) {
						return $data->author_name             
						. CHtml::tag("div",array('style' => 'color:grey;font-size:12px; margin-bottom:10px;'),waktu::nicetime($data->expire));             
				}
			
			),
			//'author_name',
		),
	));
}
?>



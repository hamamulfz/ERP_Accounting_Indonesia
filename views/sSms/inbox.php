<?php

$this->renderPartial('_menu');

?>

<div class="page-header">
    <h1>		<i class="icon-fa-envelope"></i>
        Inbox</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-smsout-grid',
    'dataProvider' => sSmsin::model()->search(),
    'itemsCssClass' => 'table table-striped table-condensed',
    'template' => '{items}{pager}',
    //'filter' => $model,
    'enableSorting'=>false,
    'columns' => array(
        'sender_number',
        //'modem',
        array(
            'name' => 'message',
            'type' => 'raw',
            'value' => 'CHtml::link($data->message,Yii::app()->createUrl("/sSmsout/view",array("id"=>$data->id)))'
        ),
    	array(
    		'header'=>'Time',
    		'type'=>'raw',
    		'value'=> 'waktu::nicetime($data->created_date)',
    	),
		/*
		  'approved_id',
		 */
		//array(
		//	'class'=>'TbButtonColumn',
		//),
	),
));
?>

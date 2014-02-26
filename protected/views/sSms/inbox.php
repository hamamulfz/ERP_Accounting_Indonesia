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
    	array(
    		'header'=>'Time',
    		'type'=>'raw',
    		'value'=> 'date("d-m-Y h:i",$data->created_date)',
    	),
        'sender_number',
        //'modem',
        array(
            'name' => 'message',
            'type' => 'raw',
            'value' => 'CHtml::link($data->message,Yii::app()->createUrl("/sSmsout/view",array("id"=>$data->id)))'
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

<?php
/* @var $this SSmsoutController */
/* @var $model sSmsout */

$this->breadcrumbs = array(
    'S Smsouts' => array('index'),
    'Manage',
);

$this->menu = array(
        //array('label'=>'Home', 'icon'=>'home', 'url'=>array('index')),
);

$this->menu5 = array('SMS Out');
?>

<div class="page-header">
    <h1>SMS Out / Broadcast</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-smsout-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-condensed',
    'template' => '{items}{pager}',
    'filter' => $model,
    'columns' => array(
        'sender_id',
        //'receivergroup_id',
        'receivergroup_tag',
        //'modem',
        array(
            'name' => 'message',
            'type' => 'raw',
            'value' => 'CHtml::link($data->message,Yii::app()->createUrl("/sSmsout/view",array("id"=>$data->id)))'
        ),
        array(
            'name' => 'created_date',
            'value' => 'waktu::nicetime($data->created_date)',
        )
    /*
      'approved_id',
     */
    //array(
    //	'class'=>'TbButtonColumn',
    //),
    ),
));
?>

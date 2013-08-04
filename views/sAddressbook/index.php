<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */

$this->breadcrumbs = array(
    'S Addressbooks' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Address Book Group', 'icon' => 'home', 'url' => array('/sAddressbookGroup')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#s-addressbook-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
    <h1>Address Book</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-addressbook-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'category_name',
        array(
            'name' => 'complete_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->complete_name,Yii::app()->createUrl("/sAddressbook/view",array("id"=>$data->id)))',
        ),
        'company_name',
        'title',
        //'address',
        'handphone',
        'email',
    //array(
    //	'class'=>'TbButtonColumn',
    //),
    ),
));
?>

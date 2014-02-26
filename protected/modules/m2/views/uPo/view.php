<?php
$this->breadcrumbs = array(
    'U Sos' => array('index'),
    $model->id,
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/uPo')),
    array('label' => 'Update', 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id), 'visible' => $model->state_id != 2),
    array('label' => 'Delete', 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'visible' => $model->state_id != 2),
);

$this->menu5 = array('Purchased Order');

$this->menu1 = uPo::getTopUpdated();
$this->menu2 = uPo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uPo/index'));
?>


<div class="page-header">
    <h1><?php echo $model->system_ref; ?></h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'entity_id',
        array(
            'label' => 'Supplier',
            'name' => 'supplier.company_name',
        ),
        'input_date',
        'system_ref',
        'periode_date',
        'po_type_id',
        'remark',
        array(
            'label' => 'Total',
            'value' => Yii::app()->indoFormat->number((int) $model->poSum)
        ),
    //'approved_date',
    //'approved_by',
    ),
));
?>

<?php
$this->widget('TbGridView', array(
    'id' => 'bporder-detail-grid',
    'dataProvider' => uPoDetail::model()->search($model->id),
    'itemsCssClass' => 'table table-striped table-bordered',
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array(
            'header' => 'Item',
            'value' => '$data->item->item_name',
        ),
        'description',
        'qty',
        'uom',
        array(
            'value' => '$data->amountf()',
            'name' => 'amount',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'class' => 'ext.gridcolumns.TotalColumn',
            'name' => 'amount',
            'output' => 'Yii::app()->indoFormat->number($value)',
            'type' => 'raw',
            'footer' => true,
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
            'footerHtmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px; font-weight:bold'
            ),
        ),
    ),
));
?>
<br />

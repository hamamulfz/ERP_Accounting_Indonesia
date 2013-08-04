<?php
/* @var $this SAddressbookGroupDetailController */
/* @var $model sAddressbookGroupDetail */

$this->breadcrumbs = array(
    'S Addressbook Group Details' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List sAddressbookGroupDetail', 'url' => array('index')),
    array('label' => 'Create sAddressbookGroupDetail', 'url' => array('create')),
    array('label' => 'Update sAddressbookGroupDetail', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete sAddressbookGroupDetail', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage sAddressbookGroupDetail', 'url' => array('admin')),
);
?>

<h1>View sAddressbookGroupDetail #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'parent_id',
        'name_id',
    ),
));
?>

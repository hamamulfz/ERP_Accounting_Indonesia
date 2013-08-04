<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List sAddressbookGroup', 'url' => array('index')),
    array('label' => 'Create sAddressbookGroup', 'url' => array('create')),
    array('label' => 'Update sAddressbookGroup', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete sAddressbookGroup', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage sAddressbookGroup', 'url' => array('admin')),
);
?>

<h1>View sAddressbookGroup #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'parent_id',
        'group_name',
        'description',
    ),
));
?>

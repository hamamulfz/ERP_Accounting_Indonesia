<?php
/* @var $this SAddressbookGroupDetailController */
/* @var $model sAddressbookGroupDetail */

$this->breadcrumbs = array(
    'S Addressbook Group Details' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List sAddressbookGroupDetail', 'url' => array('index')),
    array('label' => 'Create sAddressbookGroupDetail', 'url' => array('create')),
    array('label' => 'View sAddressbookGroupDetail', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage sAddressbookGroupDetail', 'url' => array('admin')),
);
?>

<h1>Update sAddressbookGroupDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
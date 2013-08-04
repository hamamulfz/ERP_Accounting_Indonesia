<?php
/* @var $this SAddressbookGroupDetailController */
/* @var $model sAddressbookGroupDetail */

$this->breadcrumbs = array(
    'S Addressbook Group Details' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List sAddressbookGroupDetail', 'url' => array('index')),
    array('label' => 'Manage sAddressbookGroupDetail', 'url' => array('admin')),
);
?>

<h1>Create sAddressbookGroupDetail</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
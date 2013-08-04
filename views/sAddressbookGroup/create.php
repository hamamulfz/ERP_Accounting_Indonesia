<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List sAddressbookGroup', 'url' => array('index')),
    array('label' => 'Manage sAddressbookGroup', 'url' => array('admin')),
);
?>

<h1>Create sAddressbookGroup</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
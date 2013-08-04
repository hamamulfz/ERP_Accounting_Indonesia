<?php
/* @var $this SAddressbookGroupDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'S Addressbook Group Details',
);

$this->menu = array(
    array('label' => 'Create sAddressbookGroupDetail', 'url' => array('create')),
    array('label' => 'Manage sAddressbookGroupDetail', 'url' => array('admin')),
);
?>

<h1>S Addressbook Group Details</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>

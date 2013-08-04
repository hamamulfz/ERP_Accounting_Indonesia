<?php
/* @var $this SSmsoutController */
/* @var $model sSmsout */

$this->breadcrumbs = array(
    'S Smsouts' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sSmsout')),
);
?>

<h1>Create sSmsout</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
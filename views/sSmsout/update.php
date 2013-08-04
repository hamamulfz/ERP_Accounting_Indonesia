<?php
/* @var $this SSmsoutController */
/* @var $model sSmsout */

$this->breadcrumbs = array(
    'S Smsouts' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/sSmsout')),
);
?>

<div class="page-header">
    <h1>Update </h1>
</div>


<?php $this->renderPartial('_form', array('model' => $model)); ?>
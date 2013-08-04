<?php
/* @var $this SSmsoutController */
/* @var $model sSmsout */

$this->breadcrumbs = array(
    'S Smsouts' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sSmsout')),
);
?>

<div class="page-header">
    <h1><?php echo $model->id; ?></h1>
</div>

<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'sender_id',
        'receivergroup_id',
        'receivergroup_tag',
        //'modem',
        'message',
        'approved_id',
    ),
));
?>


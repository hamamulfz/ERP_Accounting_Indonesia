<?php
/* @var $this SAddressbookGroupDetailController */
/* @var $data sAddressbookGroupDetail */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
    <?php echo CHtml::encode($data->parent_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name_id')); ?>:</b>
    <?php echo CHtml::encode($data->name_id); ?>
    <br />


</div>
<?php
/* @var $this SSmsoutController */
/* @var $model sSmsout */
/* @var $form CActiveForm */


Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/css/select2-3.4.1/select2.js");
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . "/css/select2-3.4.1/select2.css");


Yii::app()->clientScript->registerScript('sel2', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'receivergroup_tag') . "\" ).select2(
			{tags:['red', 'green', 'blue']}
		);
		
		
		});

");
?>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 's-smsout-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldRow($model,'receivergroup_id'); ?>

<?php echo $form->textFieldRow($model, 'receivergroup_tag', array('class' => 'span3')); ?>
<br/>
<br/>

<?php echo $form->textAreaRow($model, 'message', array('class' => 'span5', 'rows' => 5)); ?>

<div class="form-actions">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>


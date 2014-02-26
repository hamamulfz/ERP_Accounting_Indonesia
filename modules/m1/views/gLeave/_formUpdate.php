<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'input_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#" . CHtml::activeId($model, 'start_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#" . CHtml::activeId($model, 'end_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#" . CHtml::activeId($model, 'work_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});


});

		");?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'g-cuti-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldRow($model,'input_date'); ?>

<?php echo $form->textFieldRow($model, 'start_date'); ?>

<?php echo $form->textFieldRow($model, 'end_date'); ?>

<?php echo $form->textFieldRow($model, 'number_of_day', array('class' => 'span1', 'hint' => 'Total days of leaving')); ?>

<?php echo $form->textFieldRow($model,'work_date'); ?>

<?php echo $form->textAreaRow($model, 'leave_reason', array('class' => 'span5', 'rows' => 4)); ?>

<?php //echo $form->textFieldRow($model, 'mass_leave'); ?>
<?php //echo $form->textFieldRow($model, 'person_leave'); ?>
<?php echo $form->textFieldRow($model, 'balance'); ?>

<?php //echo $form->textFieldRow($model,'replacement',array('class'=>'span5','maxlength'=>10,'hint'=>'Your office mate as replacement during your leave')); ?>
<?php /*
  <div class="control-group">
  <?php echo $form->labelEx($model,'replacement',array('class'=>'control-label')); ?>
  <div class="controls">
  <?php
  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
  'model'=>$model,
  'attribute'=>'replacement',
  'source'=>$this->createUrl('/m1/gPerson/personAutoComplete'),
  'options'=>array(
  'minLength'=>'2',
  //'focus'=> 'js:function( event, ui ) {
  //	$("#'.CHtml::activeId($model,'replacement').'").val(ui.item.label);
  //	return false;
  //}',
  ),
  'htmlOptions'=>array(
  'class'=>'input-medium',
  'placeholder'=>'Search Name',
  'class'=>'span4',
  ),
  ));

  ?>
  </div>
  </div>
 */ ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php
$this->endWidget();


<?php
/* @var $this VAdmissionFormController */
/* @var $model vAdmissionForm */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="span9">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'v-admission-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'form_number',array('class'=>'span5')); ?>
		<?php echo $form->textFieldRow($model,'buyer_name',array('class'=>'span5')); ?>
		<?php echo $form->textFieldRow($model,'phone',array('class'=>'span3')); ?>
		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'remarks',array('rows'=>3,'class'=>'span4')); ?>

        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Create' : 'Save',
            ));
            ?>

        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- form -->
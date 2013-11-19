<div class="page-header">
    <h3>New Target Setting</h3>
</div>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'g-target-setting-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->dropDownListRow($model,'strategic_objective',sParameter::items('cStrategicObjective'), 
	
		array('class'=>'span5','maxlength'=>50)); ?>


	<?php echo $form->textAreaRow($model,'strategic_desc',array('class'=>'span5','rows'=>5)); ?>


	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span3')); ?>


	<?php echo $form->textAreaRow($model,'kpi_desc',array('class'=>'span5','rows'=>5)); ?>


	<?php echo $form->textFieldRow($model,'target',array('class'=>'span5','maxlength'=>13)); ?>


	<?php echo $form->textAreaRow($model,'remark',array('class'=>'span5','rows'=>5)); ?>


	<?php echo $form->textFieldRow($model,'strategic_initiative',array('class'=>'span5','maxlength'=>154)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

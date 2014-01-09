<div class="page-header">
    <h3>New Work Result</h3>
</div>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'g-target-setting-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->dropDownListRow($model,'period',gTalentPerformance::getTalentPeriod()); ?>


	<?php //echo $form->dropDownListRow($model,'company_id',array(), 
		//array('class'=>'span5','maxlength'=>50)); ?>


	<?php echo $form->dropDownListRow($model,'talent_template_id',gParamCompetency::workResultDropDown(), 
		array('class'=>'span5','maxlength'=>50)); ?>


	<?php echo $form->textAreaRow($model,'remark',array('class'=>'span5','rows'=>5)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

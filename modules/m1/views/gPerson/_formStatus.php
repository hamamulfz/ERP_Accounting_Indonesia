<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker2', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'start_date') . "\" ).datepicker({
			'dateFormat' : 'dd-mm-yy',
		});
		$( \"#" . CHtml::activeId($model, 'end_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});
			
});

		");
?>

    <div class="form">

        <?php
        $form = $this->beginWidget('TbActiveForm', array(
            'id' => 'g-person-status-form',
            'enableAjaxValidation' => false,
                //'type'=>'horizontal',
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'start_date', array()); ?>

        <?php echo $form->textFieldRow($model, 'end_date'); ?>

        <?php echo $form->dropDownListRow($model, 'status_id', sParameter::items('AK')); ?>

        <?php echo $form->textAreaRow($model, 'remark', array('class' => 'span4', 'rows' => 3)); ?>

        <div class="form-actions">
            <?php
            //$this->widget('bootstrap.widgets.TbButton', array(
            //    'buttonType' => 'submit',
            //    'type' => 'primary',
            //    'label' => $model->isNewRecord ? 'Create' : 'Save',
            //));
         
		  echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save', 
				 CHtml::normalizeUrl(array('/m1/gPerson/statusAjax')), 
				 array(
					  'data'=>'js:jQuery(this).parents("form").serialize() + "&parent_id='.$id.'"', 
					  'success'=>'function(data){
							$.fn.yiiGridView.update("g-person-status-grid", {
								data: $(this).serialize()
							});
						}'

				  ), 
				 array(
					  'id'=>'ajaxSubmitBtn', 
					  'name'=>'ajaxSubmitBtn',
					  'class'=>'btn btn-primary',
				 )); 


            ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>


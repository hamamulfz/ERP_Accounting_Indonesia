
<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => false,
    'headerIcon' => 'icon-fa-globe',
));
?>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'login-form',
    //'type'=>'horizontal',
    //'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<?php echo $form->textFieldRow($model, 'username', array('style' => 'width:95%')); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('style' => 'width:95%')); ?>

<?php if ($model->getIsNeedCaptcha()): ?>
    <?php if (extension_loaded('gd')): ?>
        <?php echo $form->labelEx($model, 'verifyCode'); ?>
        <div>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model, 'verifyCode'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php //echo $form->checkBoxRow($model,'rememberMe');  ?>

<p>
    <?php
    	if (Yii::app()->params['selfregistration']) 
	    	echo "Are you employee? " . CHtml::link('register here', Yii::app()->createUrl('site/register')); 
    ?>
</p>

    <?php echo CHtml::htmlButton('<i class="icon-fa-ok"></i> Submit', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>

<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>


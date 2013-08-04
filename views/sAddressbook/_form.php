<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 's-addressbook-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_name'); ?>
        <?php echo $form->textField($model, 'category_name', array('size' => 15, 'maxlength' => 15)); ?>
        <?php echo $form->error($model, 'category_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'complete_name'); ?>
        <?php echo $form->textField($model, 'complete_name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'complete_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'company_name'); ?>
        <?php echo $form->textField($model, 'company_name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'company_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'handphone'); ?>
        <?php echo $form->textField($model, 'handphone', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'handphone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<div class="row">
    <div class="span7 offset1">
        <?php
        $form = $this->beginWidget('TbActiveForm', array(
            'id' => 'sFeedback-form',
            'type' => 'inline',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textAreaRow($model, 'long_desc', array('class' => 'span8', 'rows' => 3, 'hint' => 'Input your Comment here...')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Send',
    ));
    ?>
</div>

        <?php $this->endWidget(); ?>
    </div>
</div>


<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    //'action'=>Yii::app()->createUrl($this->route),
    //'action'=>Yii::app()->createUrl('/m1/gPerson/view',array("id"=> *_PARAMETER_*),
    'action' => Yii::app()->createUrl('/sUser/index'),
    'method' => 'get',
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php //echo $form->textField($model,'employee_name',array('class'=>'span3','maxlength'=>100)); ?>
<?php

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model' => $model,
    'attribute' => 'username',
    'source' => $this->createUrl('/sUser/userAutoComplete'),
    'options' => array(
        'minLength' => '2',
        'focus' => 'js:function( event, ui ) {
					$("#' . CHtml::activeId($model, 'username') . '").val(ui.item.label);
					return false;
					}',
        'select' => 'js:function( event, ui ) {
					$("#searchForm").submit();
					return false;
					}',
    ),
    'htmlOptions' => array(
        'class' => 'span5',
        'placeholder' => 'Search Name or Company Name',
    ),
));
?>

<?php //echo CHtml::htmlButton('<i class="icon-fa-search"></i> Search', array('class'=>'btn','type'=>'submit')); ?>

<?php $this->endWidget(); ?>


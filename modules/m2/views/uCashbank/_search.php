<?php

$form = $this->beginWidget('TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model' => $model,
    'attribute' => 'system_ref',
    'source' => $this->createUrl('/m2/uCashbank/cashbankAutoComplete'),
    'options' => array(
        'minLength' => '2',
        'focus' => 'js:function( event, ui ) {
					$("#' . CHtml::activeId($model, 'system_ref') . '").val(ui.item.label);
					return false;
}',
        'select' => 'js:function( event, ui ) {
					$("#searchForm").submit();
					return false;
}',
    ),
    'htmlOptions' => array(
        'class' => 'span4',
        'placeholder' => 'Search NoRef or Remark',
    ),
));
?>

<?php //echo CHtml::htmlButton('<i class="icon-fa-search"></i> Search', array('class'=>'btn','type'=>'submit')); ?>

<?php $this->endWidget(); ?>

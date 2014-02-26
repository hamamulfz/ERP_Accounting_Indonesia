<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'form',
    //'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('id' => 'tabb1', 'label' => 'Field List', 'content' => $this->renderPartial("/gBiPerson/_tabFieldList", array('model' => $model), true), 'active' => true),
        array('id' => 'tabb2', 'label' => 'Filter', 'content' => $this->renderPartial("/gBiPerson/_tabFilter", array('model' => $model), true)),
        array('id' => 'tabb3', 'label' => 'Limit', 'content' => $this->renderPartial("/gBiPerson/_tabLimit", array('model' => $model, 'form' => $form), true)),
    //array('id'=>'tabb4','label'=>'Help','content'=>$this->renderPartial("_helpInfo", array(), true)),
    ),
));
?>

<br/>
<?php echo $form->checkboxRow($model, 'export'); ?>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="icon-ok"></i>' . ' Show', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>

<?php if (isset($_POST['field'])) { ?>
    <br/>

    <section id="result">
        <h4>RESULT</h4>

        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array('id' => 'tab1', 'label' => 'Select', 'content' => $this->renderPartial("/gBiPerson/_tabSelect", array("dataProvider" => $dataProvider, 'field' => $field, 'production' => $production, 'sql' => $sql), true), 'active' => true),
                array('id' => 'tab2', 'label' => 'Group By', 'content' => $this->renderPartial("/gBiPerson/_tabGroupBy", array("dataProvider" => $dataProvider, 'field' => $field), true)),
                array('id' => 'tab3', 'label' => 'Summary', 'content' => $this->renderPartial("/gBiPerson/_tabSummary", array("dataProvider" => $dataProvider, 'field' => $field), true)),
                array('id' => 'tab4', 'label' => 'Graphics', 'content' => $this->renderPartial("/gBiPerson/_tabGraphics", array("dataProvider" => $dataProvider, 'field' => $field), true)),
            ),
        ));
        ?>
    </section>

    <?php
} 


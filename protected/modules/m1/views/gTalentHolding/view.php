<?php
$this->breadcrumbs = array(
    'G people' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gTalentHolding')),
        //array('label'=>'Update', 'icon'=>'edit', 'url'=>array('update', 'id'=>$model->id)),
        //array('label'=>'Delete', 'icon'=>'remove', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),),
);


//$this->menu1 = gPerson::getTopUpdated();
//$this->menu2 = gPerson::getTopCreated();

$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gTalent/index'));
?>

<?php /*
  <div class="pull-right">
  <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
  'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
  'buttons'=>array(
  array('label'=>'Person', 'items'=>array(
  array('label'=>'Leave', 'url'=>Yii::app()->createUrl("/m1/gLeave/view",array("id"=>$model->id))),
  array('label'=>'Absence', 'url'=>'#'),
  array('label'=>'Payroll', 'url'=>'#'),
  array('label'=>'Other Module', 'url'=>'#'),
  )),
  ),
  )); ?>
  </div>
 */ ?>

<div class="page-header">
    <h1>
        <i class="icon-fa-beaker"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<div class="row">
    <div class="span2">
        <?php echo $model->PhotoPath; ?>

        <div style="text-align:center; padding:10px 0">
            <?php echo CHtml::link('Print Profile', Yii::app()->createUrl('/m1/gTalent/printProfile', array('id' => $model->id)), array('class' => 'btn btn-mini btn-primary', 'target' => '_blank'))
            ?>
        </div>
    </div>
    <div class="span7">
        <?php echo $this->renderPartial('/gPerson/_personalInfo',array('model'=>$model));  ?>	
    </div>
</div>

<div class="row">
    <div class="span9">
        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array('id' => 'tab1', 'label' => 'Target Setting', 'content' => $this->renderPartial("/gTalent/_tabTarget", array("model" => $model), true)),
                array('id' => 'tab2', 'label' => 'Performance', 'content' => $this->renderPartial("/gTalent/_tabPerformance", array("model" => $model), true), 'active' => true),
                //array('id' => 'tab3', 'label' => 'Potential', 'content' => $this->renderPartial("_tabPotential", array("model" => $model), true)),
                array('id' => 'tab4', 'label' => 'Career-Experience-Status', 'content' => $this->renderPartial("/gTalent/_mainCareerExperienceStatus", array("model" => $model), true)),
                array('id' => 'tab5', 'label' => 'Education', 'content' => $this->renderPartial("/gTalent/_mainEducation", array("model" => $model), true)),
                //array('id' => 'tab7', 'label' => 'Detail', 'content' => $this->renderPartial("/gPerson/_personalInfo", array("model" => $model), true)),
            ),
        ));
        ?>
    </div>
</div>


<hr/>

<?php /*
<div class="row">
	<div class="span6">
		<?php echo $this->renderPartial('/gPerson/_sameDepartment',array('model'=>$model)); ?>	
	</div>
	<div class="span6">
		<?php echo $this->renderPartial('/gPerson/_sameLevel',array('model'=>$model)); ?>	
	</div>
</div>

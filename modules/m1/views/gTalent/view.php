<?php if (Yii::app()->request->getParam("tab") != null): ?>

    <script>

        $(document).ready(function() {
            $('#tabs a:contains("<?php echo Yii::app()->request->getParam("tab"); ?>")').tab('show');
        });

    </script>

<?php endif; ?>
</php>


<?php
$this->breadcrumbs = array(
    'Home Performance' => array('/m1/gTalent'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gTalent')),
        //array('label'=>'Update', 'icon'=>'edit', 'url'=>array('update', 'id'=>$model->id)),
        //array('label'=>'Delete', 'icon'=>'remove', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),),
);


$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();

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
    <div class="span10">
        <?php echo $this->renderPartial('/gPerson/_personalInfo',array('model'=>$model));  ?>	
    </div>
</div>

<div class="row">
    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3> <?php echo $model->targetSettingC ?></h3>
                    <h6 align="center" ><font COLOR="#999">Work Result</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3> <?php echo $model->coreCompetencyC ?> </h3>
                    <h6 align="center" ><font COLOR="#999">Core Competency</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3> <?php echo $model->leadershipCompetencyC ?> </h3>
                    <h6 align="center" ><font COLOR="#999">Leadership Competency</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3> <?php echo $model->targetSettingC + $model->coreCompetencyC + $model->leadershipCompetencyC ?> </h3>
                    <h6 align="center" ><font COLOR="#999">Final Rating</font></h6></td>
            </tr>
        </table>
    </div>

    <?php /*
      <div class="span2">
      <table width="100%">
      <tr bgcolor="EAEFFF">
      <td  align="center"><h3>.</h3>
      <h6 align="center" ><font COLOR="#999">Reserved</font></h6></td>
      </tr>
      </table>
      </div>
     */ ?>

</div>

<br/>


<div class="row">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array('id' => 'tab70', 'label' => 'Target Setting', 'active' => true, 'items' => array(
	                array('id' => 'tab73', 'label' => 'KPI', 'content' => $this->renderPartial("_tabTargetSetting", array("model" => $model, "modelTargetSetting" => $modelTargetSetting), true), 'visible'=> $model->mGolonganId() >=10, 'active' => true ),
	                array('id' => 'tab74', 'label' => 'Work Result', 'content' => $this->renderPartial("_tabWorkResult", array("model" => $model, "modelWorkResult" => $modelWorkResult), true), 'visible'=> $model->mGolonganId() < 10, 'active' => true ),
	                array('id' => 'tab71', 'label' => 'Core Competency', 'content' => $this->renderPartial("_tabCoreCompetency", array("model" => $model, "modelCoreCompetency" => $modelCoreCompetency), true)),
	                array('id' => 'tab72', 'label' => 'Leadership Competency', 'content' => $this->renderPartial("_tabLeadershipCompetency", array("model" => $model, "modelLeadershipCompetency" => $modelLeadershipCompetency), true)),
                )),
                array('id' => 'tab40', 'label' => 'Performance Appraisal', 'items' => array(
					array('id' => 'tab41', 'label' => 'KPI', 'content' => $this->renderPartial("_tabPerformanceA", array("model" => $model, "modelPerformanceP" => $modelPerformanceP), true), 'visible'=> $model->mGolonganId() >=10 ),
	                array('id' => 'tab44', 'label' => 'Work Result', 'content' => $this->renderPartial("_tabWorkResult2", array("model" => $model, "modelWorkResult" => $modelWorkResult), true), 'visible'=> $model->mGolonganId() < 10 ),
	                array('id' => 'tab42', 'label' => 'Core Competency', 'content' => $this->renderPartial("_tabCoreCompetency2", array("model" => $model, "modelCoreCompetency" => $modelCoreCompetency), true)),
	                array('id' => 'tab43', 'label' => 'Leadership Competency', 'content' => $this->renderPartial("_tabLeadershipCompetency2", array("model" => $model, "modelLeadershipCompetency" => $modelLeadershipCompetency), true)),
					//array('id' => 'tab7', 'label' => 'Performance Appraisal', 'items' => array(
						//array('id' => 'tab3', 'label' => 'Potential', 'content' => $this->renderPartial("_tabPotential", array("model" => $model, "modelPotential" => $modelPotential), true)),
					//)),
                )),
				array('id' => 'tab30', 'label' => 'Final Rating', 'content' => $this->renderPartial("_tabFinalRating", array("model" => $model, "modelPerformanceR" => $modelPerformanceR), true)),
                array('id' => 'tab7', 'label' => 'Personal Info', 'items' => array(
					array('id' => 'tab4', 'label' => 'Career-Experience-Status', 'content' => $this->renderPartial("_mainCareerExperienceStatus", array("model" => $model), true)),
					array('id' => 'tab5', 'label' => 'Education', 'content' => $this->renderPartial("_mainEducation", array("model" => $model), true)),
					//array('id' => 'tab7', 'label' => 'Detail', 'content' => $this->renderPartial("/gPerson/_personalInfo", array("model" => $model), true)),
                )),
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

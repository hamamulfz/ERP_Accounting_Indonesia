<?php
$this->breadcrumbs = array(
    'U Sos' => array('index'),
    //$model->id=>array('view','id'=>$model->system_ref),
    'Update',
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/uPo')),
        //array('label'=>'View', 'icon'=>'edit', 'url'=>array('view','id'=>$model->id)),
        //array('label'=>'Delete','icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);

$this->menu5 = array('Purchased Order');

$this->menu1 = uPo::getTopUpdated();
$this->menu2 = uPo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uPo/index'));
?>


<div class="page-header">
    <h1>Update</h1>
</div>


<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
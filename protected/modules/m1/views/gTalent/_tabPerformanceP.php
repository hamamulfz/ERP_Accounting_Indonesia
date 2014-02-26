<?php
//echo $this->renderPartial("_summaryPerformance", array("model" => $model), true);
?>
<br/>

<?php
$this->widget('TbGridView', array(
    'id' => 'g-performance-grid',
    'dataProvider' => gPerformance::model()->search(),
    //'filter'=>$model,
    'columns' => array(
        'aspect.aspect_name',
        'individual_weight',
        'individual_target',
        'individual_value',
        'superior_value',
        'superior_weight',
        'remark',
    //array(
    //	'class'=>'CButtonColumn',
    //),
    ),
));
?>

<?php
if (isset($modelPerformanceP))
	echo $this->renderPartial('_formPerformanceP', array('model' => $modelPerformanceP));
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'id' => 'grid-sso',
    'data' => $model,
    'attributes' => array(
        'activation_code',
        array(
            'name' => 'activation_expire',
            'value' => date("d-m-Y h:i", $model->activation_expire),
        ),
    ),
));
?>
<p>
    <?php
	    echo CHtml::link('Generate Code', Yii::app()->createUrl("/m1/gPerson/updateSso", array("id" => $model->id)),
	    array('class'=>'btn btn-primary')
    );

/*	echo CHtml::ajaxLink('Generate Code', CHtml::normalizeUrl(array('/m1/gPerson/updateSso','id'=>$model->id)), array(
		'success' => 'function(data){
						$.fn.yiiGridView.update("grid-sso", {
							data: $(this).serialize()
						});
		}',
	), 
	array(
		//'id' => 'ajaxSubmitBtn',
		//'name' => 'ajaxSubmitBtn',
		'class' => 'btn btn-primary',
	));
*/

    ?>	
</p>




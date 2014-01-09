<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'g-work-result-grid5',
	//'dataProvider'=>$model->search(),
    'dataProvider' => gTalentWorkResult::model()->search($model->id),
	'type'=>'condensed',
	//'filter'=>$model,
	'template'=>'{items}',
	'columns'=>array(
		//'company_id',
		'talent_template.aspect',
		'remark',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deleteWorkResult",array("id"=>$data->id))',
        ),

	),

)); ?>

<?php
	echo $this->renderPartial('_formWorkResult', array('model' => $modelWorkResult));
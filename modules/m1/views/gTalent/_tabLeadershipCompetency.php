<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'g-target-setting-grid3',
	//'dataProvider'=>$model->search(),
    'dataProvider' => gTalentLeadershipCompetency::model()->search($model->id),
	'type'=>'condensed',
	//'filter'=>$model,
	'template'=>'{items}',
	'columns'=>array(
		array(
			'header'=>'Period',
			'value' => '$data->getConvertTalentPeriod($data->period)',
		),
		//'company_id',
		'talent_template.aspect',
		'remark',
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deleteLeadershipCompetency",array("id"=>$data->id))',
        ),

	),

)); ?>

<?php
	echo $this->renderPartial('_formLeadershipCompetency', array('model' => $modelLeadershipCompetency));
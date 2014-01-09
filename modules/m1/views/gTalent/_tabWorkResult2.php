<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'g-work-result-grid4',
	//'dataProvider'=>$model->search(),
    'dataProvider' => gTalentWorkResult::model()->search($model->id),
	'type'=>'condensed',
	//'filter'=>$model,
	'template'=>'{items}',
	'columns'=>array(
		//'company_id',
		'talent_template.aspect',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'personal_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateWorkResultAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
        )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateWorkResultAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
        )),
		'calcFinalResult',
		'remark',

	),

)); ?>


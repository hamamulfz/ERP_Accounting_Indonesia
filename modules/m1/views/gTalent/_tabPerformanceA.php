<?php //$this->widget('bootstrap.widgets.TbGridView',array(
	$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'id'=>'g-target-setting-grid2',
	//'dataProvider'=>$model->search(),
    'dataProvider' => gTalentTargetSetting::model()->search($model->id),
	'type'=>'condensed',
	//'filter'=>$model,
	'template'=>'{items}',
	'extraRowColumns'=> array('strategic_objective'),
	//'extraRowExpression' =>  '"<b style=\"padding:20px 0;\">".$data->strategic_objective."</b>"',
	'columns'=>array(
		//'strategic_objective',
		'strategic_desc',
		'kpi_desc',
		//'strategic_initiative',
		'weight',
		'target',
		'unit',
		//'remark',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'realization',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
        )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'value_type_id',
            // 'headerHtmlOptions' => array('style' => 'width: 60px'),
            'editable' => array(
                'type' => 'select',
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                'source' => array('1'=>'Min','2'=>'Max'),
            )
        ),
		'realization_vs_target',
		'individual_score',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
        )),
		'superior_score_x_weight',

	),

)); ?>


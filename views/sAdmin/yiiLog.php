<div class="page-header">
    <h1><i class="icon-fa-table"></i>
        Yii Log</h1>
</div>

<div class="row">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'yii-log-grid',
            'dataProvider' => $dataProvider,
            'itemsCssClass' => 'table table-striped table-bordered',
            'template' => '{items}{pager}',
            'columns' => array(
				//array(
            	//	'header'=>'Sr #',
		        //    'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        		//),
                array(
                	'type' =>'raw',
					'value' => function($data) {
						return CHtml::tag('div', array(), $data["IP_User"])
								. CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data["user_name"])
								. CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data["logtime"]);
					}
				),
                array(
                	'type' =>'raw',
					'value' => function($data) {
						return CHtml::tag('div', array(), substr($data["request_URL"],0,50))
								. CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), 
								peterFunc::shorten_string($data["message"],20));
					}
				),
            ),
        ));
        ?>

    </div>
</div>
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
                'logtime',
                'IP_User',
                'user_name',
                //'request_URL',
                array(
                    'value' => 'substr($data["request_URL"],0,50)',
                ),
                array(
                    'value' => 'peterFunc::shorten_string($data["message"],20)',
                ),
            ),
        ));
        ?>

    </div>
</div>
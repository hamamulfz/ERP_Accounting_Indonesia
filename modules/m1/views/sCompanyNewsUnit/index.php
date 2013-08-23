<?php
/* @var $this SCompanyNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Company News',
);

$this->menu = array(
);

//$this->menu1 = sCompanyNews::getTopUpdated();
//$this->menu2 = sCompanyNews::getTopCreated();
$this->menu5 = array('Business Unit News');
?>

<div class="page-header">
    <h1>
        <i class="iconic-article"></i>
        Business Unit News
    </h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'companynews-grid',
    'dataProvider' => $model->searchNewsUnit(),
    'filter' => $model,
    'itemsCssClass' => 'table table-striped',
    'template' => '{items}{pager}',
    'columns' => array(
        array(
            'name' => 'created_date',
            'value' => 'date("d-m-Y H:i",$data->created_date)',
            'filter' => false,
        ),
        array(
            'name' => 'publish_date',
            'value' => 'waktu::nicetime(strtotime($data->publish_date))',
            'filter' => false,
        ),
        array(
            'header' => 'Author',
            'name' => 'created.username',
        ),
        'category.category_name',
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link($data->title,Yii::app()->createUrl("/m1/sCompanyNewsUnit/view",array("id"=>$data->id)))',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{update}{delete}',
        ),
        array(
            'header' => 'Priority',
            'name' => 'priority.name',
        ),
        array(
            'header' => 'Approved Status',
            'name' => 'approved.name',
        ),
        array(
            'name' => 'expire_date',
            'value' => 'waktu::nicetime(strtotime($data->expire_date))',
            'filter' => false,
        ),
    ),
));
?>

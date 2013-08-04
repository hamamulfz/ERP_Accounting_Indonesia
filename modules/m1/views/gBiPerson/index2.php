<?php
$this->breadcrumbs = array(
    'Search',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/gBiPersonHolding')),
);
?>

<div class="page-header">
    <h1>
        <i class="icon-fa-bar-chart"></i>
        Searching Holding ...
    </h1>
</div>

<?php
echo $this->renderPartial('/gBiPerson/_mainContent', array("model" => $model, "dataProvider" => $dataProvider, 'field' => $field, 'production' => $production, 'sql' => $sql));
?>
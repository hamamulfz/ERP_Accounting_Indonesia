<?php
$this->breadcrumbs = array(
    'Search',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/gBiPerson')),
);
?>

<div class="page-header">
    <h1>
        <i class="icon-fa-bar-chart"></i>
        Searching...
    </h1>
</div>

    <section id="result">
        <h4>RESULT</h4>

<?php

$this->widget('ext.phpexcel.tlbExcelView', array(
    'id' => 'g-bi-grid',
    'dataProvider' => $dataProvider,
    'grid_mode' => $production, // Same usage as EExcelView v0.33
    'title' => 'Some title - ' . date('d-m-Y - H-i-s'),
    'sheetTitle' => 'Report on ' . date('m-d-Y H-i'),
    //'template'=>'{items}',
    'columns' => $field

));
?>


    </section>

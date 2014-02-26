<?php
$this->breadcrumbs = array(
    'G people' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPerson')),
);


$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();

$this->message='<strong>Aware!</strong> Please, check for posibility re-entry the existing or resigned employee. Contact Holding for more information...';

?>

<div class="page-header">
    <h1>
        <i class="icon-fa-user"></i>
        Create
    </h1>
</div>


<?php
echo $this->renderPartial('_form', array('model' => $model, 'modelCareer' => $modelCareer, 'modelStatus' => $modelStatus));

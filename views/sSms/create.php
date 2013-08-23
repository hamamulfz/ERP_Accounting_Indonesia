<?php

$this->renderPartial('_menu');

?>

<div class="page-header">
<h1>Create Broadcast SMS</h1>
</div>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
Yii::app()->getClientScript()
        ->registerScriptFile(Yii::app()->baseUrl . "/css/prettyGallery/js/jquery.prettyGallery.js")
        ->registerCssFile(Yii::app()->baseUrl . '/css/prettyGallery/css/prettyGallery.css');

Yii::app()->clientScript->registerScript('prettyGallery', "
			$('ul.gallery').prettyGallery({
				itemsPerPage : 1,
				animationSpeed : 'slow',
				navigation : 'bottom',
			
			});
		");


?>

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-fa-reorder"></i><?php echo Yii::t('basic', ' Reminder System') ?></li>
    </ul>
</div>

<div class="row">
<div class="span4">

<ul style="margin:0" class="gallery";>
    <?php
    $notifiche = sNotification::getReminder();

    foreach ($notifiche as $notifica) {
        echo CHtml::openTag('li', array());
        echo CHtml::tag('div',array('style'=>'width:70px;margin-right:10px;float:left'),$notifica->photoPath);
        echo CHtml::link($notifica->getReminder(), Yii::app()->createUrl('/m1/gPerson/view', array('id' => $notifica->id)));
        echo CHtml::closeTag('li');
    }
    ?>
</ul>
</div>
</div>


<div class="pull-right">
    <p>
        <strong><?php echo CHtml::link('<i class="fam-add"></i> Probation/Contract Index', Yii::app()->createUrl('/m1/default/probationcontract')); ?></strong>				
    </p>
</div>

<br/>
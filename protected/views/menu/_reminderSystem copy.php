<style>
.ticker {
	height: 100px;
	overflow: hidden;
	list-style-type: none;
}

#ticker_02 {
	height: 100px;
}

.ticker li {
	height: 100px;
}
</style>


<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-fa-reorder"></i><?php echo Yii::t('basic', ' Reminder System') ?></li>
    </ul>
</div>

<ul style="margin:0" id="ticker_02" class="ticker";>
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

<script>

	function tick2(){
		$('#ticker_02 li:first').animate({'opacity':0}, 400, function () { $(this).appendTo($('#ticker_02')).css('opacity', 1); });
	}
	setInterval(function(){ tick2 () }, 3000);


</script>

<div class="pull-right">
    <p>
        <strong><?php echo CHtml::link('<i class="fam-add"></i> Probation/Contract Index', Yii::app()->createUrl('/m1/default/probationcontract')); ?></strong>				
    </p>
</div>

<br/>
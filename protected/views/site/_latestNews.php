<style>
.ticker {
	height: 250px;
	overflow: hidden;
}

#ticker_02 {
	height: 250px;
}

.ticker li {
	height: 250px;
}
</style>

<?php
$models = sCompanyNews::model()->latestNews;

if ($models) {
    ?>

    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => false,
        'headerIcon' => 'icon-fa-globe',
        'htmlHeaderOptions' => array('style' => 'background:white'),
        'htmlContentOptions' => array('style' => 'background:#E9E9E9;'),
    ));
    ?>

	<ul id="ticker_02" class="ticker" style="margin:0";>

    <?php foreach ($models as $model) { ?>
		<li>
        <h4><?php echo CHtml::link(CHtml::encode($model->title), Yii::app()->createUrl('/sCompanyNews/view', array("id" => $model->id))); ?></h4>
        <?php
        //$this->beginWidget('CMarkdown', array('purifyOutput' => true));
        $_desc = peterFunc::shorten_string(strip_tags($model->content), 30);
        echo $_desc;
        //$this->endWidget();
        ?>
		</li>

    <?php } ?>
	</ul>
    <?php $this->endWidget(); ?>

    <?php
}
?>

<script>

	function tick2(){
		$('#ticker_02 li:first').animate({'opacity':0}, 400, function () { $(this).appendTo($('#ticker_02')).css('opacity', 1); });
	}
	setInterval(function(){ tick2 () }, 3000);


</script>
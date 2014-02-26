<?php
	$items = array(
		array('label' => 'Home', 'url' => Yii::app()->createUrl('/site/login')),
		array('label' => 'Photo', 'url' => Yii::app()->createUrl('/site/photo')),
		array('label' => 'Company News', 'url' => Yii::app()->createUrl('/sCompanyNews')),
		//array('label' => 'Career', 'url' => (Yii::app()->params['webcareer']), 'linkOptions' => array('target' => '_blank', 'style' => 'background-color:#ddeeee')),
	);

	return $items;
?>
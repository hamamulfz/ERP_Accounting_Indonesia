<?php
return array(
		'class' => 'bootstrap.widgets.TbMenu',
		'encodeLabel'=>false,
		'htmlOptions' => array('class' => 'pull-right'),
		'items' => array(
			array('label' => sUser::model()->getFullName()." ".sNotification::getNotifCount(), 'icon' => 'icon-th', 'url' => '#', 'items' => array(
					array('label' => 'Notification'." ".sNotification::getNotifCount(), 'icon' => 'bookmark', 'url' => Yii::app()->createUrl("sNotification")),
					array('label' => 'Feedback', 'icon' => 'comment', 'url' => Yii::app()->createUrl("sFeedback")),
					//array('label'=>'Help', 'icon'=>'question-sign','url'=>Yii::app()->createUrl("sAdmin/help")),
					'---',
					array('label' => sUser::model()->myGroupName, 'icon' => 'list', 'url' => Yii::app()->createUrl('/aOrganization/viewSelf', array('id' => sUser::model()->myGroup))),
					array('label' => 'My Profile', 'icon' => 'user', 'url' => Yii::app()->createUrl('/sUser/viewSelf', array('id' => Yii::app()->user->id))),
					array('label' => 'Change Password', 'icon' => 'barcode', 'url' => Yii::app()->createUrl('/sUser/updatePasswordAuthenticated', array('id' => Yii::app()->user->id))),
					'---',
					array('label' => 'Photo Gallery', 'icon' => 'picture', 'url' => Yii::app()->createUrl('/site/photo')),
					array('label' => 'Company News', 'icon' => 'share', 'url' => Yii::app()->createUrl('/sCompanyNews')),
					//array('label' => 'MailBox'." ".Notification::getMessageCount(), 'icon' => 'envelope', 'url' => Yii::app()->createUrl('/mailbox')),
					array('label' => 'MailBox', 'icon' => 'envelope', 'url' => Yii::app()->createUrl('/mailbox')),
					'---',
					array('label' => 'User Login History', 'icon' => 'user', 'url' => Yii::app()->createUrl("sNotification/userHistory")),
					array('label' => 'Log Out', 'icon' => 'off', 'url' => Yii::app()->createUrl("site/logout")),
				)),
		),
	);

?>
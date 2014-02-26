<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-fa-reorder"></i><?php echo Yii::t('basic', ' Birthday TODAY') ?></li>
    </ul>
</div>

<?php

        $criteria = new CDbCriteria;

        $criteria1 = new CDbCriteria;
        $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ')  ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';

        $criteria->order = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1)';

        $criteria2 = new CDbCriteria;
        $criteria2->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(1,2,3,4,5)';

        $criteria3 = new CDbCriteria;
        $criteria3->condition = "date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
		= curdate()";


        $criteria->mergeWith($criteria1);
        $criteria->mergeWith($criteria2);
        $criteria->mergeWith($criteria3);
        $criteria->limit = 20;

        $notifiche = gPerson::model()->findAll($criteria);


?>

<ul style="margin:0">
    <?php

    foreach ($notifiche as $notifica) {
        echo CHtml::openTag('div', array('class'=>'media','style'=>'margin-top:0;'));
			echo CHtml::openTag('p', array('class'=>'pull-left','style'=>'width:30px'));
			echo $notifica->photoPath; 
			echo CHtml::closeTag('p');

			echo CHtml::openTag('div', array('class'=>'media-body'));
			echo CHtml::openTag('p', array('class'=>'media-heading'));
		        echo CHtml::link(strtoupper($notifica->employee_name).' ', Yii::app()->createUrl('/m1/gPerson/view', array('id' => $notifica->id)));
		        echo '<br/>';
				echo CHtml::tag('strong', array('style' => 'font-size:11px;'), $notifica->mDepartment()).' ';
				echo CHtml::tag('i', array('style' => 'color:grey;font-size:11px; margin-bottom:10px;'), ' '. date('Y') - date('Y',strtotime($notifica->birth_date)) .' years old');
			echo CHtml::closeTag('p');
			echo CHtml::closeTag('div');
        echo CHtml::closeTag('div');
    }
    ?>
</ul>


<br/>
<?php /*
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile(Yii::app()->baseUrl.'/css/snow-effect/snowfall.jquery.js',CClientScript::POS_END);

	Yii::app()->clientScript->registerScript('snow', "
			$(function() {
				$(document).snowfall(
				{
					flakeCount : 150,        // number
					flakeColor : '#fff', // string
					flakeIndex: 999999,     // number
					minSize : 2,            // number
					maxSize : 8,            // number
					minSpeed : 2,           // number
					maxSpeed : 6,           // number
					round : true,          // bool
					shadow : true          // bool
				}
				);


			});

			");
*/			
?>


<?php
$this->renderPartial('_menuEss', array('model' => $model,'month' => $month));
?>


<div class="page-header">
    <h1>
        <i class="icon-fa-leaf"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<?php echo $this->renderPartial("_tabAnnouncement", array(), true); ?>

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Attendance Performance</h4>
</div>


<?php

if ($model->getCountAttendance(peterFunc::cBeginDateBefore(date('Y').date('m'))) == 1) {

$this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $model->attendanceStat(),
        'template' => "{items}",
        'type'=>'condensed',
		'columns' => array(
			array('name' => 'period', 'header' => 'Periode'),
			array('name' => 'cuti', 'header' => 'Cuti'),
			array('name' => 'alpha', 'header' => 'Alpha'),
			array('name' => 'lateIn', 'header' => 'Terlambat'),
			array('name' => 'earlyOut', 'header' => 'Pulang Cepat'),
			array('name' => 'tad', 'header' => 'TAD'),
			array('name' => 'tap', 'header' => 'TAP'),
			array('name' => 'sakit', 'header' => 'Sakit'),
			array('name' => 'special', 'header' => 'Khusus'),
			array(
				'class' => 'TbButtonColumn',
				'template' => '{link}',
				'buttons' => array
					(
					'link' => array
						(
						'label' => 'Link to Attendance',
						//'icon' => 'icon-ok-circle',
						'url' => 'Yii::app()->createUrl("/m1/gEss/attendance",array("id"=>$data["id"],"month"=> $data["cmonth"]))',
						'options' => array(
							'class' => 'btn btn-mini btn-primary',
							'style' => 'width:100px'
						),
					),
				),
			),

		),
));

}
?>
 

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Personal Mailbox</h4>
</div>

<?php echo $this->renderPartial("_tabMailbox", array(), true); ?>

<br/>

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Learning Schedule</h4>
</div>

<div class="row">
    <div class="span7">

        <?php
        $this->widget('ext.EFullCalendar.EFullCalendar', array(
            // polish version available, uncomment to use it
            // 'lang'=>'pl',
            // you can create your own translation by copying locale/pl.php
            // and customizing it
            // remove to use without theme
            // this is relative path to:
            // themes/<path>
            //'themeCssFile'=>'2jui-bootstrap/jquery-ui.css',
            // raw html tags
            'htmlOptions' => array(
                // you can scale it down as well, try 80%
                'style' => 'width:100%'
            ),
            // FullCalendar's options.
            // Documentation available at
            // http://arshaw.com/fullcalendar/docs/
            'options' => array(
                'header' => array(
                    'left' => 'prev,next',
                    'center' => 'title',
                    'right' => 'today'
                ),
                //'lazyFetching'=>true,
                'events' => Yii::app()->createUrl('/m1/gEss/calendarEvents'), // action URL for dynamic events, or
            //'events'=>array() // pass array of events directly
            // event handling
            // mouseover for example
            //'eventMouseover'=>new CJavaScriptExpression("js:function(event, element) {
            //			element.qtip({
            //				content: event.title
            //			}); 
            //	 } "),
            )
        ));
        ?>

    </div>
    <div class="span2">
        Training Information block. Upcoming!!! reserved for training information
    </div>
</div>

<br/>

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Quote of the Day</h4>
</div>

<div class="row">
    <div class="span5">
        <?php $this->renderPartial("//site/_quote"); ?>
    </div>
    <div class="span4">
        <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => false,
            'headerIcon' => 'icon-fa-globe',
            'htmlHeaderOptions' => array('style' => 'background:white'),
            'htmlContentOptions' => array('style' => 'background:white'),
        ));
        ?>
        <script type="text/javascript" src="http://www.brainyquote.com/link/quotebr.js"></script>
        <small><i><a href="http://www.brainyquote.com/quotes_of_the_day.html" target="_blank">Powered by Brainy Quotes</a></i></small>

        <?php $this->endWidget(); ?>

    </div>
</div>

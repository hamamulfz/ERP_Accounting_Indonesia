<?php

if (sCompanyNews::model()->Quote) {

    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => false,
        'headerIcon' => 'icon-fa-globe',
        'htmlHeaderOptions' => array('style' => 'background:white'),
        'htmlContentOptions' => array('style' => 'background:#cbcbcb'),
    ));

    echo CHtml::tag("h4", array(), "<i class='icon-fa-quote-right'></i> Word of The Day");
    echo "<hr/>";
    echo CHtml::tag("div", array('style' => 'font-size:18px;'), CHtml::decode(sCompanyNews::model()->Quote->content));

    $this->endWidget();
}
?>

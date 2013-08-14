<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class="page-header">
    <h3>
        <i class="icon-fa-flag"></i>
        <?php
        echo "DashBoard";
        ?>
    </h3>
</div>

<div class="row">
    <div class="span2">
        <?php $this->renderPartial("_menuNavigation"); ?>
    </div>
    <div class="span10">
        <?php $this->renderPartial("_financePosition"); ?>

        <div class="row">
            <div class="span7">
                <h3>TRIAL BALANCE <small><?php echo "Period: " . Yii::app()->settings->get("System", "cCurrentPeriod") ?> </small>
                </h3>

                <?php
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'id' => 't-account-balance-grid',
                    'dataProvider' => tBalanceSheet::model()->searchTrialBalance(Yii::app()->settings->get("System", "cCurrentPeriod")),
                    'template' => '{pager}{items}{pager}',
                    'itemsCssClass' => 'table table-striped table-bordered',
                    'columns' => array(
                        array(
                            'name' => 'Account Type',
                            'type' => 'raw',
                            'value' => function ($data) {
                                return $data->account->cRoot . "<br/>" .
                                        CHtml::tag("div", array("style" => "color: #999; font-size: 11px"), $data->account->getparent->account_concat)
                                ;
                            },
                        ),
                        array(
                            'name' => 'account.account_name',
                            'type' => 'raw',
                            'value' => 'CHtml::link($data->account->account_concat,Yii::app()->createUrl("/m2/tAccount/view",array("id"=>$data->parent_id)))',
                        ),
                        array(
                            'name' => 'beginning_balance',
                            'value' => 'Yii::app()->indoFormat->number($data->beginning_balance)',
                            'htmlOptions' => array(
                                'style' => 'text-align: right; padding-right: 5px;'
                            ),
                        ),
                        array(
                            'name' => 'debit',
                            'value' => 'Yii::app()->indoFormat->number($data->debit)',
                            'htmlOptions' => array(
                                'style' => 'text-align: right; padding-right: 5px;'
                            ),
                        ),
                        array(
                            'name' => 'credit',
                            'value' => 'Yii::app()->indoFormat->number($data->credit)',
                            'htmlOptions' => array(
                                'style' => 'text-align: right; padding-right: 5px;'
                            ),
                        ),
                        array(
                            'name' => 'end_balance',
                            'value' => 'Yii::app()->indoFormat->number($data->end_balance)',
                            'htmlOptions' => array(
                                'style' => 'text-align: right; padding-right: 5px;'
                            ),
                        ),
                    //'user_remark',
                    ),
                ));
                ?>

                <br />

            </div>
            <div class="span3">
                <?php $this->renderPartial("_newJournal"); ?>
                <br/>
                <?php $this->renderPartial("_unpostedJournal"); ?>
            </div>
        </div>
    </div>
</div>


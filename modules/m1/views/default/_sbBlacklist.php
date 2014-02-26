<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-fa-reorder"></i> Black List</span>
        </li>
    </ul>
</div>

<?php
$criteria = new CDbCriteria;

$criteria->order = '(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) DESC';

$criteria1 = new CDbCriteria;
$criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(13)';
$criteria1->limit = 3;

//$criteria2 = new CDbCriteria;
//$criteria2->condition = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) < //DATE_ADD(CURDATE(),INTERVAL 30 DAY)';

$criteria->mergeWith($criteria1);
//$criteria->mergeWith($criteria2);

$total = gPerson::model()->count($criteria);
$pages = new CPagination($total);
$pages->pageSize = 50;
$pages->applyLimit($criteria);
$models = gPerson::model()->findAll($criteria);
?>

<?php
	foreach ($models as $key=>$data): ?>
    <?php if (($key + 3) % 3 == 0) {
        echo "<div class='row'>";
    }
    ?>
    
    <div class="span3">
    <div class="detail" style="margin-bottom:10px;">
        <div class="row">
            <div class="span1">
                <?php echo $data->PhotoPath; ?>
            </div>
            <div class="span2">
                <strong><?php echo $data->employee_name; ?></strong>
                <div style="font-size:10px;">
                    <?php echo (isset($data->company)) ? CHtml::tag('strong',array(),$data->company->company->name) : ''; ?>
                    <?php echo (isset($data->company)) ? $data->company->department->name : ''; ?>
                    <br/>
                    <?php echo $data->status->start_date; ?>
                    <?php echo $data->status->remark; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    if (($key+4) % 3 == 0) { 
        echo "</div>";
    }
    ?>


<?php endforeach; ?>
<br />



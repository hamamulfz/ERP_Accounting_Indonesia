<table class="appendo-gii" id="<?php echo $id ?>">
    <thead>
        <tr>
            <th>Account No</th>
            <th>Credit</th>
            <th>[ User Remark ]</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($model->account_no_id == null): ?>
            <tr>
                <td><?php echo CHtml::dropDownList('account_no_id[]', "", tAccount::item(), array('class' => 'span2')); ?>
                </td>
                <td><?php echo CHtml::textField('credit[]', '', array('class' => 'span1')); ?>
                </td>
                <td><?php echo CHtml::textField('user_remark[]', '', array('class' => 'span3')); ?>
                </td>
            </tr>
        <?php else: ?>
            <?php for ($i = 0; $i < sizeof($model->account_no_id); ++$i): ?>
                <tr>
                    <td><?php echo CHtml::dropDownList('account_no_id[]', $model->account_no_id[$i], tAccount::item(), array()); ?>
                    </td>
                    <td><?php echo CHtml::textField('credit[]', $model->credit[$i], array()); ?>
                    </td>
                    <td><?php echo CHtml::textField('user_remark[]', $model->user_remark[$i], array()); ?>
                    </td>
                </tr>
            <?php endfor; ?>
        <?php endif; ?>
    </tbody>
</table>

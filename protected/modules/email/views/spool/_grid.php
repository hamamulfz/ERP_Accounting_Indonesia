<?php
/**
 * @var $this EmailSpoolController
 * @var $emailSpool EmailSpool
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-email-module
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-email-module/master/LICENSE
 *
 * @package yii-email-module
 */

$columns = array();
$columns[] = array(
    'name' => 'id',
    'value' => 'CHtml::link($data->id, array("spool/view", "id" => $data->id))',
    'type' => 'raw',
);
$columns[] = array(
    'name' => 'transport',
);
$columns[] = array(
    'name' => 'template',
);
$columns[] = array(
    'name' => 'priority',
);
$columns[] = array(
    'name' => 'status',
);
$columns[] = array(
    'name' => 'model_name',
);
$columns[] = array(
    'name' => 'model_id',
);
$columns[] = array(
    'name' => 'to_address',
);
$columns[] = array(
    'name' => 'from_address',
);
$columns[] = array(
    'name' => 'subject',
);
$columns[] = array(
    'name' => 'sent',
);
$columns[] = array(
    'name' => 'created',
);

// grid
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'emailSpool-grid',
    'dataProvider' => $emailSpool->search(),
    'filter' => $emailSpool,
    'columns' => $columns,
));
<?php
$this->menu = array(
        array('label'=>'New SMS', 'icon'=>'plus', 'url'=>array('/sSms/create')),
        array('label'=>'New Address Book', 'icon'=>'plus', 'url'=>array('/sSms/createAddressbook')),
        array('label'=>'New Address Book Group', 'icon'=>'plus', 'url'=>array('/sSms/createAddressbookGroup')),
);

$this->menu4 = array(
    array('label' => 'Inbox', 'icon' => 'inbox', 'url' => array('/sSms/inbox')),
    array('label' => 'Sent', 'icon' => 'envelope', 'url' => array('/sSms/sent')),
	array('label'=>'Address Book', 'icon'=>'list-alt', 'url'=>array('/sSms/addressbook')),
	array('label'=>'Address Book Group', 'icon'=>'bookmark', 'url'=>array('/sSms/addressbookGroup')),
);


?>


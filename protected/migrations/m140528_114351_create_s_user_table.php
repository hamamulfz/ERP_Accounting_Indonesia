<?php

class m140528_114351_create_s_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('s_user', array(
            'id'            => 'pk',
            'username'      => 'string NOT NULL',
            'password'      => 'string',
            'salt'          => 'string',
            'default_group' => 'integer',
            'status_id'     => 'integer',
            'created_date'  => 'datetime',
            'updated_date'  => 'datetime',
            'created_by'    => 'integer',
            'updated_by'    => 'integer',
            'last_login'    => 'datetime',
            'sso_id'        => 'integer',
            'photo_path'    => 'string'
        ));
	}

	public function down()
	{
        $this->dropTable('s_user');
	}
	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}

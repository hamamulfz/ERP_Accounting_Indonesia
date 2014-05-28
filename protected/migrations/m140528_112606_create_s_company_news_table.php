<?php

class m140528_112606_create_s_company_news_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('s_company_news', array(
            'id'           => 'pk',
            'title'        => 'string NOT NULL',
            'content'      => 'text',
            'publish_date' => 'datetime',
            'category_id'  => 'integer',
            'priority_id'  => 'integer',
            'approved_id'  => 'integer',
            'created_date' => 'datetime',
            'updated_date' => 'datetime',
            'created_by'   => 'integer',
            'updated_by'   => 'integer',
            'tags'         => 'text',
            'publish_date' => 'datetime',
            'expire_date'  => 'datetime'
        ));
	}

	public function down()
	{
        $this->dropTable('s_company_news');
	}

    /*
    // implement safeUp/safeDown instead if transaction is needed
	public function safeUp()
    {
	}

	public function safeDown()
    {
    }
    */

}

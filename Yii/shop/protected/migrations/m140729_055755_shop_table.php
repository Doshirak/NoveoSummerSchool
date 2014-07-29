<?php

class m140729_055755_shop_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('Category', array(
            'id' => 'pk',
            'name' => 'string NOT NULL'));
        $this->createTable('Item', array(
            'id' => 'INT PRIMARY KEY',
            'name' => 'VARCHAR(256) NOT NULL',
            'price' => 'INT NOT NULL',
            'categoryId' => 'INT',
            'FOREIGN KEY (categoryId) REFERENCES Category (id)'
        ));
        $this->createTable('User', array(
           'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
           'firstName' => 'VARCHAR(256) NOT NULL',
           'lastName' => 'VARCHAR(256) NOT NULL',
           'password' => 'VARCHAR(256) NOT NULL',
           'username' => 'VARCHAR(256) NOT NULL',
           'email' => 'VARCHAR(256) NOT NULL'
        ));
	}

	public function down()
	{
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
<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog4 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'mail' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE
			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '32',
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('customers');
	}

	public function down()
	{
		$this->dbforge->drop_table('customers');
	}
}
<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog3 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
                'constraint' => 4,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'name_en' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'name_ru' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('categories');
	}

	public function down()
	{
		$this->dbforge->drop_table('categories');
	}
}
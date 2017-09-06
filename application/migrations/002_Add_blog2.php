<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog2
 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'catid' => array(
				'type' => 'INT',
				'constraint' => 4,
				'null' => TRUE
			),
			'title_en' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'title_ru' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => 6,
				'null' => TRUE
			),
			'author_en' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE
			),
			'author_ru' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('books');
	}

	public function down()
	{
		$this->dbforge->drop_table('books');
	}
}
<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog6 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'order_id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'null' => TRUE
			),
			'book_id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'null' => TRUE
			),
			'quantity' => array(
				'type' => 'INT',
				'constraint' => 2,
				'null' => TRUE
			)
		));

		$this->dbforge->create_table('order_items');
	}

	public function down()
	{
		$this->dbforge->drop_table('order_items');
	}
}
<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog5 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'customer_id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'null' => TRUE
			),
			'time' => array(
		        'type' => 'TIMESTAMP', 
		        'CURRENT_TIMESTAMP' => true
    		),
			'sum' => array(
				'type' => 'INT',
				'constraint' => 8,
				'null' => TRUE
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '0'
			)
		));
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('orders');
	}

	public function down()
	{
		$this->dbforge->drop_table('orders');
	}
}
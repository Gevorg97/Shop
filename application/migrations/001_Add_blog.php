<?php
defined('BASEPATH') OR exit('Доступ к скриптам запрещен.');

class Migration_Add_blog extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'login' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '32',
				'null' => TRUE
			)
		));

		$this->dbforge->create_table('admin');
		$data = array(
            array('login' => 'gev',
            'password' => 'g970521')
         );
         //$this->db->insert('user_group', $data); I tried both
         $this->db->insert_batch('admin', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('admin');
	}
}
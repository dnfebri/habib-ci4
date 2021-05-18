<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HbbTransactions extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> true,
				'auto_increment' 	=> true,
			],
			'code_transaction'  => [
				'type'       			=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'full_name'       	=> [
				'type'       			=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'email' 						=> [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'street' 						=> [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'telepon' 					=> [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '18',
			],
			'zip_code'    			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
			],
			'detail_aqiqah' 		=> [
				'type' 						=> 'TEXT',
			],
			'detail_qurban' 		=> [
				'type' 						=> 'TEXT',
			],
			't_item'    				=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
			],
			'jml_total'    			=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
			],
			'status_transaction' => [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'note_transaction' 	=> [
				'type' 						=> 'TEXT',
				'null' 						=> true,
			],
			'created_at' 				=> [
				'type' 						=> 'DATETIME',
				'null'						=> true
			],
			'updated_at' 				=> [
				'type' 						=> 'DATETIME',
				'null'						=> true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('code_transaction', true);
		$this->forge->createTable('hbb_transactions');
	}

	public function down()
	{
		$this->forge->dropTable('hbb_transactions');
	}
}

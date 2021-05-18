<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HbbConfirmation extends Migration
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
			'transaction_id'    => [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
			],
			'nominal'    				=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
			],
			'image'  						=> [
				'type'       			=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'note'  						=> [
				'type'       			=> 'VARCHAR',
				'constraint' 			=> '255',
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
		$this->forge->createTable('hbb_confirmation');
	}

	public function down()
	{
		$this->forge->dropTable('hbb_confirmation');
	}
}

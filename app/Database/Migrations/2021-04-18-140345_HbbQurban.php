<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlog extends Migration
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
			'produk_type'       => [
				'type'       			=> 'INT',
				'constraint' 			=> 1,
			],
			'slug' 							=> [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'nama_produk' 			=> [
				'type' 						=> 'VARCHAR',
				'constraint' 			=> '255',
			],
			'deskripsi' 				=> [
				'type' 						=> 'TEXT',
			],
			'harga'    					=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> true,
			],
			'img' 							=> [
				'type' 						=> 'VARCHAR',
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
		$this->forge->createTable('hbb_qurban');
	}

	public function down()
	{
		$this->forge->dropTable('hbb_qurban');
	}
}

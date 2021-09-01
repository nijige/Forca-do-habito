<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaUsuarios extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'nome'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
			],

			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
		],

		    'telefone'       => [
			  'type'       => 'VARCHAR',
			   'constraint' => '50',
	    ],
		
			
	]);

	$this->forge->addPrimaryKey('id', true);
	$this->forge->createTable('usuarios');


	}

	public function down()
	{
		$this->forge->dropTable('usuarios');
	}
}

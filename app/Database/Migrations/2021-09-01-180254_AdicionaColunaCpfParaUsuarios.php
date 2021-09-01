<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaCpfParaUsuarios extends Migration
{
	public function up(){

	$field = [
		 'cpf' => ['type' => 'VARCHAR',
		 'constraint' => '20',
		 'default' =>false,

		
	 	],
	];
	

	$this->forge->addColumn('usuarios',$field);
}

public function down()
{
	$this->forge->dropColumn('usuarios','cpf');
}
}

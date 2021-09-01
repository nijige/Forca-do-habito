<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaAtivoParaUsuarios extends Migration
{
	public function up()
	{
		$field = [
			'ativo' => ['type' => 'BOOLEAN',
			'null' => false,
			'default' =>false,
			
		        ],
		];
		

		$this->forge->addColumn('usuarios',$field);
	}

	public function down()
	{
		$this->forge->dropColumn('usuarios','ativo');
	}
}

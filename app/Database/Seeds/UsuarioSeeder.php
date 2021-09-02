<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
	public function run()
	{
		$usuarioModel = new \App\Models\UsuarioModel;
		$usuario = [
			'nome'=> 'Geane Ferreira',
			'email' =>'admin@gmail.com',
			'cpf' =>'202.855.530-03',
			'telefone' => 7777-7777,

		];

		$usuarioModel->protect(false)->insert($usuario);

		$usuario = [
			'nome'=> 'Nijige',
			'email' =>'nijige@gmail.com',
			'cpf' =>'680.467.710-23',
			'telefone' => 9999-9999,

		];

		$usuarioModel->protect(false)->insert($usuario);
         
		dd($usuarioModel->errors());

		
	}
}







<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController{

	private $usuarioModel;

	public function __construct()	{

		$this->usuarioModel = new \App\Models\UsuarioModel();
		
	}


	public function index()	{

		$data = [
			'titulo' => 'Listando os usuarios',
			 'usuarios' => $this->usuarioModel->findAll()


		];

		return view('Admin/Usuarios/index',$data);
	   
	}
}

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

		return view('Admin/Usuarios/index', $data);


	   
	}

	public function procurar (){


		if(! $this->request->isAJAX()){

			exit('Página não encontrada');


		}

		$usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));
		$retorno = [];

		foreach ($usuarios as $usuario){
			$data['id' ] = $usuario->id;
			$data[ 'value'] = $usuario->nome;


			$retorno[] = $data;

		}

		return $this->response->setJSON($retorno);
		
	}



	public function show ($id = null ){

		$usuario = $this->buscarUsuarioOu404($id);
		$data =[
			'titulo' =>" Detalhando a categoria $usuario->nome",
			'usuarios' => $usuario,
		];

		return view('Admin/Usuarios/show',$data);

	}


	private function buscarUsuarioOu404(int $id= null){
		if(!$id || !$usuario = $this->usuarioModel->withDeleted(true)->where('id',$id)->first()){

			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos a categoria $usuario");
		}


		return $usuario;
		
	}


	
}
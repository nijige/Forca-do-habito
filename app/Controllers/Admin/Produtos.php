<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Produto;

class Produtos extends BaseController
{

	private $produtoModel;

	public function __construct(){

		$this->produtoModel = new \App\Models\ProdutoModel();
		
	}


	public function index(){

		$data = [
			'titulo' => 'Listando os produtos ',
			'produtos' => $this->produtoModel->select('produtos')
		]
	    


	}
}

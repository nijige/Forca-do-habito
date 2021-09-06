<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Categorias extends BaseController
{

	private $categoriaModel;

	public function __construct()
	{
		$this->categoriaModel = new \App\Models\CategoriaModel();
	}
	public function index()
	{
		$data = [
			'titulo' => 'Listando as categorias',
			'categorias'=>$this->categoriaModel->withDeleted(true)->paginate(10),
			'pager' => $this->categoriaModel->pager

		];

		dd($data['categorias']);

		return view('Admin/Categorias/index',$data);
	}
}

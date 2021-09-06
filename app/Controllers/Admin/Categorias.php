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


		return view('Admin/Categorias/index',$data);
	}

	public function procurar (){




		if(! $this->request->isAJAX()){

			exit('Página não encontrada');


		}

		$categorias = $this->categoriaModel->procurar($this->request->getGet('term'));
		$retorno = [];

		foreach ($categorias as $categoria){
			$data['id' ] = $categoria->id;
			$data[ 'value'] = $categoria->nome;


			$retorno[] = $data;

		}

		return $this->response->setJSON($retorno);
		
	
	
	
	
	
	
	}

	public function show ($id = null ){

		$categoria = $this->buscarCategoriaOu404($id);
		$data =[
			'titulo' =>" Detalhando a categoria $categoria->nome",
			'categoria' => $categoria,
		];

		return view('Admin/Categorias/show',$data);

	}


	public function editar($id = null){
		$categoria = $this->buscarCategoriaOu404($id);

		if($categoria->deletado_em != null){

			return redirect()->back()->with('inf'," A categoria $categoria->nome encontra-se excluida.Portanto náo é possível editá-la.");
		}

		$data = [
			'titulo' => "Editando a categorias $categoria->nome",
			'categoria' =>$categoria,

		];

		return view('Admin/Categorias/editar',$data);

		

	
	}


	public function atualizar($id = null){

		if($this->request->getMethod()==='post'){
			$categoria = $this->buscarCategoriaOu404($id);
			
			if($categoria->deletado_em != null){
				return redirect()->back()->with('info', 'A categoria $categoria->nome encontra-se excluido.Portanto, não é possível editá-lo');
			}

			$categoria->fill($this->request->getPost());

			if(!$categoria->hasChanged()){
				return redirect()->back()->with('info','Não dados para atualizar');
			}

			if($this->categoriaModel->save($categoria)){
				return redirect()->to(site_url("admin/categorias/show/$categoria->id"))
				                 ->with('sucesso',"Categoria $categoria->nome atualizado sucesso");

			}else{
				return redirect()->back()
				                 ->with('errors_model',$this->categoriaModel->errors())
								 ->withInput();


			}

		}else{
			return redirect()->back();
		}

	}


	private function buscarCategoriaOu404(int $id= null){
		if(!$id || !$categoria = $this->categoriaModel->withDeleted(true)->where('id',$id)->first()){

			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos a categoria $categoria");
		}


		return $categoria;
		
	}


	
}

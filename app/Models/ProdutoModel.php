<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
	protected $table                = 'produtos';
	protected $returnType           = 'App\Entities\Produto';
	protected $useSoftDeletes       = true;
	protected $allowedFields        = [
	
	'categoria_id',
	'nome',
	'slug',
	'ingredientes',
	'ativo',
	'imagem',
	
	
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'criado_em';
	protected $updatedField         = 'atualizado_em';
	protected $deletedField         = 'deletado_em';

	// Validation


	protected $validationRules =[
		'nome' => 'required|min_length[2]|max_length[120]is_unique[produto.nome]',
		'categoria_id' => 'required|integer',
		'ingredientes' => 'required|min_length[10]|max_length[1000]',
	];


	protected $validationMessages =[

		'nome' => [

			'required' =>'O campo Nome é Obrigatório',
			'is_unique' => 'Esse produto já existe',
		],

		'categoria_id' => [

			'required' =>'O campo Categoria é Obrigatório',
		],

	];
	protected $beforeInsert = ['criarSlug'];
	protected $beforeUpdate = ['criarSlug'];


	protected function criarSlug(array $data){
		if(isset($data['data']['nome'])){
			$data['data']['slug'] = mb_url_title($data['data']['nome'],'-',TRUE);
		}

		return $data;
	}

	public function procurar($term){

		if($term === null){

			return [];
		}

		return $this->select('id ,nome')

		               ->like('nome', $term)
					   ->get()
					   ->get()
					   ->getResult();


	}

	public function desfazerExclusão(int $id){
		    return $this->protect(false)
			            ->where('id',$id)
						->set('deletado_em',null)
						->update();
	}



}

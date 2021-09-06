<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
	protected $table                = 'categorias';
	protected $primaryKey           = 'id';
	protected $returnType           = 'App\Entities\Categorias';
	protected $useSoftDelete       = true;
	protected $allowedFields        = ['nome', 'ativo','slug'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'criado_em';
	protected $updatedField         = 'atualizado_em';
	protected $deletedField         = 'deletado_em';

	// Validation
	protected $validationRules      = [
		'nome' =>'requiered|min_length[2]max_length[120]|is_unique[categorias.nome]',
	];
	protected $validationMessages   = [

		'nome' =>[
			'required' => 'O campo Nome é obrigatório',
		],
	];

	protected $beforeInsert = ['criaSlug'];
	protected $beforeUpdate = ['criaSlug'];

	protected function hashPassword(array $data){

		if(isset($data['data']['nome'])){

			$data['data']['slug'] -mb_url_title($data['data']['nome'],'-',TRUE);



		}
		return $data;


	}

	public function procurar($term){

		if($term ===null){
			return [];
		}

		return $this->select('id,nome')
		                ->like('nome',$term)
						->withDeleted(true)
						->get()
						->getResult();

	}






}

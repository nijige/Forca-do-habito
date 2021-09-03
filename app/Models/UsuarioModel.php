<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
	protected $table                = 'usuarios';
	protected $returnType           = 'object';
	protected $useSoftDelete = true;
	protected $allowedFields        = ['nome','email','telefone'];



	public function procurar($term){

		if($term === null){

			return [];
		}

		return $this->select('id ,nome')

		               ->like('nome', $term)
					   ->get()
					   ->getResult();


	}

	


}

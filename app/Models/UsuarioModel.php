<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
	protected $table                = 'usuarios';
	protected $returnType           = 'array';
	protected $useSoftDelete = true;
	protected $allowedFields        = ['nome','email','telefone'];

	


}

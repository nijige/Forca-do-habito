<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Categorias extends Entity
{
	protected $dates   = [
		'criado_em',
		'atualizado_em',
		'deletado_em',
	];
}

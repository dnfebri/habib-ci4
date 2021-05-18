<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'hbb_transactions';
	// protected $primaryKey           = 'id';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	// protected $returnType           = 'array';
	// protected $useSoftDelete        = false;
	// protected $protectFields        = true;
	protected $allowedFields        = [
		'code_transaction',
		'full_name',
		'email',
		'street',
		'telepon',
		'zip_code',
		'detail_aqiqah',
		'detail_qurban',
		't_item',
		'jml_total',
		'status_transaction',
		'note_transaction',
	];

	// Dates
	protected $useTimestamps        = true;
	// protected $dateFormat           = 'datetime';
	// protected $createdField         = 'created_at';
	// protected $updatedField         = 'updated_at';
	// protected $deletedField         = 'deleted_at';

	// // Validation
	// protected $validationRules      = [];
	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	public function getTransaction($code = NULL)
	{
		if ($code === NULL) {
			return $this->orderBy('id', 'desc')->findAll();
		}

		return $this->where('code_transaction', $code)->first();
	}
}

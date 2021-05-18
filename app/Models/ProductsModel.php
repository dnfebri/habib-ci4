<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
	protected $table = 'hbb_products';

	protected $allowedFields = ['produk_type', 'slug', 'nama_produk',  'deskripsi', 'harga', 'img'];

	protected $useTimestamps = true;

	public function getProduk($slug = NULL)
	{
		if ($slug === NULL) {
			return $this->where('produk_type !=', 1)->orderBy('id', 'desc')->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}

	public function getProdukAqiqah($slug = 1)
	{
		if ($slug == 1) {
			return $this->where(['produk_type' => $slug])->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}
}

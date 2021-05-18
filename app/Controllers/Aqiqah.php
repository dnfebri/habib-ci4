<?php

namespace App\Controllers;

use \App\Models\ProductsModel;
use \App\Models\AqiqahModel;

class Aqiqah extends BaseController
{
  protected $productsModel;
  // protected $aqiqahModel;
  // protected $request;
  public function __construct()
  {
    $this->productsModel = new ProductsModel();
    // $this->aqiqahModel = new AqiqahModel();
    // $this->request = new RequestInterface();
  }

  public function index()
  {
    $data = [
      'nav' => 'Aqiqah',
      'title' => 'Habid | Aqiqah',
      'aqiqah' => $this->productsModel->getProdukAqiqah()
    ];
    return view('admin/aqiqah/index', $data);
  }

  public function detail($slug)
  {

    $data = [
      'nav' => 'Aqiqah',
      'title' => 'Detail',
      'aqiqah' => $this->productsModel->getProdukAqiqah($slug)
    ];

    // jika Produk tidak ditemukan
    if (empty($data['aqiqah'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Produk ' . $slug . ' tidak ditemukan.');
    }

    return view('admin/aqiqah/detail', $data);
  }
}

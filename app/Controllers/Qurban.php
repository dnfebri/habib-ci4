<?php

namespace App\Controllers;

use \App\Models\ProductsModel;
// use \App\Models\QurbanModel;
use \App\Models\ProductstypeModel;

class Qurban extends BaseController
{
  protected $productsModel;
  // protected $qurbanModel;
  protected $qurban_type;
  public function __construct()
  {
    $this->productsModel = new ProductsModel();
    // $this->qurbanModel = new QurbanModel();
    $this->qurban_type = new ProductstypeModel();
  }

  public function index()
  {
    $data = [
      'nav' => 'Qurban',
      'title' => 'Habid | Page Qurban',
      'qurban_type' => $this->qurban_type->where('id !=', 1)->findAll(),
      'qurban' => $this->productsModel->getProduk()
    ];
    // dd($data['qurban_type']);
    return view('admin/qurban/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'nav' => 'Qurban',
      'title' => 'Habid | Detail Qurban',
      'qurban' => $this->productsModel->getProduk($slug)
    ];
    return view('admin/qurban/detail', $data);
  }
}

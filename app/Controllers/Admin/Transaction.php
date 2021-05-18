<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \App\Models\TransactionModel;

class Transaction extends BaseController
{
  protected $transaction;
  public function __construct()
  {
    $this->transaction = new TransactionModel();
  }

  public function index()
  {
    $data = [
      'nav' => 'Pesanan',
      'title' => 'Data Pesanan',
      'transaction' => $this->transaction->getTransaction()
    ];
    return view('admin/pesanan/index', $data);
  }

  public function detail($code)
  {
    // d($this->transaction->getTransaction($code));

    // Memanggil Model yang dibutuhkan hanya di method ini
    $confirmation = new \App\Models\ConfirmationModel();
    $detailConfirm = $confirmation->where(['transaction_id' => $code])->orderBy('id', 'desc')->findAll();

    $data = [
      'nav' => 'Pesanan',
      'title' => 'Data Pesanan',
      'transaction' => $this->transaction->getTransaction($code),
      'confirmation' => $detailConfirm
    ];
    return view('admin/pesanan/detail', $data);
  }

  public function confirm($id)
  {
    $this->transaction->save([
      'id'                  => $id,
      'status_transaction'   => $this->request->getVar('status_transaction')
    ]);

    session()->setFlashdata('pesan', 'Status transaksi berhasil diubah menjadi ' . $this->request->getVar('status_transaction'));
    return redirect()->to('/admin/transaction');
    // d($this->request->getVar());
  }

  public function confirmview($id)
  {
    // Memanggil Model yang dibutuhkan hanya di method ini
    $confirmation = new \App\Models\ConfirmationModel();
    $detailConfirm = $confirmation->where('id', $id)->first();
    $data = [
      'nav' => 'Pesanan',
      'confirm' => $detailConfirm
    ];
    return view('admin/pesanan/confirmview', $data);

    echo "data";
  }
}

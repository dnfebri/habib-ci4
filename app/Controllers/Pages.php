<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'nav' => 'Home',
            'title' => 'Habid | Hasana Alam Batam Indah Bertuan'
        ];
        return view('pages/index', $data);
    }

    public function filter($id = NULL)
    {
        $qurban = new \App\Models\ProductsModel();

        if ($id != NULL) {
            $dataFilter = $qurban->where('produk_type', $id)->findAll();
        } else {
            $dataFilter = $qurban->where('produk_type !=', 1)->findAll();
        }

        $data = [
            'nav' => 'Qurban',
            'qurban' => $dataFilter
        ];
        return view('filterqurban', $data);
    }

    public function about()
    {
        $data = [
            'nav' => 'Kontak Kami',
            'title' => 'Abaut Me'
        ];
        echo view('pages/about', $data);
    }

    public function keranjang()
    {
        $data = [
            'nav' => NULL,
            'title' => 'Keranjang'
        ];
        echo view('pages/keranjang', $data);
    }

    public function pesanan()
    {
        session()->remove('request');
        $codeTransaction = $this->request->getVar('code_transaction');

        // Memanggil Model yang dibutuhkan hanya di method ini
        $transaction = new \App\Models\TransactionModel();

        $data = [
            'nav' => NULL,
            'title' => 'Pesanan',
            'pesanan' => $transaction->where('code_transaction', $codeTransaction)->first()
        ];
        return view('transaction/terkirim', $data);
        // dd($detail);
    }
}

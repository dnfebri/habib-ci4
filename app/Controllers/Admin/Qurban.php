<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \App\Models\ProductsModel;
use \App\Models\ProductstypeModel;

class Qurban extends BaseController
{
  protected $productsModel;
  protected $qurban_type;

  public function __construct()
  {
    $this->productsModel = new ProductsModel();
    $this->qurban_type = new ProductstypeModel();
  }

  public function index()
  {
    // // cara konek db tanpa model
    // $db = \Config\Database::connect();
    // $aqiqah = $db->query("SELECT * FROM hbb_aqiqah");
    // // dd($aqiqah);
    // foreach ($aqiqah->getResultArray() as $row) {
    //     d($row);
    // }
    // $aqiqah = $this->aqiqahModel->findAll();

    $data = [
      'nav' => 'Qurban',
      'title' => 'Habid | Admin - Qurban',
      'qurban_type' => $this->qurban_type->where('id !=', 1)->findAll(),
      'qurban' => $this->productsModel->getProduk()
    ];
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

  public function tambah()
  {
    // Memanggil Model yang dibutuhkan hanya di method ini
    // $qurban_type = new \App\Models\Qurban_typeModel();

    $data = [
      'nav' => 'Qurban',
      'title' => 'Tambah Data Aqiqah',
      'qurban_type' => $this->qurban_type->where('id !=', 1)->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/qurban/tambah', $data);
  }

  public function save()
  {
    // === Validation ===
    $validationform = [
      'produk_type' => 'required',
      'nama_produk' =>
      [
        'rules' => 'required|is_unique[hbb_products.nama_produk]',
        'errors' =>
        [
          'required' => 'Nama Produk harus di isi.',
          'is_unique' => '{field} Nama produk sudah ada.'
        ]
      ],
      'deskripsi' => 'required',
      'harga' => 'required',
      'img' =>
      [
        'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
        'errors' =>
        [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ];
    if (!$this->validate($validationform)) {
      // panggil Validation
      // $valitation = \Config\Services::validation();
      // ridirect tidak bida mengirim $data[] harus menggunakan caining
      // return redirect()->to('/admin/aqiqah/tambah')->withInput()->with('validation', $valitation);
      return redirect()->to('/admin/qurban/tambah')->withInput();
    }

    // membuat nama slug dan menghilangkan sepasi string
    $slug = url_title($this->request->getVar('nama_produk'), '-', true);

    // ambil gambar
    $uploadimg = $this->request->getFile('img');

    // Cek apakah ada gambar yang di upload
    if ($uploadimg->getError() == 4) {
      $namaimg = "default.png";
    } else {
      // ambil extesi gambar
      $extensi = explode(".", $uploadimg->getName());
      $extensi = end($extensi);

      // buat nama gambar
      $namaimg = $slug . "." . $extensi;

      // upload gambar ke folder
      $uploadimg->move('img/produk', $namaimg);
    }

    $this->productsModel->save([
      'produk_type' => $this->request->getVar('produk_type'),
      'slug' => $slug,
      'nama_produk' => $this->request->getVar('nama_produk'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'harga' => $this->request->getVar('harga'),
      'img' => $namaimg
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

    return redirect()->to('/admin/qurban');
  }

  public function hapus($id)
  {
    // cari gambar berdasarkan id
    $qurban = $this->productsModel->find($id);

    // cek gambar bukan default.png
    if ($qurban['img'] != 'default.png') {
      // Hapus gambar
      unlink('img/produk/' . $qurban['img']);
    }

    $this->productsModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    return redirect()->to('/admin/qurban');
  }

  public function edit($slug)
  {
    // Memanggil Model yang dibuhkan hanya do method ini
    $produk_type = new \App\Models\ProductstypeModel();
    $data = [
      'nav' => 'Qurban',
      'title' => 'Edit Data Qurban',
      'validation' => \Config\Services::validation(),
      'qurban_type' => $produk_type->where('id !=', 1)->findAll(),
      'qurban' => $this->productsModel->getProduk($slug)
    ];

    return view('admin/qurban/edit', $data);
  }

  public function update($id)
  {
    // cek Nama Produk
    $produkLama = $this->productsModel->getProduk($this->request->getVar('slug'));
    if ($produkLama['nama_produk'] == $this->request->getVar('nama_produk')) {
      $role_nama = 'required';
    } else {
      $role_nama = 'required|is_unique[hbb_product.nama_produk]';
    }
    // === Validation ===
    $validationform = [
      'produk_type' => 'required',
      'nama_produk' =>
      [
        'rules' => $role_nama,
        'errors' =>
        [
          'required' => 'Nama Produk harus di isi.',
          'is_unique' => '{field} Nama produk sudah ada.'
        ]
      ],
      'deskripsi' => 'required',
      'harga' => 'required',
      'img' =>
      [
        'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
        'errors' =>
        [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ];
    if (!$this->validate($validationform)) {
      // panggil Validation
      // $valitation = \Config\Services::validation();
      // ridirect tidak bida mengirim $data[] harus menggunakan caining
      // return redirect()->to('/admin/qurban/tambah')->withInput()->with('validation', $valitation);
      return redirect()->to('/admin/qurban/edit/' . $this->request->getVar('slug'))->withInput();
    }

    // untuk menghilangkan sepasi string
    $slug = url_title($this->request->getVar('nama_produk'), '-', true);

    // ambil gambar
    $uploadimg = $this->request->getFile('img');

    // Cek apakah ada gambar yang di upload
    if ($uploadimg->getError() == 4) {
      $namaimg = $this->request->getVar('imgLama');
    } else {
      // hapus gambar lama
      // cek gambar bukan default.png
      if ($this->request->getVar('imgLama') != 'default.png') {
        // Hapus gambar
        unlink('img/produk/' . $this->request->getVar('imgLama'));
      }

      // ambil extesi gambar
      $extensi = explode(".", $uploadimg->getName());
      $extensi = end($extensi);

      // buat nama gambar
      $namaimg = $slug . "." . $extensi;

      // upload gambar ke folder
      $uploadimg->move('img/produk', $namaimg);
    }

    $this->productsModel->save([
      'id' => $id,
      'produk_type' => $this->request->getVar('produk_type'),
      'slug' => $slug,
      'nama_produk' => $this->request->getVar('nama_produk'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'harga' => $this->request->getVar('harga'),
      'img' => $namaimg
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Diubah');

    return redirect()->to('/admin/qurban');
  }
}

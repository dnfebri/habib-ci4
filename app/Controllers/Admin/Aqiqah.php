<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \App\Models\ProductsModel;
// use \App\Models\ProductsTypeModel;
// use \App\Models\AqiqahModel;
// use CodeIgniter\HTTP\RequestInterface;

class Aqiqah extends BaseController
{
  protected $productsModel;
  // protected $productsTypeModel;
  // protected $aqiqahModel;
  // protected $request;
  public function __construct()
  {
    $this->productsModel = new ProductsModel();
    // $this->productsTypeModel = new ProductsTypeModel();
    // $this->aqiqahModel = new AqiqahModel();
    // $this->request = new RequestInterface();
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
      'title' => 'Habid | Admin - Aqiqah',
      'aqiqah' => $this->productsModel->getProdukAqiqah()
    ];
    return view('admin/aqiqah/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail',
      'aqiqah' => $this->productsModel->getProdukAqiqah($slug)
    ];

    // jika Produk tidak ditemukan
    if (empty($data['aqiqah'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Produk ' . $slug . ' tidak ditemukan.');
    }

    return view('admin/aqiqah/detail', $data);
  }

  public function tambah()
  {
    // Memanggil Model yang dibuhkan hanya do method ini
    // $produk_type = new \App\Models\productsTypeModel();

    $data = [
      'title' => 'Tambah Data Aqiqah',
      'validation' => \Config\Services::validation()
    ];

    return view('admin/aqiqah/tambah', $data);
  }

  public function save()
  {
    // dd($this->request);
    // === Validation ===
    $validationform = [
      'nama_produk' =>
      [
        'rules' => 'required|is_unique[hbb_products.nama_produk]',
        'errors' =>
        [
          'required' => 'Nama Produk harus di isi.',
          'is_unique' => '{field} Nama produk sudah ada.'
        ]
      ],
      // 'jumlah_porsi' => 'required',
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
      return redirect()->to('/admin/aqiqah/tambah')->withInput();
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
      'produk_type' => "1",
      'slug' => $slug,
      'nama_produk' => $this->request->getVar('nama_produk'),
      'jumlah_porsi' => $this->request->getVar('jumlah_porsi'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'harga' => $this->request->getVar('harga'),
      'img' => $namaimg
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

    return redirect()->to('/admin/aqiqah');
  }

  public function hapus($id)
  {
    // cari gambar berdasarkan id
    $aqiqah = $this->productsModel->find($id);

    // cek gambar bukan default.png
    if ($aqiqah['img'] != 'default.png') {
      // Hapus gambar
      unlink('img/produk/' . $aqiqah['img']);
    }

    $this->productsModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    return redirect()->to('/admin/aqiqah');
  }

  public function edit($slug)
  {
    // Memanggil Model yang dibuhkan hanya do method ini
    $data = [
      'title' => 'Edit Data Aqiqah',
      'validation' => \Config\Services::validation(),
      'aqiqah' => $this->productsModel->getProdukAqiqah($slug)
    ];

    return view('admin/aqiqah/edit', $data);
  }

  public function update($id)
  {
    // cek Nama Produk
    $produkLama = $this->productsModel->getProdukAqiqah($this->request->getVar('slug'));
    if ($produkLama['nama_produk'] == $this->request->getVar('nama_produk')) {
      $role_nama = 'required';
    } else {
      $role_nama = 'required|is_unique[hbb_aqiqah.nama_produk]';
    }

    // === Validation ===
    $validationform = [
      'nama_produk' => [
        'rules' => $role_nama,
        'errors' => [
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
      return redirect()->to('/admin/aqiqah/edit/' . $this->request->getVar('slug'))->withInput();
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
      'produk_type' => 1,
      'slug' => $slug,
      'nama_produk' => $this->request->getVar('nama_produk'),
      'jumlah_porsi' => $this->request->getVar('jumlah_porsi'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'harga' => $this->request->getVar('harga'),
      'img' => $namaimg
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Diubah');

    return redirect()->to('/admin/aqiqah');
  }
}

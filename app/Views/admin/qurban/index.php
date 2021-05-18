<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Qurban</h1>

      <div class="row mb-3">
        <div class="col-md-5">
          <?php if (logged_in()) : ?>
            <a href="<?= base_url(); ?>/admin/qurban/tambah" class="btn btn-primary">Tamabah Hewan Qurban</a>
          <?php endif; ?>
        </div>
        <div class="col-md-7">
          <div class="row justify-content-end">
            <div class="col-md-3 text-end">
              <h4 class="d-inline">Filter</h4>
            </div>
            <div class="col-md-4">
              <!-- <select class="form-select" id="filter" onchange="filter()"> -->
              <select class="form-select" id="filter">
                <option value="" selected>All</option>
                <?php foreach ($qurban_type as $qt) : ?>
                  <option value="<?= $qt['id']; ?>"><?= $qt['produk_type']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="row justify-content-center" id="content" data-url="<?= base_url(); ?>/pages/filter/">
        <?php foreach ($qurban as $q) : ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center" style="width: 18rem; height: 400px;">
              <div class="row align-items-center" style="height: 75%;">
                <img src="<?= base_url(); ?>/img/produk/<?= $q['img']; ?>" class="card-img-top w-75 rounded mx-auto d-block" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $q['nama_produk']; ?></h5>
                <p class="card-text">Rp. <?= number_format($q['harga'], 2, ',', '.'); ?></p>
                <a href="<?= base_url(); ?><?= (logged_in()) ? '/admin/qurban/detail/' . $q['slug'] : '/qurban/detail/' . $q['slug']; ?>" class="btn btn-primary">Lihat Ditail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
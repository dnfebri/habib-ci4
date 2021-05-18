<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Aqiqah</h1>

      <div class="mb-3">
        <?php if (logged_in()) : ?>
          <a href="<?= base_url(); ?>/admin/aqiqah/tambah" class="btn btn-primary">Tamabah Menu Aqiqah</a>
        <?php endif; ?>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="row justify-content-center">
        <?php foreach ($aqiqah as $a) : ?>
          <div class="col-lg-4 mb-3">
            <div class="card text-center" style="width: 18rem; height: 400px;">
              <div class="row align-items-center" style="height: 75%;">
                <img src="<?= base_url(); ?>/img/produk/<?= $a['img']; ?>" class="card-img-top w-75 rounded mx-auto d-block" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $a['nama_produk']; ?></h5>
                <p class="card-text">Rp. <?= number_format($a['harga'], 2, ',', '.'); ?></p>
                <a href="<?= base_url(); ?><?= (logged_in()) ? '/admin/aqiqah/' . $a['slug'] : '/aqiqah/detail/' . $a['slug']; ?>" class="btn btn-primary">Lihat Ditail</a>
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
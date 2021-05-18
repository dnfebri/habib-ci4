<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Dashboard Admin Qurban Detail</h1>

      <div class="row mb-3" id="detail-produk">
        <div class="col-md-5" style="height: 400px;">
          <img src="<?= base_url(); ?>/img/produk/<?= $qurban['img']; ?>" class="img-thumbnail" alt="<?= $qurban['nama_produk']; ?>">
        </div>
        <div class="col">
          <h3><?= $qurban['nama_produk']; ?></h3>
          <input type="hidden" name="slug" id="slug" value="<?= $qurban['slug']; ?>">
          <input type="hidden" name="slug" id="harga" value="<?= $qurban['harga']; ?>">
          <h6><?= $qurban['deskripsi']; ?></h6>
          <h6>Harga : Rp. <?= number_format($qurban['harga'], 2, ',', '.'); ?></h6>
          <div class="row">
            <div class="col">

            </div>
            <div class="col">

              <?php if (!logged_in()) : ?>
                <a href="<?= base_url(); ?>/pages/keranjang" class="btn btn-success" id="tambah-keranjang-qurban">Pesan</a>
                <!-- Form teknik spoofing delete -->
                <button type="submit" class="btn btn-info" id="tambah-keranjang-qurban">Tambah kekeranjang</button>
              <?php endif; ?>

              <?php if (logged_in()) : ?>
                <a href="<?= base_url(); ?>/admin/qurban/edit/<?= $qurban['slug']; ?>" class="btn btn-warning">Edit</a>
                <!-- Form teknik spoofing delete -->
                <form action="<?= base_url(); ?>/admin/qurban/hapus/<?= $qurban['id']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
              <?php endif; ?>

            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="<?= base_url(); ?><?= (logged_in()) ? '/admin/qurban/' : '/qurban'; ?>" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Kembali ke menu qurban</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
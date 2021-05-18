<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Dashboard Admin Aqiqah Detail</h1>

      <div class="row mb-3" id="detail-produk">
        <div class="col-lg-5" style="height: 400px;">
          <img src="<?= base_url(); ?>/img/produk/<?= $aqiqah['img']; ?>" class="img-thumbnail" alt="<?= $aqiqah['nama_produk']; ?>">
        </div>
        <div class="col">
          <h3><?= $aqiqah['nama_produk']; ?></h3>
          <input type="hidden" name="slug" id="slug" value="<?= $aqiqah['slug']; ?>">
          <input type="hidden" name="slug" id="harga" value="<?= $aqiqah['harga']; ?>">
          <h6><?= $aqiqah['deskripsi']; ?></h6>
          <h6>Harga : Rp. <?= number_format($aqiqah['harga'], 2, ',', '.'); ?></h6>
          <div class="row">
            <div class="col">

            </div>
            <div class="col">

              <?php if (!logged_in()) : ?>
                <a href="<?= base_url(); ?>/pages/keranjang" class="btn btn-success" id="tambah-keranjang-aqiqah">Pesan</a>
                <!-- Form teknik spoofing delete -->
                <button type="submit" class="btn btn-info" id="tambah-keranjang-aqiqah">Tambah kekeranjang</button>
                <!-- <a href="<?= base_url(); ?>/admin/aqiqah/hapus/<?= $aqiqah['id']; ?>" class="btn btn-danger">Hapus</a> -->
              <?php endif; ?>

              <?php if (logged_in()) : ?>
                <a href="<?= base_url(); ?>/admin/aqiqah/edit/<?= $aqiqah['slug']; ?>" class="btn btn-warning">Edit</a>
                <!-- Form teknik spoofing delete -->
                <form action="<?= base_url(); ?>/admin/aqiqah/<?= $aqiqah['id']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
              <?php endif; ?>

            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="<?= base_url(); ?><?= (logged_in()) ? '/admin/aqiqah/' : '/aqiqah'; ?>" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Kembali ke menu aqiqah</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
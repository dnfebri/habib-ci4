<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Admin Aqiqah Tambah</h1>

      <div class="row mt-3">
        <div class="col-lg-10">
          <form action="<?= base_url(); ?>/admin/aqiqah/save" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!-- <input type="hidden" id="pruduk_type" name="pruduk_type" value="1"> -->
            <div class="mb-3 row">
              <label for="nama_produk" class="col-lg-2 col-form-label">Nama Produk</label>
              <div class="col-lg-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk'); ?>">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  <?= $validation->getError('nama_produk'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="deskripsi" class="col-lg-2 col-form-label">Deskripsi Produk</label>
              <div class="col-lg-10">
                <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  <?= $validation->getError('deskripsi'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="harga" class="col-lg-2 col-form-label">Harga Produk</label>
              <div class="col-lg-10">
                <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  <?= $validation->getError('harga'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="img" class="col-lg-2 col-form-label">img Produk</label>
              <div class="col-lg-2">
                <img src="<?= base_url(); ?>/img/produk/default.png" class="img-thumbnail img-previuw">
              </div>
              <div class="col-lg-8">
                <div class="mb-3">
                  <input class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" id="img" name="img" value="<?= old('img'); ?>" type="file" id="img" name="img" onchange="priviewImg()">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    <?= $validation->getError('img'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary col-auto">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
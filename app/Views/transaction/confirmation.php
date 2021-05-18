<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container">
  <div class="row">
    <h3 class="text-center">Konfirmasi Transaksi</h3>
    <div class="col-md-4">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Code Transasi : <?= $pesanan['code_transaction']; ?></h5>
          <p class="card-text">Nama Pemesan : <?= $pesanan['full_name']; ?></p>
          <hr>
          <p>Email : <?= $pesanan['email']; ?></p>
          <p>Jumlah Produk yang dibeli : <?= $pesanan['t_item']; ?></p>
          <p>Total yang harus dibayar : <?= $pesanan['jml_total']; ?></p>
          <p>Catatan : <?= $pesanan['note_transaction']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <form action="<?= base_url(); ?>/transaction/bayar" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <legend>Form Upload Bukti tranfer</legend>
        <div class="mb-3">
          <div class="row">
            <div class="col-md-3">
              <label for="transaction_id" class="col-form-label">Code Transaksi</label>
            </div>
            <div class="col-auto">
              <input type="hidden" name="id" value="<?= $pesanan['id']; ?>">
              <input type="text" id="transaction_id" class="form-control" name="transaction_id" value="<?= $pesanan['code_transaction']; ?>" readonly>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-md-3">
              <label for="nominal" class="col-form-label">Nominal</label>
            </div>
            <div class="col-auto">
              <input type="text" id="nominal" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" name="nominal" value="<?= old('nominal'); ?>" onkeyup="validAngka(this)">
              <div id="validationServer05Feedback" class="invalid-feedback">
                <?= $validation->getError('nominal'); ?>
              </div>
            </div>
            <div class="col-auto">
              <span id="nominal" class="form-text">
                Isi dengan angka saja tanpa titik/koma
              </span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row g-3 align-items-center">
            <div class="col-md-3">
              <label for="note" class="col-form-label">Catatan</label>
            </div>
            <div class="col">
              <textarea rows="1" type="text" id="note" class="form-control" name="note" value=""></textarea>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <label for="img" class="col-form-label">Bukti upload</label>
            </div>
            <div class="col-md-2">
              <img src="<?= base_url(); ?>/img/produk/default.png" class="img-thumbnail img-previuw">
              <!-- <input type="text" id="image" class="form-control" name="image" value=""> -->
            </div>
            <div class="col">
              <div class="mb-3">
                <input class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" type="file" id="img" name="img" onchange="priviewImg()">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  <?= $validation->getError('img'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
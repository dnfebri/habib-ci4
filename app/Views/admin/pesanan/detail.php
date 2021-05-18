<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<?php
$qurban = json_decode(json_decode($transaction['detail_qurban']));
$aqiqah = json_decode(json_decode($transaction['detail_aqiqah']));
// $qurban = json_decode($transaction['detail_qurban']);
// $aqiqah = json_decode($transaction['detail_aqiqah']);
// $qurban = json_decode($qurban);
// $aqiqah = json_decode($aqiqah);
?>

<!-- Content -->
<div class="container my-1">
  <div class="row">
    <div class="col">
      <h1 class="text-center">Detail Pesana</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Code Transasi : <?= $transaction['code_transaction']; ?></h5>
          <p class="card-text">Nama Pemesan : <?= $transaction['full_name']; ?></p>
          <p class="card-text">Status Pemesan : <?= $transaction['status_transaction']; ?></p>
          <hr>
          <p>Email : <?= $transaction['email']; ?></p>
          <p>Jumlah Produk yang dibeli : <?= $transaction['t_item']; ?></p>
          <p>Total yang harus dibayar : <?= $transaction['jml_total']; ?></p>
          <p>Catatan : <?= $transaction['note_transaction']; ?></p>
          <p class="mb-0">pesanan : </p>
          <!-- isi json pesanan -->
          <?php if ($qurban !== NULL) : ?>
            <div class="row">
              <div class="col-md-3">qurban</div>
              <div class="col-auto">
                <?php $i = 1; ?>
                <?php foreach ($qurban as $row) : ?>
                  <p><?= $row->nama . " - " . $row->qtt; ?></p>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
          <!-- isi json pesanan -->
          <?php if ($aqiqah !== NULL) : ?>
            <div class="row">
              <div class="col-md-3">aqiqah</div>
              <div class="col-auto">
                <?php $i = 1; ?>
                <?php foreach ($aqiqah as $row) : ?>
                  <p><?= $row->nama . " - " . $row->qtt; ?></p>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url(); ?>/admin/transaction" class="btn btn-outline-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Proses Status
            </button>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-7">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Transaksi ID</th>
            <th scope="col">Nominal</th>
            <th scope="col">Bukti</th>
            <th scope="col">Upload</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($confirmation) : ?>
            <?php foreach ($confirmation as $row) : ?>
              <tr>
                <td><?= $row['transaction_id']; ?></td>
                <td><?= $row['nominal']; ?></td>
                <td>
                  <img src="<?= base_url(); ?>/img/confirmation/<?= $row['image']; ?>" alt="<?= $row['image']; ?>" height="30">
                </td>
                <td><?= date('d F Y', strtotime($row['created_at'])); ?></td>
                <td>
                  <button type="button" class="btn badge bg-primary" id="view-confirm" data-confirm="<?= base_url(); ?>/admin/transaction/confirmview/<?= $row['id']; ?>">Detail</button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td class="text-center" colspan="5">
                <h4>Belum Melakukan transaksi</h4>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

      <div id="content">
        <!-- Isi Content Detail -->
      </div>

    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>/admin/transaction/<?= $transaction['id']; ?>" method="post">

          <?= csrf_field(); ?>
          <div class="mb-3">
            <label for="code_transaction" class="form-label">Code transaksi</label>
            <input class="form-control" type="text" name="code_transaction" id="code_transaction" value="<?= $transaction['code_transaction']; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="status_transaction" class="form-label">Status Transaksi</label>
            <select class="form-select" name="status_transaction" autofocus>
              <option value="<?= $transaction['status_transaction']; ?>" selected><?= $transaction['status_transaction']; ?></option>
              <option value="Pembayaran di confirmasi">Pembayaran di confirmasi</option>
              <option value="Proses">Proses</option>
              <option value="Selesai">Selesai</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
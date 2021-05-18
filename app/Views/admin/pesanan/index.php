<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container my-1">

  <?php if (session()->getFlashdata('pesan')) : ?>
    <div id="pesan-transaction" data-title="Berhasil Diubah" data-pesan="<?= session()->getFlashdata('pesan'); ?>">
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col">
      <h1 class="text-center">Pesana terkumpul</h1>
    </div>
  </div>

  <div class="row justify-content-center">

    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code Traksaksi</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Email</th>
            <th scope="col">Jumlah Item</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($transaction as $row) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $row['code_transaction']; ?></td>
              <td><?= $row['full_name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['t_item']; ?></td>
              <td>Rp. <?= number_format($row['jml_total']); ?></td>
              <td><?= $row['status_transaction']; ?></td>
              <td>
                <form action="<?= base_url(); ?>/admin/transaction/detail/<?= $row['code_transaction']; ?>" method="post">
                  <button type="submit" class="btn badge bg-primary">Detail</button>
                </form>
                <!-- <a href="#" class="badge bg-primary">Detail</a> -->
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
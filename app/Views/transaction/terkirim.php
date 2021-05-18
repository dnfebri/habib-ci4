<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<!-- Content -->
<div class="container terkirim">

  <?php if (!$pesanan) : ?>
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <h3>Oopps..., Ada yang salah</h3>
        <h4 class="mb-3">Code Pesanan anda tidak terdaftar</h4>

        <p>Silahkan cek code pesanan anda di pencarian yang tersedia <br> atau pilih produk lalu order lagi</p>

      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="<?= base_url(); ?>/" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i> Kembali Home</a>
      </div>
    </div>
  <?php else : ?>
    <?php
      $qurban = json_decode(json_decode($pesanan['detail_qurban']));
      $aqiqah = json_decode(json_decode($pesanan['detail_aqiqah']));
      ?>
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <?php if (session('request') == $pesanan['code_transaction']) : ?>
          <h2>Terima kasih, Pesanan anda segera kami proses.</h2>
        <?php else : ?>
          <h3 class="mb-3">Pesanan anda masih dalam <b><?= $pesanan['status_transaction']; ?></b>. hubungi admin kami jika mengalami ketidak cocokan pesanan</h3>
          <hr>
        <?php endif; ?>

        <!-- == Head Transaction == -->
        <!-- == Head left == -->
        <div class="row">
          <div class="col-sm-6">
            <div class="row">
              <p class="col-sm-5 fw-bold mb-0">Code Treansaksi </p>
              <p class="col fw-bold  mb-0">: <?= $pesanan['code_transaction']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-5 my-0">Tanggal Pesan </p>
              <p class="col my-0">: <?= date('d F Y', strtotime($pesanan['created_at'])); ?></p>
            </div>
            <div class="position-relative" style="height: 64px;">
              <div class="position-absolute top-100 start-50 translate-middle">
                <p>Status Transaksi : <b><?= $pesanan['status_transaction']; ?></b></p>
              </div>
            </div>
          </div>
          <!-- == Head left end == -->

          <!-- == Head right == -->
          <div class="col-sm-6">
            <div class="row">
              <p class="col-sm-5 fw-bold mb-0">Pemesan </p>
              <p class="col fw-bold mb-0">: <?= $pesanan['full_name']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-5 my-0">Email </p>
              <p class="col my-0">: <?= $pesanan['email']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-5 my-0">Telepon </p>
              <p class="col my-0">: <?= $pesanan['telepon']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-5 my-0">Alamat </p>
              <p class="col my-0">: <?= $pesanan['street']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-5 my-0">Kode Pos </p>
              <p class="col my-0">: <?= $pesanan['zip_code']; ?></p>
            </div>
          </div>
        </div>
        <!-- == Head right end == -->
        <!-- == Head Transaction end == -->

        <!-- == Table == -->
        <table class="table table-sm mt-3">
          <thead class="table-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Item</th>
              <th scope="col">Harga</th>
              <th scope="col">Quantity</th>
              <th scope="col">Sub Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- isi json pesanan -->
            <?php if ($qurban !== NULL) : ?>
              <?php foreach ($qurban as $row) : ?>
                <tr>
                  <th scope="row">#</th>
                  <td><?= $row->nama; ?></td>
                  <td>Rp. <?= number_format($row->harga); ?></td>
                  <td><b><?= number_format($row->qtt); ?></b></td>
                  <td>Rp. <?= number_format($row->harga * $row->qtt); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($aqiqah !== NULL) : ?>
              <?php foreach ($aqiqah as $row) : ?>
                <tr>
                  <th scope="row">#</th>
                  <td><?= $row->nama; ?></td>
                  <td>Rp. <?= number_format($row->harga); ?></td>
                  <td><b><?= number_format($row->qtt); ?></b></td>
                  <td>Rp. <?= number_format($row->harga * $row->qtt); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>

          </tbody>
        </table>
        <!-- == Table end == -->

        <div class="row justify-content-end">
          <div class="col-sm-5">
            <h4>TOTAL</h4>
            <table class="table table-bordered table-sm">
              <thead class="table-light">
                <tr>
                  <th scope="col">Total Item</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>
              <tbody class="text-end">
                <tr>
                  <td id="jml-item" class="fw-bold"><?= $pesanan['t_item']; ?></td>
                  <td class="table-success">Rp. <strong><?= number_format($pesanan['jml_total']); ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-7">
            <p>
              * Note : Simpan baik-baik Code transaksi anda : <strong> <?= $pesanan['code_transaction']; ?></strong><br>
              untuk digunakan sebagai verivikasi pemesanan pada saat pembayaran. <br>
              terimakasih atas atas kepercayaan anda terhadap kami.
            </p>
            <p>Untuk melakukan pembayaran silahkan melakukan transfer sesuai nominal : Rp. <strong><?= number_format($pesanan['jml_total']); ?></strong></p>
            <p>
              Ke Rekening a.n Mr.X <br>
              BRI : 123456789123 <br>
              BNI : 087654321
            </p>
          </div>

          <div class="col-sm-5">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
              <a href="<?= base_url(); ?>/transaction/cetak/<?= $pesanan['code_transaction']; ?>" class="btn btn-primary " target="_blank"><i class="fa fa-print"></i> Cetak</a>
              <!-- <a href="<?= base_url(); ?>#" class="btn btn-success"><i class="fa fa-money"></i> pembayaran</a> -->
              <form action="<?= base_url(); ?>/transaction/<?= $pesanan['code_transaction']; ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> pembayaran</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  <?php endif; ?>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
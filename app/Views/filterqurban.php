<?php foreach ($qurban as $q) : ?>
  <div class="col-lg-4 mb-3">
    <div class="card text-center" style="width: 18rem; height: 400px;">
      <div class="row align-items-center" style="height: 75%;">
        <img src="<?= base_url(); ?>/img/produk/<?= $q['img']; ?>" class="card-img-top w-75 rounded mx-auto d-block" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $q['nama_produk']; ?></h5>
        <p class="card-text">Rp. <?= number_format($q['harga'], 2, ',', '.'); ?></p>
        <a href="<?= base_url(); ?>/admin/qurban/detail/<?= $q['slug']; ?>" class="btn btn-primary">Lihat Ditail</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
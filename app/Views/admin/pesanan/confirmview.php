<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url(); ?>/img/confirmation/<?= $confirm['image']; ?>" alt="<?= $confirm['image']; ?>" width="100%">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Transaction ID : <?= $confirm['transaction_id']; ?></h5>
        <p class="card-text">Catatan : <br> <?= $confirm['note']; ?></p>
        <p class="card-text"><small class="text-muted"><?= $confirm['created_at']; ?></small></p>
      </div>
    </div>
  </div>
</div>
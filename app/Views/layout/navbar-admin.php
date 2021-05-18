<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
  <div class="container">
    <a class="navbar-brand fw-bolder text-primary" href="<?= base_url(); ?>/admin">
      <img src="<?= base_url(); ?>/img/web/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      CV.HABIB
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="width: 100%;" id="navbarNavAltMarkup">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <div id="marker"></div>
        <li class="nav-item">
          <a class="nav-link" data-nav="<?= $nav; ?>" aria-current="page" href="<?= base_url(); ?>/admin">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-nav="<?= $nav; ?>" aria-current="page" href="<?= base_url(); ?>/admin/qurban">Qurban</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-nav="<?= $nav; ?>" aria-current="page" href="<?= base_url(); ?>/admin/aqiqah">Aqiqah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-nav="<?= $nav; ?>" aria-current="page" href="<?= base_url(); ?>/admin/transaction">Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-nav="<?= $nav; ?>" aria-current="page" href="<?= base_url(); ?>/admin/home/about">Kontak Kami</a>
        </li>
      </ul>
      <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/logout"><b>Logout</b></a>
    </div>


  </div>
</nav>
<!-- Navbar Akhir -->
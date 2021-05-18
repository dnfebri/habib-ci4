<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
    <div class="container">
        <a class="navbar-brand fw-bolder text-primary" href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>/img/web/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            CV.HABIB
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/qurban">Qurban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/aqiqah">Aqiqah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/pages/about">Kontak Kami</a>
                </li>
            </ul>
            <a class="btn py-0 mx-1" aria-current="page" href="<?= base_url(); ?>/pages/keranjang"><i class="fa fa-shopping-cart fs-3"></i></a>
            <form class="d-flex" action="<?= base_url(); ?>/pages/pesanan" method="POST">
                <input type="text" class="form-control" name="code_transaction" placeholder="Cari Code Pesanan" required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
            </form>
        </div>

    </div>
</nav>
<!-- Navbar Akhir -->
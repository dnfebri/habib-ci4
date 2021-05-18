<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container my-2">
    <div class="row">

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div id="pesan-transaction" data-title="Bukti transaksi diupload" data-pesan="<?= session()->getFlashdata('pesan'); ?>">
            </div>
        <?php endif; ?>

        <div class="col-md-5">
            <!-- <h1>Halaman Home</h1> -->
            <img src="<?= base_url(); ?>/img/web/logo_conten.png" alt="" class="img-thumbnail" width="100%">
        </div>
        <div class="col">
            <h3 class="mb-3"><b class="text-primary">HABIB</b> (Hasanah Alam Batam Indah Bertuah)</h3>
            <p> Kami adalah salah satu ikhwan batam yang menjual hewan ( sapi dan kambing ) untuk memenuhi berbagai kebutuhan anda, baik sebagai keperluan qurban , aqiqah maupun keperluan lainnya.
            </p>
            <p>Lokasi kandang luas dan strategis , beralamat di komplek peternakan hewan seitamiang batam, perawatan hewan secara berkala, sehingga hewan - hewan kami sehat dan bersih . Tersedia berbagai jenis dan type sapi dan kambing, hingga anda bisa menentukan pilihan sesuai selera.</p>
        </div>

    </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
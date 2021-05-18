<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="container" style="font-family: rockwell; margin-top: -30px;">
  <div class="row">
    <div class="col-md-8 offset-2">

      <h1 class="text-center">Keranjang belanja anda</h1>
      <hr>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Harga</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub Total</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr id="detail-keranjang">
            <td class="text-center" colspan="5" id="keranjang-kosong">
              <h4>Keranjang belum terisi</h4>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="row justify-content-end">
        <div class="col-md-5">
          <h4>TOTAL</h4>
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">Total Item</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody class="text-end">
              <tr>
                <td id="jml-item" class="fw-bold"></td>
                <td class="table-success">Rp. <span id="jml-bayar">0</span></td>
              </tr>
            </tbody>
          </table>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary btn-check-out d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="fa fa-shopping-cart"></i>
              Check Out
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>/transaction/checkout" method="post" id="form-keranjang">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="full_name">Nama Lengkap:</label>
              <input type="text" class="form-control popover-test" id="full_name" name="full_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="street">Alamat Lengkap:</label>
              <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="form-group col-md-6">
              <label for="telepon">Telepon</label>
              <input type="text" class="form-control" onkeyup="validAngka(this)" maxlength=" 13" id="telepon" name="telepon" required>
            </div>
            <div class="form-group col-md-6">
              <label for="zip_code">Kode Pos:</label>
              <input type="text" class="form-control" onkeyup="validAngka(this)" maxlength="5" id="zip_code" name="zip_code" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="note_transaction">Catatan:</label>
              <textarea type="text" class="form-control" id="note_transaction" name="note_transaction"></textarea>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="kirim-pesanan">Pesan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Content Akhir -->

<?= $this->endSection() ?>
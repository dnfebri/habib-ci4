// action view gambar tambah
function priviewImg() {
    const img = document.querySelector('#img');
    const imgPreview = document.querySelector('.img-previuw');
    const imgLabel = document.querySelector('.img-label');

    if (imgLabel) {
        imgLabel.textContent = img.files[0].name;
    }

    const fileImg = new FileReader();
    fileImg.readAsDataURL(img.files[0]);

    // console.log(fileImg.target.result);

    fileImg.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}

// ==============================================================================>
// Detail Confirmation Pesanan Form ADMIN =======================================>
let hapusProduk = document.querySelector('#hapus-produk')
if (hapusProduk) {
    hapusProduk.addEventListener('click', function () {
        Swal.fire({
            title: 'Apakah anda yakin?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-hapus').submit();
            }
        })
    })
}

const confirm = document.querySelectorAll('#view-confirm');
if (confirm) {
    for (let i = 0; i < confirm.length; i++) {
        confirm[i].addEventListener('click', function () {
            const content = document.querySelector('#content');
            // buat object ajax
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    content.innerHTML = xhr.responseText;
                    // console.log(xhr.responseText);
                }
            }

            // exsekusi ajax "function di atas tidak akan berjalan jika belum memanggil scrip ajax di bawah ini"
            xhr.open('GET', confirm[i].getAttribute("data-confirm"), true);
            xhr.send();
        })
    }
}
// Detail Confirmation Pesanan Form ADMIN Akhir =================================>
// ==============================================================================>


// =======================================================>
// Change Filter Qurban =================================>
const fil = document.querySelector('#filter');
if (fil) {
    fil.addEventListener('change', filter)
}

function filter() {
    // const fil = document.querySelector('#filter');
    const content = document.querySelector('#content');
    let urlConten = content.getAttribute("data-url");

    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            content.innerHTML = xhr.responseText;
            // console.log(xhr.responseText);
        }
    }

    // exsekusi ajax "function di atas tidak akan berjalan jika belum memanggil scrip ajax di bawah ini"
    xhr.open('GET', urlConten + fil.value, true);
    xhr.send();
}
// Change Filter Qurban Akhir ============================>
// =======================================================>

function validAngka(a) {
    if (!/^[0-9.]+$/.test(a.value)) {
        a.value = a.value.substring(0, a.value.length - 1000);
    }
}

// ===========================================================>
// === Tombal Tambah Keranjang ===============================>
const dtl_produk = document.querySelector('#detail-produk');
const tbhKeranjangQurban = document.querySelectorAll('#tambah-keranjang-qurban');
const tbhKeranjangAqiqah = document.querySelectorAll('#tambah-keranjang-aqiqah');

if (dtl_produk) {
    if (tbhKeranjangQurban) {
        for (let i = 0; i < tbhKeranjangQurban.length; i++) {
            tbhKeranjangQurban[i].addEventListener('click', function () {
                return addKeranjang(HBB_QURBAN_STORAGE)
            });;
        }
    }
    if (tbhKeranjangAqiqah) {
        for (let i = 0; i < tbhKeranjangAqiqah.length; i++) {
            tbhKeranjangAqiqah[i].addEventListener('click', function () {
                return addKeranjang(HBB_AQIQAH_STORAGE)
            });
        }
    }

}

let pesan = {};
const HBB_QURBAN_STORAGE = "HBB_QURBAN_STORAGE"
const HBB_AQIQAH_STORAGE = "HBB_AQIQAH_STORAGE"

function syncLocalStorage(action, PRODUK_STORAGE, item, detail) {
    // Membaca LocalStorage untuk menganti variabel pesan
    loadStorage = localStorage.getItem(PRODUK_STORAGE);
    if (loadStorage) {
        pesan = JSON.parse(loadStorage);
    }

    switch (action) {
        case 'ADD':
        case 'UPDATE':
            pesan[item] = detail
            break;
        case 'DELETE':
            delete pesan[item]
            break;
        default:
            break;
    }

    localStorage.setItem(PRODUK_STORAGE, JSON.stringify(pesan))
    return
}

function addKeranjang(produk) {
    //Check if localstorage API is available
    if (typeof (Storage) !== "undefined") {
        console.log("local storage available")
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ada yang salah!',
            footer: 'Sistem tidak berjalan dengan semestinya'
        })
        // console.log("Oops. you data will gone after page reload")
    }
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Pesanan Masuk di keranjang',
        showConfirmButton: false,
        timer: 1500
    })

    // buat key
    let slug = dtl_produk.querySelector('#slug').value;
    let detail = {};
    detail.nama = dtl_produk.querySelector('h3').innerHTML;
    detail.harga = parseInt(dtl_produk.querySelector('#harga').value); // Rubah ke integer
    detail.qtt = 1;
    syncLocalStorage('ADD', produk, slug, detail);
    // console.log(produk);
}

// === Tombal Tambah Keranjang Akhir =========================>
// ===========================================================>

// ===========================================================>
// === Tampil Keranjang ======================================>

const formKeranjang = document.querySelector("#form-keranjang");
let detailKeranjang = document.querySelector('#detail-keranjang');

if (formKeranjang) {
    let STORAGE_QURBAN = localStorage.getItem(HBB_QURBAN_STORAGE);
    let STORAGE_AQIQAH = localStorage.getItem(HBB_AQIQAH_STORAGE);
    const keranjangKosong = document.querySelector('#keranjang-kosong');
    const jmlItem = document.querySelector("#jml-item");
    const jmlBayar = document.querySelector("#jml-bayar");
    const btnCheckOut = document.querySelector(".btn-check-out");
    let tItem = 0;
    let jumlah = 0;

    if (STORAGE_QURBAN && STORAGE_QURBAN[1] !== '}') {
        pesanQurban = JSON.parse(STORAGE_QURBAN)
        keranjangKosong.classList.add('d-none');
        btnCheckOut.classList.remove('d-none');
        pesanan(pesanQurban, HBB_QURBAN_STORAGE);
    }
    if (STORAGE_AQIQAH && STORAGE_AQIQAH[1] !== '}') {
        pesanAqiqah = JSON.parse(STORAGE_AQIQAH)
        keranjangKosong.classList.add('d-none');
        btnCheckOut.classList.remove('d-none');
        pesanan(pesanAqiqah, HBB_AQIQAH_STORAGE);
    }

    function pesanan(pesan, pesantype) {
        Object.keys(pesan).forEach(function (slug) {
            let subJumlah = pesan[slug].harga * pesan[slug].qtt;
            let subTotal = formatUang(pesan[slug].harga * pesan[slug].qtt);
            let isiKeranjang = `<tr>
                                    <th scope="row">#</th>
                                    <td>
                                    <input type="text" value="${pesantype}" hidden>
                                    <input type="text" value="${slug}" hidden>
                                    <input type="text" value="${pesan[slug].nama}" hidden>${pesan[slug].nama}
                                    </td>
                                    <td>
                                    <input type="number" value="${pesan[slug].harga}" hidden>Rp. ${formatUang(pesan[slug].harga)}
                                    </td>
                                    <td class="py-0">
                                    <button type="button" class="btn" onclick="kurang(this)"><i class="fa fa-minus-square"></i></button>
                                    <input type="number" value="${pesan[slug].qtt}" hidden>
                                    ${pesan[slug].qtt}
                                    <button type="button" class="btn" onclick="tambah(this)"><i class="fa fa-plus-square"></i></button>
                                    </td>
                                    <td>Rp. ${subTotal}</td>
                                    <td class="py-0">
                                    <button type="button" class="btn text-danger" onclick="hapus(this)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>`;

            detailKeranjang.insertAdjacentHTML('beforebegin', isiKeranjang);
            tItem += pesan[slug].qtt;
            jumlah += subJumlah;
        });
        let produkJSOM = '';
        if (pesantype == HBB_QURBAN_STORAGE) {
            produkJSOM = `<input type="text" name="detail_qurban" value='${JSON.stringify(pesan)}' hidden>`
        }
        if (pesantype == HBB_AQIQAH_STORAGE) {
            produkJSOM = `<input type="text" name="detail_aqiqah" value='${JSON.stringify(pesan)}' hidden>`
        }
        formKeranjang.insertAdjacentHTML('afterbegin', produkJSOM);
        return
    }
    jmlItem.innerHTML = tItem;
    jmlBayar.innerHTML = formatUang(jumlah);
    formKeranjang.insertAdjacentHTML('afterbegin', `<input type="text" name="t_item" value='${tItem}' hidden>`);
    formKeranjang.insertAdjacentHTML('afterbegin', `<input type="text" name="jml_total" value='${jumlah}' hidden>`);
}

function formatUang(nominal) {
    var angka = nominal;
    var reverse = angka.toString().split('').reverse().join('')
    nominal = reverse.match(/\d{1,3}/g);
    nominal = nominal.join('.').split('').reverse().join('');
    return nominal;
    // document.write(nominal);
}

function tambah(e) {
    let dt = e.parentElement.parentElement.querySelectorAll("input")
    // buat key
    let produk = dt[0].defaultValue
    let slug = dt[1].defaultValue;
    let detail = {};
    detail.nama = dt[2].defaultValue;
    detail.harga = dt[3].defaultValue;
    detail.qtt = parseInt(dt[4].defaultValue) + 1; // Rubah ke integer
    syncLocalStorage('UPDATE', produk, slug, detail);
    location.reload();
}

function kurang(e) {
    let dt = e.parentElement.parentElement.querySelectorAll("input")
    // buat key
    let produk = dt[0].defaultValue
    let slug = dt[1].defaultValue;
    let detail = {};
    detail.nama = dt[2].defaultValue;
    detail.harga = dt[3].defaultValue;
    detail.qtt = parseInt(dt[4].defaultValue) - 1; // Rubah ke integer
    syncLocalStorage('UPDATE', produk, slug, detail);
    location.reload();
}

function hapus(e) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let dt = e.parentElement.parentElement.querySelectorAll("input")
            // buat key
            let produk = dt[0].defaultValue
            let slug = dt[1].defaultValue;
            let detail = {};
            detail.nama = dt[2].defaultValue;
            detail.harga = dt[3].defaultValue;
            detail.qtt = parseInt(dt[4].defaultValue) - 1; // Rubah ke integer
            syncLocalStorage('DELETE', produk, slug, detail);
            location.reload();
        }
    })
}
// Menghapus semua isi localstorage setelah menekan tombol pesan
const kirimPesanan = document.querySelector('#kirim-pesanan');
if (kirimPesanan) {
    kirimPesanan.addEventListener('click', function () {
        localStorage.clear();
        return;
    })
}

// === Tampil Keranjang Akhir ================================>
// ===========================================================>


// ===========================================================>
// === Tampil terkirim =======================================>

const formTerkirim = document.querySelector('.terkirim');
if (formTerkirim) {
    localStorage.clear();
}

const pesanTransaction = document.querySelector('#pesan-transaction');
if (pesanTransaction) {
    Swal.fire(
        pesanTransaction.getAttribute("data-title"),
        pesanTransaction.getAttribute("data-pesan"),
        'success'
    )
}

// === Tampil terkirim Akhir ================================>
// ===========================================================>
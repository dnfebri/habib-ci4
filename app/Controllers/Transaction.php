<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\TransactionModel;
use phpDocumentor\Reflection\Types\Null_;

// use Dompdf\Dompdf;
// use TCPDF;

// use phpDocumentor\Reflection\Types\This;

class Transaction extends BaseController
{
	protected $transaction;
	public function __construct()
	{
		$this->transaction = new TransactionModel();
	}

	public function index()
	{
		return redirect()->to('/');
	}

	public function checkout()
	{
		$codeTransaction = rand();  //// membuat kode transaction random ////
		$this->transaction->save([
			'code_transaction' 		=> $codeTransaction,
			'full_name' 					=> $this->request->getVar('full_name'),
			'email' 							=> $this->request->getVar('email'),
			'street' 							=> $this->request->getVar('street'),
			'telepon' 						=> $this->request->getVar('telepon'),
			'zip_code' 						=> $this->request->getVar('zip_code'),
			'detail_aqiqah' 			=> json_encode($this->request->getVar("detail_aqiqah")),
			'detail_qurban' 			=> json_encode($this->request->getVar("detail_qurban")),
			't_item' 							=> $this->request->getVar('t_item'),
			'jml_total' 					=> $this->request->getVar('jml_total'),
			'status_transaction' 	=> "Pesan",
			'note_transaction' 		=> $this->request->getVar('note_transaction')
		]);
		// session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
		session()->set('request', $codeTransaction);

		return redirect()->to('/transaction/terkirim');
	}

	public function terkirim()
	{
		$data = [
			'nav' => NULL,
			'title' => 'Pesanan Terkirim',
			'pesanan' => $this->transaction->where('code_transaction', session('request'))->first()
		];
		return view('transaction/terkirim', $data);
	}

	public function pembayaran($code_transaction = NULL)
	{
		$data = [
			'nav' => NULL,
			'title' => 'Pesanan Konfirmasi',
			'pesanan' => $this->transaction->where('code_transaction', $code_transaction)->first(),
			'validation' => \Config\Services::validation()
		];
		if ($data['pesanan'] == NULL) {
			return redirect()->to('/');
		}
		return view('transaction/confirmation', $data);
	}

	public function bayar()
	{
		// === Validation ===
		$validationform = [
			'transaction_id' => 'required',
			'nominal' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Isi nominal'
				]
			],
			'img' =>
			[
				'rules' => 'uploaded[img]|max_size[img,11024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
				'errors' =>
				[
					'uploaded' => 'Pilih Gambar',
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		];
		if (!$this->validate($validationform)) {
			return redirect()->to("/transaction/" . $this->request->getVar('transaction_id'))->withInput();
			// return redirect()->route("/transaction/" . $this->request->getVar('transaction_id'))->withInput();
		}

		$uploadimg = $this->request->getFile('img'); // ambil gambar
		$extensi = explode(".", $uploadimg->getName()); // ambil extesi gambar
		$extensi = end($extensi);
		$namaimg = $this->request->getVar('transaction_id') . "." . $extensi; // buat nama gambar
		$uploadimg->move('img/confirmation', $namaimg); // upload gambar ke folder
		// d($uploadimg->getName());

		// Memanggil Model yang dibutuhkan hanya di method ini
		$confirmation = new \App\Models\ConfirmationModel();
		$confirmation->save([
			'transaction_id' => $this->request->getVar('transaction_id'),
			'nominal' => str_replace(".", "", $this->request->getVar('nominal')),
			'image' => $uploadimg->getName(), // ambil nama sesuai gambar yang di upload
			'note' => $this->request->getVar('note')
		]);

		$this->transaction->save([
			'id'									=> $this->request->getVar('id'),
			'status_transaction' 	=> "Menunggu kofirmasi pembayaran dari admin"
		]);

		session()->setFlashdata('pesan', 'Transaksi pembayaran anda berhasil dikirim');
		return redirect()->to('/');
	}

	public function cetak($code)
	{
		// echo "cetak";
		$data = [
			'nav' => NULL,
			'title' => 'Pesanan Terkirim',
			'pesanan' => $this->transaction->where('code_transaction', $code)->first()
		];
		return view('transaction/terkirim-cetak', $data);

		// ===================================================>>
		// =====     DOMPDF    ===============================>>
		// ===================================================>>
		// // instantiate and use the dompdf class
		// $dompdf = new Dompdf();
		// $dompdf->loadHtml(view('transaction/terkirim', $data));
		// $dompdf->setPaper('A4', 'landscape'); // (Optional) Setup the paper size and orientation
		// $dompdf->render(); // Render the HTML as PDF
		// $dompdf->stream("dompdf_out.pdf", array("Attachment" => false)); 	// Output the generated PDF to Browser
		// // or
		// // $dompdf->stream('my.pdf', array('Attachment' => 0));


		// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 006');
		// $pdf->SetSubject('TCPDF Tutorial');

		// $pdf->setPrintHeader(false);
		// $pdf->setPrintFooter(false);

		// $pdf->addPage();

		// // output the HTML content
		// $pdf->writeHTML(view('transaction/terkirim', $data), true, false, true, false, '');
		// //line ini penting
		// $this->response->setContentType('application/pdf');
		// //Close and output PDF document
		// $pdf->Output('invoice.pdf', 'I');
	}
}

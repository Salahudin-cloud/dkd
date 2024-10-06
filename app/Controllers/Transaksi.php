<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProgramModel;
use App\Models\PenggunaModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $programModel;
    protected $penggunaModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->programModel = new ProgramModel();
        $this->penggunaModel = new PenggunaModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }


        $data = [
            'transaksi_data' => $this->transaksiModel->getAllTransaksi()
        ];


        return view('backend_pages/admin/transaksi', $data);
    }


    public function checkTransaksi($id)
    {
        $data = $this->transaksiModel->getTransaksiByid($id);

        // Load the view and render it as a string
        $html = view('templates/pdf_template/invoice_donasi', [
            'id_transaksi' => $data[0]->id_transaksi,
            'tanggal_transaksi' => $data[0]->tanggal_transaksi,
            'nominal_pembayaran' => $data[0]->nominal_pembayaran,
            'pengguna_nama' => $data[0]->pengguna_nama,
            'nomor_wa' => $data[0]->nomor_wa,
            'alamat' => $data[0]->alamat,
            'program_judul' => $data[0]->program_judul,
            'metode_pembayaran' => $data[0]->metode_pembayaran,
            'penanggung_jawab' => session()->get('nama')
        ]);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, $data[0]->id_transaksi . '_' . $data[0]->pengguna_nama, false);

        // Path to save the PDF file
        $path = './assets/invoice_pdf/' . $data[0]->id_transaksi . '_' . strtolower(url_title($data[0]->pengguna_nama)) . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        // update status pembayaran 

        $this->transaksiModel->updateStatusPembayaranById($id);

        // Check if the file exists after a short delay to ensure it's written
        usleep(500000); // Wait for 0.5 seconds

        // Redirect to index method with file existence flag
        return redirect()->to('transaksi');
    }


    public function deleteTransaksi($id)
    {
        $data = $this->transaksiModel->getTransaksiByid($id);


        // check if the pdf transaksiion file exists
        $path_pdf = './assets/invoice_pdf/' . $data[0]->id_transaksi . '_' . strtolower(url_title($data[0]->pengguna_nama)) . '.pdf';
        $path_bukti_pembayaran = './assets/img/transaksi/' . $data[0]->bukti_transaksi;

        if (file_exists($path_bukti_pembayaran)) {
            // if exist delete the image bukti pembyaran 
            unlink($path_bukti_pembayaran);
        }

        if (file_exists($path_pdf)) {
            // if file exists delete the file pdf first 
            unlink($path_pdf);
        }

        // after that delete transaksi data in database 
        $this->transaksiModel->deleteTransaksiById($id);

        // the redirect to list transaksi 
        return redirect()->to('transaksi');
    }


    public function tambahTransaksi()
    {
        $data['pengguna'] = $this->penggunaModel->getAllDonatur();
        return view('backend_pages/admin/tambah_transaksi', $data);
    }

    public function tambahTransaksiProcess()
    {
        date_default_timezone_set('Asia/Jakarta');
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'nama' => 'required',
                'metode' => 'required',
                'nominal' => 'required'
            ],
            [
                'kategori' => [
                    'required' => 'Kategori Jangan Dibiarkan Kosong !!',
                ],
                'metode' => [
                    'required' => 'Metode Jangan Dibiarkan Kosong !!',
                ],
                'nominal' => [
                    'required' => 'Nominal Jangan Dibiarkan Kosong !!',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/transaksi_tambah');
        }


        // input database 
        // id_transaksi 
        // id_pengguna  
        // id_program 
        // tanggal_transaksi 
        // metode_pembayaran
        // nominal_pembayaran 
        // status_pembayaran 
        // bukti_transaksi    

        // id transaksi 
        $prefix = 'DKD';
        $yearNow = date('Y');
        $monthNow = date('m');

        $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber($prefix . $yearNow . $monthNow);

        // Menambahkan padding ke nomor transaksi jika panjangnya kurang dari 2 digit
        $nextTransactionNumber = str_pad($lastTransactionNumber + 1, 2, '0', STR_PAD_LEFT);

        $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;
        // $prefix = 'DKD';
        // $yearNow = date('Y');
        // $monthNow = date('m');

        // $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber($prefix . $yearNow . $monthNow);
        // $nextTransactionNumber = $lastTransactionNumber + 1;
        // $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;


        // mendapatkan input 
        $data = [
            'id_transaksi' => $transactionID,
            'id_pengguna' => $this->request->getPost('nama'),
            'id_program' => 12,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'metode_pembayaran' => $this->request->getPost('metode'),
            'nominal_pembayaran' => $this->request->getPost('nominal'),
            'status_pembayaran' => 'berhasil',
            'bukti_transaksi' => 'diisi_oleh_admin.png',
            'info_transaksi' => 'dana masuk'
        ];

        $this->transaksiModel->addTransaksi($data);

        // return ke daftar kategori 
        return redirect()->to('transaksi');
    }



    // transaksi keluar
    public function keluar()
    {
        $data['program'] = $this->programModel->getSemuaProgramPublish();
        return view('backend_pages/admin/transaksi_keluar', $data);
    }


    public function transaksiKeluarProcess()
    {
        date_default_timezone_set('Asia/Jakarta');
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'program' => 'required',
                'nominal' => 'required'
            ],
            [
                'program' => [
                    'required' => 'Program Jangan Dibiarkan Kosong !!',
                ],
                'nominal' => [
                    'required' => 'Nominal Jangan Dibiarkan Kosong !!',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/transaksi_keluar');
        }


        // id transaksi 
        $prefix = 'DKDTK';
        $yearNow = date('Y');
        $monthNow = date('m');

        $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber($prefix . $yearNow . $monthNow);

        // Menambahkan padding ke nomor transaksi jika panjangnya kurang dari 2 digit
        $nextTransactionNumber = str_pad($lastTransactionNumber + 1, 2, '0', STR_PAD_LEFT);

        $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;

        // $prefix = 'DKD';
        // $yearNow = date('Y');
        // $monthNow = date('m');

        // $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber($prefix . $yearNow . $monthNow);
        // $nextTransactionNumber = $lastTransactionNumber + 1;
        // $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;


        // catch data
        $data = [
            'id_transaksi' => $transactionID,
            'id_pengguna' => session()->get('id'),
            'id_program' => $this->request->getPost('program'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'metode_pembayaran' => 'admin',
            'nominal_pembayaran' => $this->request->getPost('nominal'),
            'status_pembayaran' => 'berhasil',
            'bukti_transaksi' => 'diisi_oleh_admin.png',
            'info_transaksi' => 'dana keluar'
        ];

        // query nama program
        $progamDonasi = $this->programModel->getProgramById($this->request->getPost('program'));



        // Load the view and render it as a string
        $html = view('templates/pdf_template/transaksi_keluar', [
            'id_transaksi' => $transactionID,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'nominal_pembayaran' => $this->request->getPost('nominal'),
            'pengguna_nama' => $this->request->getPost('penangung'),
            'program_judul' => $progamDonasi->program_judul,
        ]);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, $transactionID . '_' . session()->nama, false, 'A4', 'potrait');

        // Path to save the PDF file
        $path = './assets/transaksi_keluar/' . $transactionID . '_' . strtolower(url_title(session()->nama)) . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        // Check if the file exists after a short delay to ensure it's written
        usleep(500000); // Wait for 0.5 seconds

        $this->transaksiModel->addTransaksi($data);


        // Redirect to index method with file existence flag
        return $this->response->download($path, null)->setFileName($transactionID . '_' . session()->nama . '.pdf');
    }

    public function editTransaksi($id)
    {
        $data['transaksi'] = $this->transaksiModel->getTransaksiByid($id);
        return view('backend_pages/admin/transaksi_edit', $data);
    }


    public function editTransaksiProcess()
    {
        date_default_timezone_set('Asia/Jakarta');
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'nominal' => 'required'
            ],
            [
                'nominal' => [
                    'required' => 'Nominal Jangan Dibiarkan Kosong !!',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/transaksi_delete' . $this->request->getPost('id'));
        }


        // cathc data 
        $id = $this->request->getPost('id');
        $nominal_pembayaran = $this->request->getPost('nominal');


        // update data 
        $this->transaksiModel->updateTransaksi($id, $nominal_pembayaran);


        // return ke daftar kategori 
        return redirect()->to('transaksi');
    }
}

<?php


namespace App\Controllers;

use App\Models\ProgramTambahAdminModel;

class ProgramTambahAdmin extends BaseController
{
    protected $programTambahAdminModel;
    public function __construct()
    {
        $this->programTambahAdminModel = new ProgramTambahAdminModel();
    }
    public function index()
    {
        return view('backend_pages/admin/program_tambah');
    }

    public function processTambah()
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'program_judul' => 'required',
                'program_detail' => 'required',
                'program_terkumpul' => 'required',
            ],
            [
                'program_judul' => [
                    'required' => 'Judul Program Jangan Dibiarkan Kosong !!',
                ],
                'program_detail' => [
                    'required' => 'Detail Program Jangan Dibiarkan Kosong!!',
                ],
                'program_terkumpul' => [
                    'required' => 'Uang Terkumpul Jangan Dibiarkan Kosong!!',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/programs_tambah');
        }


        // mengecek jika program sudah ada 
        $judul = $this->programTambahAdminModel->getProgramByJudul(esc($this->request->getPost('program_judul')));

        if (count($judul) > 0) {
            $errors['program_judul'] = 'Judul Program Sudah Ada!!';
            $session->setFlashdata('errors', $errors);
            // show message  error it will return in the page with error message
            return redirect()->to('programs_tambah');
        } else {
            // menghandle tentang program cover 
            $programCoverFile = $this->request->getFile('program_cover');
            if ($programCoverFile->isValid()) {
                // Define path to upload
                $uploadPath = './assets/img/program';

                // mendefinisakan apa saja yang bolek di upload 
                $allowedTypes = ['jpg', 'jpeg', 'png'];
                $fileExtension = $programCoverFile->getExtension();

                // jika tidak sama dengan yang dibolehkan
                if (!in_array($fileExtension, $allowedTypes)) {
                    $errors['program_cover'] = 'Hanya JPG and PNG or JPEG file  saja yang diperbolehkan!';
                    $session->setFlashdata('errors', $errors);
                    return redirect()->to('programs_tambah');
                }

                // melakukan file upload 
                $programCoverFile->move($uploadPath);

                // mendapatkan nama file 
                $program_cover = $programCoverFile->getClientName();

                // cek jika input program target kosong apa tidak 
                if (empty(esc($this->request->getPost('program_target')))) {
                    $program_target = '-';
                } else {
                    $program_target = esc($this->request->getPost('program_target'));
                }

                // mendapatkan input
                $data = [
                    'program_target' => $program_target,
                    'program_terkumpul' => esc($this->request->getPost('program_terkumpul')),
                    'program_judul ' => esc($this->request->getPost('program_judul')),
                    'program_detail' => esc($this->request->getPost('program_detail')),
                    'program_cover' => $program_cover,
                    'program_status' => $this->request->getPost('program_status')

                ];


                // memasukan data ke database
                $this->programTambahAdminModel->addProgramBaru($data);

                // redirec ke daftar list program
                return redirect()->to('programs');
            } else {
                $errors['program_cover'] = 'Silahkan Pilih gambar untuk  Program Cover!';
                $session->setFlashdata('errors', $errors);
                return redirect()->to('programs_tambah');
            }
        }
    }
}
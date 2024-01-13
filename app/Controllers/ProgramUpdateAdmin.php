<?php


namespace App\Controllers;

use App\Models\ProgramModel;

class ProgramUpdateAdmin extends BaseController
{
    protected $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    public function index($id)
    {
        // cek status login 
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        $data['program'] = $this->programModel->getProgramById($id);
        return view('backend_pages/admin/program_update', $data);
    }
    public function updateProgramProcess($id)
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
            return redirect()->to('programs_update/' . $id);
        }



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
                return redirect()->to('programs_update/' . $id);
            }

            $oldCoverProgram = $this->programModel->getProgramCoverById($id);
            if (!empty($oldCoverProgram)) {
                // mendapatkan nama file cover artikel lama
                $oldCoverProgramName = $oldCoverProgram->program_cover;

                // jika logo ada 
                if ($oldCoverProgramName) {
                    // define lokasi file untuk delete
                    $programCoverDeletePath = FCPATH . '/assets/img/program/' . $oldCoverProgramName;

                    // check jika file ada 
                    if (file_exists($programCoverDeletePath)) {
                        // melakukan delete file cover 
                        unlink($programCoverDeletePath);
                    }
                }
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
            $this->programModel->updateProgram($id, $data);

            // redirec ke daftar list program
            return redirect()->to('programs');
        } else {
            // cek jika input program target kosong apa tidak 
            if (empty(esc($this->request->getPost('program_target')))) {
                $program_target = '-';
            } else {
                $program_target = esc($this->request->getPost('program_target'));
            }
            // jika tidak mengupdate artikel cover 
            // mendapatkan input
            $data = [
                'program_target' => $program_target,
                'program_terkumpul' => esc($this->request->getPost('program_terkumpul')),
                'program_judul ' => esc($this->request->getPost('program_judul')),
                'program_detail' => esc($this->request->getPost('program_detail')),
                'program_status' => $this->request->getPost('program_status')

            ];

            // memasukan data ke database
            $this->programModel->updateProgram($id, $data);

            return redirect()->to('programs');
        }



        // // mengecek jika program sudah ada 
        // $judul = $this->programUpdateAdminModel->getProgramByJudul(esc($this->request->getPost('program_judul')));

        // if (count($judul) > 0) {
        //     $errors['program_judul'] = 'Judul Program Sudah Ada!!';
        //     $session->setFlashdata('errors', $errors);
        //     // show message  error it will return in the page with error message
        //     return redirect()->to('programs_update/' . $id);
        // } else {
  
        // }
    }
}

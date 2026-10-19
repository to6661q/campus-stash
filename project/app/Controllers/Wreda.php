<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_dokumenModel;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;

class Wreda extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_dokumenModel;
    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
        $this->ci_dokumenModel = new ci_dokumenModel();
    }
    public function logout()
    {
        session_destroy();
        header('Location: /login/index/');
        exit;
    }

    public function index()
    {
        $data['judul'] = 'Wreda';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        if (isset($_POST['tbnoktp'])) {
            if ($_POST['tbnoktp'] == '') {
                $data['sktp'] = "null";
            } else {
                $data['sktp'] = $_POST['tbnoktp'];
            }
            if ($_POST['tbnama'] == '') {
                $data['snama'] = "null";
            } else {
                $data['snama'] = $_POST['tbnama'];
            }
            $data['spengda'] = $_POST['cbpengda'];
            $data['sstatus'] = $_POST['cbstatus'];
            $data['listanggota'] = $this->ci_userModel->getWredaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getWredaMin('', '', '0', '2');
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('wreda/index');
        echo view('layout/footer');
    }

    public function printwreda($sktp = "", $snama = "", $spengda = "", $sstatus = "")
    {
        $data['judul'] = 'Print Wreda';
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_userModel->getWredaMin($sktp, $snama, $spengda, $sstatus);
        echo view('wreda/printwreda', $data);
    }

    public function exportexcel($sktp = "", $snama = "", $spengda = "", $sstatus = "")
    {
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }

        $data['listanggota'] = $this->ci_userModel->getWredaMin($sktp, $snama, $spengda, $sstatus);
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("IPPAT");
        $object->getProperties()->setLastModifiedBy("IPPAT");
        $object->getProperties()->setTitle("Daftar Anggota");
        $object->setActiveSheetIndex(0);

        foreach (range('A', 'L') as $columnID) {
            $object->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $object->getActiveSheet()->getStyle('A1:L1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $object->getActiveSheet()->getStyle('A1:L1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00A105');
        $object->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('A1:L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $object->getActiveSheet()->setCellValue('A1', 'Foto');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Tempat Lahir');
        $object->getActiveSheet()->setCellValue('D1', 'Tanggal Lahir');
        $object->getActiveSheet()->setCellValue('E1', 'Alamat Tinggal');
        $object->getActiveSheet()->setCellValue('F1', 'Alamat Kantor');
        $object->getActiveSheet()->setCellValue('G1', 'Nomor Telp');
        $object->getActiveSheet()->setCellValue('H1', 'Nomor KTP');
        $object->getActiveSheet()->setCellValue('I1', 'Email');
        $object->getActiveSheet()->setCellValue('J1', 'Pengda');
        $object->getActiveSheet()->setCellValue('K1', 'Pengwil');
        $object->getActiveSheet()->setCellValue('L1', 'Sertifikat Protokol Serah Terima');

        $baris = 2;
        $nomor = 1;

        foreach ($data['listanggota'] as $anggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, 'FOTO');
            $object->getActiveSheet()->setCellValue('B' . $baris, $anggota['nama']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $anggota['tempat_lahir']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $anggota['tgl_lahir']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $anggota['alamat_tinggal']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $anggota['alamat_kantor']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $anggota['no_tlp']);
            $object->getActiveSheet()->setCellValue('H' . $baris, ' ' . $anggota['no_ktp']);
            $object->getActiveSheet()->setCellValue('I' . $baris, $anggota['email']);
            $object->getActiveSheet()->setCellValue('J' . $baris, $anggota['pengda']);
            $object->getActiveSheet()->setCellValue('K' . $baris, $anggota['pengwil']);
            if (empty($anggota['sertifikat_protokol'])) {
                $object->getActiveSheet()->setCellValue('L' . $baris, 'Tidak Ada');
            } else {
                $object->getActiveSheet()->setCellValue('L' . $baris, 'Ada');
            }

            $baris++;
        }
        $filename = "Data Wreda" . '.xlsx';
        $object->getActiveSheet()->setTitle('Data Anggota');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function add()
    {
        $data['judul'] = 'Daftar Wreda';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailuser'] = $_SESSION["detailuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('wreda/add', $data);
        echo view('layout/footer');
    }

    public function add_proc()
    {
        $data['judul'] = 'Daftar Wreda';
        $data['detailuser'] = $_SESSION["detailuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        if (!isset($_FILES['fsertifikat']) || $_FILES['fsertifikat']['error'] == UPLOAD_ERR_NO_FILE) {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Harap sertakan protocol serah terima';
        } else {
            $data['detailuser'] = $this->ci_userModel->addwreda($_POST, $_FILES);
            if ($data['detailuser'] != 'Update gagal') {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-success';
                $data['warning'] = 'Trima kasih. Data anda akan segera kami process.';
            } else {
                $data['detailuser'] = $_SESSION['detailuser'];
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di submit';
            }
            if ($data['detailuser']['foto'] == '') {
                $data['picture'] = 'nopicture.png';
            } else {
                $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
            }
        }

        echo view('wreda/add', $data);
        echo view('layout/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Daftar Wreda';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        if ($data['detailuser']['sertifikat_protokol'] == '') {
            $data['sertifikat_protokol'] = 'Choose file';
        } else {
            $data['sertifikat_protokol'] = $data['detailuser']['sertifikat_protokol'];
        }

        echo view('wreda/edit', $data);
        echo view('layout/footer');
    }

    public function edit_proc()
    {
        $data['judul'] = 'Daftar Wreda';
        $data['detailuser'] = $this->ci_userModel->addwreda($_POST, $_FILES);
        if ($data['detailuser'] != 'Update gagal') {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-success';
            $data['warning'] = 'Data berhasil di update';
        } else {
            $data['detailuser'] = $_SESSION['detailuser'];
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Gagal di update';
        }

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        if ($data['detailuser']['sertifikat_protokol'] == '') {
            $data['sertifikat_protokol'] = 'Choose file';
        } else {
            $data['sertifikat_protokol'] = $data['detailuser']['sertifikat_protokol'];
        }

        echo view('wreda/edit', $data);
        echo view('layout/footer');
    }

    public function detail($iduser)
    {
        $data['judul'] = 'Detail Wreda';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($iduser);
        $data['dokumen'] = $this->ci_dokumenModel->getDokumenByUser($iduser);

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('wreda/detail', $data);
        echo view('layout/footer');
    }

    public function approve($iduser)
    {
        $data['judul'] = 'Wreda';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];

        $this->ci_userModel->approveWreda($iduser, $data['detailuser']['id_user']);
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        if (isset($_POST['tbnoktp'])) {
            if ($_POST['tbnoktp'] == '') {
                $data['sktp'] = "null";
            } else {
                $data['sktp'] = $_POST['tbnoktp'];
            }
            if ($_POST['tbnama'] == '') {
                $data['snama'] = "null";
            } else {
                $data['snama'] = $_POST['tbnama'];
            }
            $data['spengda'] = $_POST['cbpengda'];
            $data['sstatus'] = $_POST['cbstatus'];
            $data['listanggota'] = $this->ci_userModel->getWredaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getWredaMin('', '', '0', '2');
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('wreda/index');
        echo view('layout/footer');
    }
}

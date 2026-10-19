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
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Anggota extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_dokumenModel;
    protected $qrcode;
    var $folder_public;

    public function __construct()
    {
        $this->folder_public = 'public_html';
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
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['menu_name'] == 'Anggota');
        });
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
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin('', '', $data['detailuser']['id_pengwil'] . $data['detailuser']['id_pengda'], '2');
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/index');
        echo view('layout/footer');
    }
    public function printanggota($sktp = "", $snama = "", $spengwil = "", $spengda = "")
    {
        $data['judul'] = 'Print Anggota';
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_userModel->getAnggotaMin($sktp, $snama, $spengwil, $spengda);
        echo view('anggota/printanggota', $data);
    }
    public function exportexcel($sktp = "", $snama = "", $spengwil = "", $status = "")
    {
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_userModel->getAnggotaMin($sktp, $snama, $spengwil, $status);
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("IPPAT");
        $object->getProperties()->setLastModifiedBy("IPPAT");
        $object->getProperties()->setTitle("Daftar Anggota");
        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $object->getActiveSheet()->getStyle('A1:G1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $object->getActiveSheet()->getStyle('A1:G1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00A105');
        $object->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $object->getActiveSheet()->setCellValue('A1', 'NOMOR');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA');
        $object->getActiveSheet()->setCellValue('C1', 'KODE PENGDA');
        $object->getActiveSheet()->setCellValue('D1', 'KODE PENGWIL');
        $object->getActiveSheet()->setCellValue('E1', 'NIK');
        $object->getActiveSheet()->setCellValue('F1', 'NOMOR ANGGOTA');
        $object->getActiveSheet()->setCellValue('G1', 'BARCODE URL');

        $baris = 2;

        foreach ($data['listanggota'] as $anggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $anggota['id_pengwil'] . '.' . $anggota['id_pengda'] . '.' . $anggota['no_anggota']);
            $object->getActiveSheet()->setCellValue('B' . $baris, $anggota['nama']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $anggota['pengda']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $anggota['pengwil']);
            $object->getActiveSheet()->setCellValue('E' . $baris, ' ' . $anggota['no_ktp']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $anggota['no_anggota']);
            $object->getActiveSheet()->setCellValue('G' . $baris, 'http://ppippat.org/anggota/datauser/' . str_pad($anggota['id_user'], 11, "0", STR_PAD_LEFT));

            $baris++;
        }
        $filename = "Data Anggota" . '.xlsx';
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
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['password'] = $_SESSION['password'];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/add');
        echo view('layout/footer');
    }
    public function add_proc()
    {
        $data['judul'] = 'Tambah Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['password'] = $_SESSION['password'];

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $cekdata = $this->cekdata('anggota', $_POST, $_FILES);
        if ($cekdata['warning'] == 'Data berhasil di simpan') {
            if ($this->ci_userModel->addAnggota($_POST, $_FILES) > 0) {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-success';
                $data['warning'] = 'Data berhasil di tambah';
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di tambah';
            }
        } else {
            $data['displayw'] = $cekdata['displayw'];
            $data['displayc'] = $cekdata['displayc'];
            $data['warning'] = $cekdata['warning'];
        }

        if ($data['detailuser']['foto'] == '') {
            $data['foto'] = 'Choose file';
            $data['picture'] = 'nopicture.png';
        } else {
            $data['foto'] = $data['detailuser']['foto'];
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/add', $data);
        echo view('layout/footer');
    }
    public function edit()
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }

        $data['judul'] = 'Edit Data';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['password'] = $_SESSION['password'];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        $data = $this->setdisplay($data);

        if ($data['detailuser']['foto'] == '') {
            $data['foto'] = 'Choose file';
            $data['picture'] = 'nopicture.png';
        } else {
            $data['foto'] = $data['detailuser']['foto'];
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/edit', $data);
        echo view('layout/footer');
    }
    public function edit_proc()
    {
        $data['detailuser'] = $this->ci_userModel->updateUser($_POST, $_FILES);
        if ($data['detailuser'] != 'Update gagal') {
            $_SESSION['detailuser'] = $data['detailuser'];
            $_SESSION['password'] = $_POST['tbpass'];
            $data['password'] = $_POST['tbpass'];
            $data['menuuser'] = $_SESSION["menuuser"];
            $data['displayw'] = '';
            $data['displayc'] = 'alert-success';
            $data['warning'] = 'Data berhasil di update';
        } else {
            $data['detailuser'] = $_SESSION['detailuser'];
            $data['menuuser'] = $_SESSION["menuuser"];
            $data['password'] = $_SESSION['password'];
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Gagal di update';
        }
        $data['judul'] = 'Edit Data';

        if ($data['detailuser']['foto'] == '') {
            $data['foto'] = 'Choose file';
            $data['picture'] = 'nopicture.png';
        } else {
            $data['foto'] = $data['detailuser']['foto'];
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        $data = $this->setdisplay($data);

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/edit');
        echo view('layout/footer');
    }
    public function editbyid($iduser)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Edit Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        if ($data['detail']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detail']['foto'];
        }
        if ($data['detail']['sk_jabatan'] == '') {
            $data['sk_jabatan'] = 'Choose file';
        } else {
            $data['sk_jabatan'] = $data['detail']['sk_jabatan'];
        }
        if ($data['detail']['bas_jabatan'] == '') {
            $data['bas_jabatan'] = 'Choose file';
        } else {
            $data['bas_jabatan'] = $data['detail']['bas_jabatan'];
        }
        if ($data['detail']['ket_alb'] == '') {
            $data['ket_alb'] = 'Choose file';
        } else {
            $data['ket_alb'] = $data['detail']['ket_alb'];
        }
        if ($data['detail']['rek_pengda'] == '') {
            $data['rek_pengda'] = 'Choose file';
        } else {
            $data['rek_pengda'] = $data['detail']['rek_pengda'];
        }
        if ($data['detail']['sertifikat_peningkatan'] == '') {
            $data['sertifikat_peningkatan'] = 'Choose file';
        } else {
            $data['sertifikat_peningkatan'] = $data['detail']['sertifikat_peningkatan'];
        }
        if ($data['detail']['sk_perpanjangan'] == '') {
            $data['sk_perpanjangan'] = 'Choose file';
        } else {
            $data['sk_perpanjangan'] = $data['detail']['sk_perpanjangan'];
        }
        if ($data['detail']['jenis'] == 'anggota') {
            $data['display_sertifikatpeningkatan'] = 'hidden';
            $data['display_skperpanjang'] = 'hidden';
        } else {
            $data['display_sertifikatpeningkatan'] = '';
            $data['display_skperpanjang'] = '';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/editbyid');
        echo view('layout/footer');
    }
    public function editbyid_proc()
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Edit Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        $data['detail'] = $this->ci_userModel->updateAnggotabyid($_POST, $_FILES);
        if ($data['detail'] != 'Update gagal') {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-success';
            $data['warning'] = 'Data berhasil di update';
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Gagal di update';
        }

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['judul'] = 'Edit ALB';
        $data['detail'] = $this->ci_userModel->getUserDetailById($_POST['tbid']);
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];

        if ($data['detail']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detail']['foto'];
        }
        if ($data['detail']['sk_jabatan'] == '') {
            $data['sk_jabatan'] = 'Choose file';
        } else {
            $data['sk_jabatan'] = $data['detail']['sk_jabatan'];
        }
        if ($data['detail']['bas_jabatan'] == '') {
            $data['bas_jabatan'] = 'Choose file';
        } else {
            $data['bas_jabatan'] = $data['detail']['bas_jabatan'];
        }
        if ($data['detail']['ket_alb'] == '') {
            $data['ket_alb'] = 'Choose file';
        } else {
            $data['ket_alb'] = $data['detail']['ket_alb'];
        }
        if ($data['detail']['rek_pengda'] == '') {
            $data['rek_pengda'] = 'Choose file';
        } else {
            $data['rek_pengda'] = $data['detail']['rek_pengda'];
        }
        if ($data['detail']['sertifikat_peningkatan'] == '') {
            $data['sertifikat_peningkatan'] = 'Choose file';
        } else {
            $data['sertifikat_peningkatan'] = $data['detail']['sertifikat_peningkatan'];
        }
        if ($data['detail']['sk_perpanjangan'] == '') {
            $data['sk_perpanjangan'] = 'Choose file';
        } else {
            $data['sk_perpanjangan'] = $data['detail']['sk_perpanjangan'];
        }
        if ($data['detail']['jenis'] == 'anggota') {
            $data['display_sertifikatpeningkatan'] = 'hidden';
            $data['display_skperpanjang'] = 'hidden';
        } else {
            $data['display_sertifikatpeningkatan'] = '';
            $data['display_skperpanjang'] = '';
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/editbyid');
        echo view('layout/footer');
    }
    public function delete($iduser)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['menu_name'] == 'Anggota');
        });
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        $this->ci_userModel->hapus($iduser);
        $this->ci_pesertaModel->hapusbyuser($iduser);

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
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin('', '', '0', '2');
        }

        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/header', $data);
        echo view('anggota/index');
        echo view('layout/footer');
    }
    public function detail($iduser)
    {
        $data['judul'] = 'Detail Anggota';
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
        echo view('anggota/detail', $data);
        echo view('layout/footer');
    }
    public function datauser($iduser)
    {
        $data['detailuser'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($iduser);
        $data['pelatihan'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(24, $iduser));
        $data['pelatihan1'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(25, $iduser));
        $data['pelatihan2'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(26, $iduser));
        $data['pelatihan3'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(19, $iduser));
        $data['pelatihan4'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(20, $iduser));
        $data['pelatihan5'] = count($this->ci_pesertaModel->getPelatihanUserIdEventTerdaftar(21, $iduser));
        $data['pelatihanConfirm'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(24, $iduser));
        $data['pelatihanConfirm1'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(25, $iduser));
        $data['pelatihanConfirm2'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(26, $iduser));
        echo view('anggota/datauser', $data);
        echo view('layout/footer');
    }
    public function setdisplay($data)
    {
        $return = $data;
        $return['display_alamatkantor'] = '';
        $return['display_lokasimagang'] = '';
        $return['display_skpengangkatan'] = '';
        $return['display_basjabatan'] = '';
        $return['display_keteranganalb'] = '';
        $return['display_rekpengda'] = '';
        $return['display_ijasah'] = '';
        $return['display_transkrip'] = '';
        $return['display_copyktp'] = '';
        $return['display_sd1'] = '';
        $return['display_sd2'] = '';
        $return['display_kwitansi'] = '';
        $return['display_kodeetik'] = '';
        $return['display_protokol'] = '';
        $return['display_sertifikatpeningkatan'] = '';
        $return['display_skperpanjang'] = '';

        if ($return['detailuser']['jenis'] == 'alb') {
            $return['display_alamatkantor'] = 'hidden';
            $return['display_skpengangkatan'] = 'hidden';
            $return['display_basjabatan'] = 'hidden';
            $return['display_keteranganalb'] = 'hidden';
            $return['display_rekpengda'] = 'hidden';
            $return['display_protokol'] = 'hidden';
            $return['display_sertifikatpeningkatan'] = 'hidden';
            $return['display_skperpanjang'] = 'hidden';
        } else if ($return['detailuser']['jenis'] == 'anggota') {
            $return['display_lokasimagang'] = 'hidden';
            $return['display_ijasah'] = 'hidden';
            $return['display_transkrip'] = 'hidden';
            $return['display_copyktp'] = 'hidden';
            $return['display_sd1'] = 'hidden';
            $return['display_sd2'] = 'hidden';
            $return['display_kwitansi'] = 'hidden';
            $return['display_kodeetik'] = 'hidden';
            $return['display_protokol'] = 'hidden';
            $return['display_sertifikatpeningkatan'] = 'hidden';
            $return['display_skperpanjang'] = 'hidden';
        } else if ($return['detailuser']['jenis'] == 'senior') {
            $return['display_lokasimagang'] = 'hidden';
            $return['display_ijasah'] = 'hidden';
            $return['display_transkrip'] = 'hidden';
            $return['display_copyktp'] = 'hidden';
            $return['display_sd1'] = 'hidden';
            $return['display_sd2'] = 'hidden';
            $return['display_kwitansi'] = 'hidden';
            $return['display_kodeetik'] = 'hidden';
            $return['display_protokol'] = 'hidden';
            $return['display_skpengangkatan'] = 'hidden';
            $return['display_basjabatan'] = 'hidden';
            $return['display_keteranganalb'] = 'hidden';
            $return['display_rekpengda'] = 'hidden';
        } else if ($return['detailuser']['jenis'] == 'wreda') {
            $return['display_lokasimagang'] = 'hidden';
            $return['display_ijasah'] = 'hidden';
            $return['display_transkrip'] = 'hidden';
            $return['display_copyktp'] = 'hidden';
            $return['display_sd1'] = 'hidden';
            $return['display_sd2'] = 'hidden';
            $return['display_kwitansi'] = 'hidden';
            $return['display_kodeetik'] = 'hidden';
            $return['display_sertifikatpeningkatan'] = 'hidden';
            $return['display_skperpanjang'] = 'hidden';
            $return['display_skpengangkatan'] = 'hidden';
            $return['display_basjabatan'] = 'hidden';
            $return['display_keteranganalb'] = 'hidden';
            $return['display_rekpengda'] = 'hidden';
        }

        if ($return['detailuser']['ijasah'] == '') {
            $return['ijasah'] = 'Choose file';
        } else {
            $return['ijasah'] = $return['detailuser']['ijasah'];
        }
        if ($return['detailuser']['transkrip'] == '') {
            $return['transkrip'] = 'Choose file';
        } else {
            $return['transkrip'] = $return['detailuser']['transkrip'];
        }
        if ($return['detailuser']['foto_ktp'] == '') {
            $return['foto_ktp'] = 'Choose file';
        } else {
            $return['foto_ktp'] = $return['detailuser']['foto_ktp'];
        }
        if ($return['detailuser']['uang_pangkal'] == '') {
            $return['uang_pangkal'] = 'Choose file';
        } else {
            $return['uang_pangkal'] = $return['detailuser']['uang_pangkal'];
        }
        if ($return['detailuser']['sk_jabatan'] == '') {
            $return['sk_jabatan'] = 'Choose file';
        } else {
            $return['sk_jabatan'] = $return['detailuser']['sk_jabatan'];
        }
        if ($return['detailuser']['bas_jabatan'] == '') {
            $return['bas_jabatan'] = 'Choose file';
        } else {
            $return['bas_jabatan'] = $return['detailuser']['bas_jabatan'];
        }
        if ($return['detailuser']['ket_alb'] == '') {
            $return['ket_alb'] = 'Choose file';
        } else {
            $return['ket_alb'] = $return['detailuser']['ket_alb'];
        }
        if ($return['detailuser']['rek_pengda'] == '') {
            $return['rek_pengda'] = 'Choose file';
        } else {
            $return['rek_pengda'] = $return['detailuser']['rek_pengda'];
        }
        if ($return['detailuser']['sertifikat_peningkatan'] == '') {
            $return['sertifikat_peningkatan'] = 'Choose file';
        } else {
            $return['sertifikat_peningkatan'] = $return['detailuser']['sertifikat_peningkatan'];
        }
        if ($return['detailuser']['sk_perpanjangan'] == '') {
            $return['sk_perpanjangan'] = 'Choose file';
        } else {
            $return['sk_perpanjangan'] = $return['detailuser']['sk_perpanjangan'];
        }
        if ($return['detailuser']['sertifikat_protokol'] == '') {
            $return['sertifikat_protokol'] = 'Choose file';
        } else {
            $return['sertifikat_protokol'] = $return['detailuser']['sertifikat_protokol'];
        }
        return $return;
    }
    public function cekdata($jenis, $POST, $FILES)
    {
        $return['displayw'] = '';
        $return['displayc'] = 'alert-success';
        $return['warning'] = 'Data berhasil di simpan';

        if ($POST['tbnama'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Nama tidak boleh kosong';
        }
        if ($POST['tbtempatlahir'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Tempat lahir tidak boleh kosong';
        }
        if ($POST['tbtgllahir'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Tanggal lahir tidak boleh kosong';
        }
        if ($POST['tbtlp'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Nomor tlp tidak boleh kosong';
        }
        if ($POST['tbnoktp'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Nomor KTP tidak boleh kosong';
        }
        if ($this->ci_userModel->cekEmail($_POST['tbemail']) != null) {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Email sudah digunakan';
        }
        if ($this->ci_userModel->cekKTP($_POST['tbnoktp']) != null) {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'No KTP sudah terdaftar';
        }
        if ($POST['tbemail'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Email tidak boleh kosong';
        }
        if ($POST['tbpass'] == '') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Password tidak boleh kosong';
        }
        if (!isset($FILES['fphoto']) || $FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
        }

        if ($jenis == 'alb') {
            if ($POST['tbalamat'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Alamat tidak boleh kosong';
            }
            if ($POST['tblokasimagang'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Lokasi magang tidak boleh kosong';
            }
            if (!isset($FILES['fijazah']) || $FILES['fijazah']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Ijazah';
            }
            if (!isset($FILES['ftranskript']) || $FILES['ftranskript']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Transkrip';
            }
            if (!isset($FILES['ffotoktp']) || $FILES['ffotoktp']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Foto copy KTP';
            }
            if (!isset($_FILES['fuangpangkal']) || $_FILES['fuangpangkal']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Bukti Bayar Uang Pangkal';
            }
        } else if ($jenis == 'anggota') {
            if ($POST['tbalamatkantor'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Alamat kantor tidak boleh kosong';
            }
            if ($POST['cbpengda'] == '0') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Pengda harus di pilih';
            }/*
            if (!isset($FILES['fskjabatan']) || $FILES['fskjabatan']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan SK pengangkatan';
            }
            if (!isset($FILES['fbasjabatan']) || $FILES['fbasjabatan']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan BA sumpah';
            }
            if (!isset($FILES['fketalb']) || $FILES['fketalb']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Surat Keterangan ALB';
            }
            if (!isset($FILES['frekpengda']) || $FILES['frekpengda']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan Surat Rekomendasi Pengda';
            }*/
        } else if ($jenis == 'senior') {
            if ($POST['tbalamatkantor'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Alamat kantor tidak boleh kosong';
            }
            if ($POST['cbpengda'] == '0') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Pengda harus di pilih';
            }
            if (!isset($FILES['fspk']) || $FILES['fspk']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan sertifikat peningkatan kualitas';
            }
            if (!isset($FILES['fskperpanjang']) || $FILES['fskperpanjang']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan SK perpanjangan';
            }
        } else if ($jenis == 'wreda') {
            if ($POST['tbalamatkantor'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Alamat kantor tidak boleh kosong';
            }
            if ($POST['cbpengda'] == '0') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Pengda harus di pilih';
            }
            if (!isset($FILES['fspst']) || $FILES['fspst']['error'] == UPLOAD_ERR_NO_FILE) {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Harap sertakan sertifikat protocol serah terima';
            }
        }

        return $return;
    }
    public function qrcode($qrstring, $iduser)
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create($qrstring)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        // Create generic logo
        $logo = Logo::create('./img/LogoIPPAT.png')
            ->setResizeToWidth(50);
        $result = $writer->write($qrCode, $logo);
        $result->saveToFile('./img/qr/' . $iduser . '.png');
    }
    public function approve($iduser)
    {
        $data['judul'] = 'Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['menu_name'] == 'Anggota');
        });

        $this->ci_userModel->approveALB($iduser, $data['detailuser']['id_user']);
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
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin('', '', '0', '2');
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();
        echo view('layout/header', $data);
        echo view('anggota/index');
        echo view('layout/footer');
    }
    public function reject($iduser)
    {
        $data['judul'] = 'Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['menu_name'] == 'Anggota');
        });

        $this->ci_userModel->rejectALB($iduser, $data['detailuser']['id_user']);
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
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbpengda'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getAnggotaMin('', '', '0', '2');
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();
        echo view('layout/header', $data);
        echo view('anggota/index');
        echo view('layout/footer');
    }
    public function approvesertifikat($idevent)
    {
        $result = $this->ci_pesertaModel->approvePelatihan($idevent);
        $data['judul'] = 'Detail Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['detail'] = $this->ci_userModel->getUserDetailById($result['id_user']);
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($result['id_user']);
        $data['dokumen'] = $this->ci_dokumenModel->getDokumenByUser($result['id_user']);

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('anggota/detail', $data);
        echo view('layout/footer');
    }
    public function sertifikat($iduser, $template)
    {
        $data['judul'] = 'Detail Anggota';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);

        $kodeqr = 'http://ppippat.org/anggota/datauser/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = $iduser . '.png';

        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }
        echo view('sertifikat/' . $template, $data);
        echo view('layout/footer');
    }
    public function cekfile($FILES)
    {
        $return['judul'] = 'Edit Anggota';
        $return['detailuser'] = $_SESSION['detailuser'];
        $return['password'] = $_SESSION['password'];
        $return['displayw'] = '';
        $return['displayc'] = 'alert-success';
        $return['warning'] = 'Data berhasil di simpan';
        if ($FILES['fphoto']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
        }
        if ($FILES['fijazah']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['fijazah']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Ijazah (.pdf)';
        }
        if ($FILES['ftranskript']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['ftranskript']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Transkrip (.pdf)';
        }
        if ($FILES['ffotoktp']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['ffotoktp']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Foto copy KTP (.pdf)';
        }
        if ($_FILES['fuangpangkal']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['fuangpangkal']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Bukti Bayar Uang Pangkal (.pdf)';
        }
        return $return;
    }
    public function kta($iduser)
    {
        $data['judul'] = 'KTA';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/anggota/datauser/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = $iduser . '.png';
        $data['nomor'] = $data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota'];

        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }
        echo view('anggota/kta', $data);
        echo view('layout/footer');
    }
    public function ktaimage($iduser)
    {
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/anggota/datauser/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = $iduser . '.png';
        $data['nomor'] = implode(' ', str_split($data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota']));
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }

        $image = imagecreatetruecolor(570, 880);
        $font = realpath('fonts/calibri-bold.ttf');
        $font1 = realpath('fonts/AGENCYR.TTF');
        $white = imagecolorallocate($image, 255, 255, 255);
        $overlayImage = imagecreatefrompng('../' . $this->folder_public . '/img/BGKTA.png');
        if ($data['detail']['foto'] == '') {
            $overlayImageFoto = imagecreatefrompng('../' . $this->folder_public . '/img/' . $data['picture']);
        } else {
            $overlayImageFoto = imagecreatefromjpeg('../' . $this->folder_public . '/img/' . $data['picture']);
        }

        $overlayImageLogo = imagecreatefrompng('../' . $this->folder_public . '/img/LogoIPPAT.png');
        $overlayImageQR = imagecreatefrompng('../' . $this->folder_public . '/img/qr/' . $data['qr']);
        imageresolution($overlayImage, 7680, 7680);
        imageresolution($overlayImageFoto, 7680, 7680);
        imageresolution($overlayImageLogo, 7680, 7680);
        imageresolution($overlayImageQR, 7680, 7680);
        imagecopyresampled($image, $overlayImage, 0, 0, 0, 0, 570, 880, imagesx($overlayImage), imagesy($overlayImage));
        imagecopyresampled($image, $overlayImageLogo, 235, 18, 0, 0, 97, 97, imagesx($overlayImageLogo), imagesy($overlayImageLogo));
        imagettftext($image, 30, 0, 80, 150, $white, $font, "KARTU TANDA ANGGOTA");
        imagettftext($image, 18, 0, 86, 180, $white, $font, "IKATAN PEJABAT PEMBUAT AKTA TANAH");
        imagettftext($image, 18, 0, 246, 210, $white, $font, "(IPPAT)");
        imagecopyresampled($image, $overlayImageFoto, 210, 240, 0, 0, 150, 225, imagesx($overlayImageFoto), imagesy($overlayImageFoto));
        imagettftext($image, 35, 0, 115, 510, $white, $font, $data['nomor']);

        $box = imagettfbbox(22, 0, realpath('fonts/calibri-bold.ttf'), $data['detail']['nama']);
        $width = abs($box[4] - $box[0]);
        $x = (570 / 2) - ($width / 2);
        imagettftext($image, 22, 0, $x, 543, $white, $font, $data['detail']['nama']);
        $box = imagettfbbox(22, 0, realpath('fonts/calibri-bold.ttf'), $data['detail']['pengwil'] . " - " . $data['detail']['pengda']);
        $width = abs($box[4] - $box[0]);
        $x = (570 / 2) - ($width / 2);
        imagettftext($image, 22, 0, $x, 572, $white, $font, $data['detail']['pengwil'] . " - " . $data['detail']['pengda']);
        imagettftext($image, 15, 0, 87, 595, $white, $font, "KTA ini sudah ditandatangani secara elektronik");
        imagecopyresampled($image, $overlayImageQR, 210, 610, 0, 0, 150, 150, imagesx($overlayImageQR), imagesy($overlayImageQR));
        imagettftext($image, 17, 0, 230, 780, $white, $font, "2021 - 2024");
        imagettftext($image, 17, 0, 30, 810, $white, $font1, "Dr.HAPENDI HARAHAP SH.,Sp.N.,MH");
        imagettftext($image, 17, 0, 310, 810, $white, $font1, "OTTY H.C UBAYANI SH.,Sp.N.,MH");
        imagettftext($image, 17, 0, 110, 840, $white, $font1, "Ketua Umum");
        imagettftext($image, 17, 0, 360, 840, $white, $font1, "Sekretaris Umum");
        // send image to the browser    
        header("Content-Type: image/jpg");
        imagejpeg($image, NULL, 100);
        exit;
    }
}

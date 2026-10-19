<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_pelatihanModel;
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

class pendaftaranpelatihan extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_pelatihanModel;
    var $folder_public;

    public function __construct()
    {
        $this->folder_public = 'public_html';
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
        $this->ci_pelatihanModel = new ci_pelatihanModel();
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
        $data['judul'] = 'Peserta Pelatihan';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['id_menu'] == '10');
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
            $data['ssertifikat'] = $_POST['cbsertifikat'];
            $data['sjenis'] = $_POST['cbjenis'];
            $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbsertifikat'], $_POST['cbjenis']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['ssertifikat'] = '0';
            $data['sjenis'] = '0';
            $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan('', '', '0', '0');
        }
        $data['cbsertifikat'] = $this->ci_pelatihanModel->getPelatihan();

        echo view('layout/header', $data);
        echo view('pendaftaranpelatihan/index');
        echo view('layout/footer');
    }
    public function printanggota($sktp = "", $snama = "", $sertifikat = "", $sjenis = "")
    {
        $data['judul'] = 'Print Anggota';
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan($sktp, $snama, $sertifikat, $sjenis);
        echo view('pendaftaranpelatihan/printanggota', $data);
    }
    public function exportexcel($sktp = "", $snama = "", $sertifikat = "", $sjenis = "")
    {
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan($sktp, $snama, $sertifikat, $sjenis);
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

        $object->getActiveSheet()->setCellValue('A1', 'NOMOR ANGGOTA');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA');
        $object->getActiveSheet()->setCellValue('C1', 'KODE PENGDA');
        $object->getActiveSheet()->setCellValue('D1', 'KODE PENGWIL');
        $object->getActiveSheet()->setCellValue('E1', 'JENIS');
        $object->getActiveSheet()->setCellValue('F1', 'NAMA PELATIHAN');
        $object->getActiveSheet()->setCellValue('G1', 'STATUS');

        $baris = 2;

        foreach ($data['listanggota'] as $anggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $anggota['no_anggota']);
            $object->getActiveSheet()->setCellValue('B' . $baris, $anggota['nama']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $anggota['pengda']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $anggota['pengwil']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $anggota['jenis']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $anggota['nama_pelatihan']);
            if ($anggota['status'] == 2) {
                $object->getActiveSheet()->setCellValue('G' . $baris, 'PENDING');
            } else if ($anggota['status'] == 0) {
                $object->getActiveSheet()->setCellValue('G' . $baris, 'TERDAFTAR');
            } else {
                $object->getActiveSheet()->setCellValue('G' . $baris, 'HADIR');
            }

            $baris++;
        }
        $filename = "Data Peserta" . '.xlsx';
        $object->getActiveSheet()->setTitle('Data Peserta');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
    public function approve($idevent)
    {
        $result = $this->ci_pesertaModel->approvePendaftaran($idevent);
        $this->sendEmail($result['id_user'], strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $result['nama_pelatihan'])), $result['id_pelatihan']);
        $data['judul'] = 'Pelatihan';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['id_menu'] == '10');
        });
        $data['cbsertifikat'] = $this->ci_pelatihanModel->getPelatihan();
        $data['sktp'] = "null";
        $data['snama'] = "null";
        $data['sertifikat'] = $result['id_pelatihan'];
        $data['sjenis'] = $result['jenis'];
        $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan('', '', $data['sertifikat'], $data['sjenis']);

        $data['sktp'] = "null";
        $data['snama'] = "null";
        $data['ssertifikat'] = '0';
        $data['sjenis'] = '0';
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
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
    public function sendEmail($iduser, $pelatihan, $idevent)
    {
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/pendaftaranpelatihan/absen/' . $iduser;
        $this->qrcode($kodeqr, $pelatihan . $iduser);
        $from = "admin@ppippat.org";
        $to = $data['detail']['email'];
        $subject = "Undangan " . $pelatihan;
        $message =
            "http://ppippat.org/pendaftaranpelatihan/undangan/" . $pelatihan . "/" . $iduser . "/" . $idevent;
        $headers = "From:" . $from;

        //rumah web 1
        /*
        $email_smtp = \Config\Services::email();
        $email_smtp->setFrom($from, "Admin IPPAT");
        $email_smtp->setTo($to);
        $email_smtp->setSubject($subject);
        $email_smtp->setMessage($message);
        $email_smtp->send();

        //rumah web 2
        $email_smtp = \Config\Services::email();
        $config["protocol"] = "smtp";
        $config["SMTPHost"]  = "ppippat.org";
        $config["SMTPUser"]  = "admin@ppippat.org";
        $config["SMTPPass"]  = "adminppippat234";

        $config["SMTPPort"]  = 465;
        $config["SMTPCrypto"] = "ssl";

        $email_smtp->initialize($config);

        $email_smtp->setFrom($from, "Admin IPPAT");
        $email_smtp->setTo($to);
        $email_smtp->setSubject($subject);
        $email_smtp->setMessage($message);

        $email_smtp->send();
        */
        //niagara
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mail($to, $subject, $message, $headers);

        $data['judul'] = 'Pelatihan';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['akses'] = array_filter($data['menuuser'], function ($var) {
            return ($var['id_menu'] == '10');
        });
        $data['cbsertifikat'] = $this->ci_pelatihanModel->getPelatihan();
        $data['sktp'] = "null";
        $data['snama'] = "null";
        $data['sertifikat'] = $idevent;
        $data['sjenis'] = $data['detail']['jenis'];
        $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan('', '', $data['sertifikat'], $data['sjenis']);

        $data['sktp'] = "null";
        $data['snama'] = "null";
        $data['ssertifikat'] = '0';
        $data['sjenis'] = '0';

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('pendaftaranpelatihan/index');
        echo view('layout/footer');
    }
    public function undangan($pelatihan, $iduser, $idpelatihan)
    {
        if ($this->ci_pesertaModel->getPelatihanUserIdEvent($idpelatihan, $iduser) == null) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        //untuk rakernasbajo
        $data['pelatihanConfirm'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(24, $iduser));
        $data['pelatihanConfirm1'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(25, $iduser));
        $data['pelatihanConfirm2'] = count($this->ci_pesertaModel->getPelatihanUserIdEvent(26, $iduser));
        if ($data['pelatihanConfirm'] != 0) {
            header('Location: /rakernasbajo2023/kartuimage/' . $iduser . '/anggota');
            exit;
        } else if ($data['pelatihanConfirm1'] != 0) {
            header('Location: /rakernasbajo2023/kartuimage/' . $iduser . '/str');
            exit;
        } else if ($data['pelatihanConfirm2'] != 0) {
            header('Location: /rakernasbajo2023/kartuimage/' . $iduser . '/org');
            exit;
        }
        //
        $data['judul'] = 'Undangan';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/pendaftaranpelatihan/absen/' . $iduser;
        $this->qrcode($kodeqr, $pelatihan . $iduser);
        $data['qr'] = $pelatihan . $iduser . '.png';
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }
        echo view('undangan/' . $pelatihan, $data);
        echo view('layout/footer');
    }
    public function absenEvent($iduser)
    {
        $this->ci_pesertaModel->approvePelatihanByUserEvt($iduser, 19);
        $this->ci_pesertaModel->approvePelatihanByUserEvt($iduser, 20);
        $this->ci_pesertaModel->approvePelatihanByUserEvt($iduser, 21);
        header('Location: https://us06web.zoom.us/j/89263005094?pwd=cU9BbmxvRjlPSFBOVGxpbVltbzRBUT09');
        exit;
    }
    public function absen($iduser)
    {
        $data = [
            'judul' => 'Pendaftaran Rakernas atau Upgrading',
            'warning' => ''
        ];
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['listpelatihan'] = $this->ci_pesertaModel->getPelatihanAbsenUserId($iduser);
        echo view('layout/headerlogin.php', $data);
        echo view('pendaftaranpelatihan/absen');
        echo view('layout/footerlogin');
    }
    public function approveabsen()
    {
        $data = [
            'judul' => 'Login',
            'warning' => '',
            'detail' => $this->ci_userModel->getUserDetailById($_POST['tbiduser']),
            'listpelatihan' => $this->ci_pesertaModel->getPelatihanAbsenUserId($_POST['tbiduser'])
        ];
        if ($_POST['tbpin'] == '110923') {
            if ($_POST['rbpelatihan'] != 'blank') {
                $this->ci_pesertaModel->approvePelatihan($_POST['rbpelatihan']);
                echo view('layout/headerlogin.php', $data);
                echo view('login/index');
                echo view('layout/footerlogin');
            } else {
                $data['warning'] = "Anda belum memilih pelatihan";
                echo view('layout/headerlogin.php', $data);
                echo view('pendaftaranpelatihan/absen');
                echo view('layout/footer');
            }
        } else {
            $data['warning'] = "Pin anda salah";
            echo view('layout/headerlogin.php', $data);
            echo view('pendaftaranpelatihan/absen');
            echo view('layout/footer');
        }
    }
    public function daftar($iduser, $idpelatihan)
    {
        $data = [
            'judul' => 'Pendaftaran Rakernas atau Upgrading',
            'warning' => 'Mohon periksa kembali email dan nomor whatsapp'
        ];
        $data['idpelatihan'] = $idpelatihan;
        $data['detailuser'] = $this->ci_userModel->getUserDetailById($iduser);
        echo view('layout/headerlogin', $data);
        echo view('pendaftaranpelatihan/daftar', $data);
        echo view('layout/footer');
    }
    public function daftarberbayar($iduser, $idpelatihan, $jumlah)
    {
        $data = [
            'judul' => '',
            'warning' => '',
            'idpelatihan' => $idpelatihan,
            'detailuser' => $this->ci_userModel->getUserDetailById($iduser)
        ];
        if (count($this->ci_pesertaModel->getPelatihanUserIdEvent($idpelatihan, $iduser)) == 0) {
            if ($this->ci_pesertaModel->addPeserta($iduser, $idpelatihan, '2') > 0) {
                $data['judul'] = 'Bill';
                $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
                $data['bill'] = number_format($jumlah, 0, ",", ".");
                $data['nomor'] = date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_anggota'];
                if ($data['detail']['foto'] == '') {
                    $data['picture'] = 'nopicture.png';
                } else {
                    $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
                }
                $data['tglakhir'] = date("d-m-Y", time() + 86400);
                echo view('pendaftaranpelatihan/daftarberbayar', $data);
                echo view('layout/footer');
            } else {
                $data['warning'] = 'Pendaftaran masih belum bisa di process';
                $data['detailuser'] = $this->ci_userModel->getUserDetailById($iduser);
                $data['idpelatihan'] = $idpelatihan;
                header('Location: /anggota/datauser/' . $iduser);
                exit;
            }
        } else {
            header('Location: /anggota/datauser/' . $iduser);
            exit;
        }
    }
    public function daftar_proc()
    {
        $data = [
            'judul' => 'Pendaftaran Rakernas atau Upgrading',
            'warning' => 'Mohon periksa kembali email dan nomor whatsapp',
            'idpelatihan' => $_POST['tbidpelatihanr'],
            'detailuser' => $this->ci_userModel->getUserDetailById($_POST['tbiduser'])
        ];
        if ($_POST['tbemail'] == '') {
            $data['warning'] = 'Email tidak boleh kosong';
            $data['detailuser'] = $this->ci_userModel->getUserDetailById($_POST['tbiduser']);
            $data['idpelatihan'] = $_POST['tbidpelatihanr'];

            echo view('layout/headerlogin', $data);
            echo view('pendaftaranpelatihan/daftar', $data);
            echo view('layout/footer');
        } else {
            if ($_POST['tbtlp'] == '') {
                $data['warning'] = 'No whatsapp tidak boleh kosong';
                $data['detailuser'] = $this->ci_userModel->getUserDetailById($_POST['tbiduser']);
                $data['idpelatihan'] = $_POST['tbidpelatihanr'];

                echo view('layout/headerlogin', $data);
                echo view('pendaftaranpelatihan/daftar', $data);
                echo view('layout/footer');
            } else {
                if (count($this->ci_pesertaModel->getPelatihanUserIdEvent($_POST['tbidpelatihanr'], $_POST['tbiduser'])) == 0) {
                    if ($this->ci_pesertaModel->addPeserta($_POST['tbiduser'], $_POST['tbidpelatihanr'], '0') > 0) {
                        $this->ci_userModel->updateEmailTlp($_POST);
                        header('Location: /anggota/datauser/' . $_POST['tbiduser']);
                        exit;
                    } else {
                        $data['warning'] = 'Pendaftaran masih belum bisa di process';
                        $data['detailuser'] = $this->ci_userModel->getUserDetailById($_POST['tbiduser']);
                        $data['idpelatihan'] = $_POST['tbidpelatihanr'];

                        echo view('layout/headerlogin', $data);
                        echo view('pendaftaranpelatihan/daftar', $data);
                        echo view('layout/footer');
                    }
                } else {
                    header('Location: /anggota/datauser/' . $_POST['tbiduser']);
                    exit;
                }
            }
        }
    }
}

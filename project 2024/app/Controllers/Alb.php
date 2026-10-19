<?php

namespace App\Controllers;

use App\Models\ci_albModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_savebillModel;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use OCILob;

class Alb extends BaseController
{
    protected $ci_albModel;
    protected $ci_pesertaModel;
    protected $ci_savebillModel;
    protected $qrcode;
    var $folder_public;

    public function __construct()
    {
        $this->folder_public = 'pulic_html';
        $this->ci_albModel = new ci_albModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
        $this->ci_savebillModel = new ci_savebillModel();
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
        $data['judul'] = 'Alb';
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
            $data['sstatus'] = $_POST['cbstatus'];
            $data['sfrom'] =  $_POST['tbfrom'];
            $data['sto'] =  $_POST['tbto'];
            $data['listanggota'] = $this->ci_albModel->getAlbMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbstatus'], $_POST['tbfrom'], $_POST['tbto']);
        } else {
            $data['sktp'] = 'null';
            $data['snama'] = 'null';
            $data['sstatus'] = '2';
            $data['sfrom'] = date("Y-01-01");
            $data['sto'] = date("Y-m-d");
            $data['listanggota'] = $this->ci_albModel->getAlbMin('', '', '2', date("Y-01-01"), date("Y-m-d"));
        }

        echo view('layout/header', $data);
        echo view('alb/index');
        echo view('layout/footer');
    }

    public function add()
    {
        //sementara karna pendaftaran di tutup
        //header('Location: /login/index/');
        //exit;

        $data['judul'] = 'Pendaftaran ALB';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        echo view('alb/add', $data);
        echo view('layout/footer');
    }

    public function add_proc()
    {
        //untuk menentukan no alb
        $data = [
            'nama' => $_POST['tbnama'],
            'status' =>  0,
            'no_alb' => mt_rand(10000, 99999),
            'jenis' => 'alb',
            'id_role' => 7,
            'tempat_lahir' => $_POST['tbtempatlahir'],
            'tgl_lahir' => $_POST['tbtgllahir'],
            'alamat_tinggal' =>  $_POST['tbalamat'],
            'no_tlp' =>   $_POST['tbtlp'],
            'no_ktp' => $_POST['tbnoktp'],
            'lokasi_magang' => $_POST['tblokasimagang'],
            'universitas' => $_POST['tblokasisarjanah'],
            'email' =>  $_POST['tbemail'],
            'password' =>   $_POST['tbpass'],
            'foto' => $_FILES['fphoto']['name'],
            'ijazah_s1' => $_FILES['fijazahs1']['name'],
            'ijazah_s2' => $_FILES['fijazahs2']['name'],
            'transkrip' => $_FILES['ftranskript']['name'],
            'foto_ktp' => $_FILES['ffotoktp']['name'],
        ];

        $this->ci_albModel->insert($data);

        $userid = $this->ci_albModel->insertID();

        $databni = [
            'customer_name' => $_POST['tbnama'],
            'custumer_email' => $_POST['tbemail'],
            'custumer_phone' => $_POST['tbtlp'],
            'id_user' => $userid,
            'client_id' => 98988,
            'virtual_account' => 123498988 . mt_rand(10000, 99999),
            'trx_amount' => 2500000,
            'trx_id' => mt_rand(1000, 9999),

        ];

        $this->ci_savebillModel->insert($databni);

        /*$cek = false;
        $data['judul'] = 'Tambah Anggota';

        if ($_POST['tbnama'] != '') {
            if ($_POST['tbtempatlahir'] != '') {
                if ($_POST['tbtgllahir'] != '') {
                    if ($_POST['tbalamat'] != '') {
                        if ($_POST['tblokasimagang'] != '') {
                            if ($_POST['tbtlp'] != '') {
                                if ($_POST['tbnoktp'] != '' && $this->ci_albModel->cekKTP($_POST['tbnoktp']) == null && is_numeric($_POST['tbnoktp']) && strlen($_POST['tbnoktp']) == 16) {
                                    if ($_POST['tbemail'] != '' && filter_var($_POST['tbemail'], FILTER_VALIDATE_EMAIL)) {
                                        if ($this->ci_albModel->cekEmail($_POST['tbemail']) == null) {
                                            if ($_POST['tbpass'] != '' && $_POST['tbpass'] == $_POST['tbkpass']) {
                                                if (!isset($_FILES['fphoto']) || $_FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
                                                } else {
                                                    if (!isset($_FILES['fijazahs1']) || $_FILES['fijazahs1']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fijazahs1']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                        $data['displayw'] = '';
                                                        $data['displayc'] = 'alert-danger';
                                                        $data['warning'] = 'Harap sertakan Ijazah SH (.pdf)';
                                                    } else {
                                                        if (!isset($_FILES['fijazahs2']) || $_FILES['fijazahs2']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fijazahs2']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                            $data['displayw'] = '';
                                                            $data['displayc'] = 'alert-danger';
                                                            $data['warning'] = 'Harap sertakan Ijazah MKn (.pdf)';
                                                        } else {
                                                            if (!isset($_FILES['ftranskript']) || $_FILES['ftranskript']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['ftranskript']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                $data['displayw'] = '';
                                                                $data['displayc'] = 'alert-danger';
                                                                $data['warning'] = 'Harap sertakan Transkrip (.pdf)';
                                                            } else {
                                                                if (!isset($_FILES['ffotoktp']) || $_FILES['ffotoktp']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['ffotoktp']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Harap sertakan Foto copy KTP (.pdf)';
                                                                }
                                                                /*if (!isset($_FILES['fuangpangkal']) || $_FILES['fuangpangkal']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fuangpangkal']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                            $data['displayw'] = '';
                                                                            $data['displayc'] = 'alert-danger';
                                                                            $data['warning'] = 'Harap sertakan Kwitansi Uang Pangkal (.pdf)';
                                                                        } else {*/
        /*if ($this->ci_albModel->addalb($_POST, $_FILES) > 0) {
                                                                    $cek = true;
                                                                    $data['detailanggota'] = $this->ci_albModel->getUserDetail($_POST);
                                                                    $data['bill'] = 2500000;
                                                                } else {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Data gagal di tambah';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {
                                                $data['displayw'] = '';
                                                $data['displayc'] = 'alert-danger';
                                                $data['warning'] = 'Password tidak boleh kosong';
                                            }
                                        } else {
                                            $data['displayw'] = '';
                                            $data['displayc'] = 'alert-danger';
                                            $data['warning'] = 'Email sudah di gunakan';
                                        }
                                    } else {
                                        $data['displayw'] = '';
                                        $data['displayc'] = 'alert-danger';
                                        $data['warning'] = 'Email tidak valid';
                                    }
                                } else {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Nomor KTP tidak valid atau sudah di gunakan';
                                }
                            } else {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Nomor tlp tidak boleh kosong';
                            }
                        } else {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Lokasi magang tidak boleh kosong';
                        }
                    } else {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Alamat tidak boleh kosong';
                    }
                } else {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'Tanggal lahir tidak boleh kosong';
                }
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Tempat lahir tidak boleh kosong';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Nama tidak boleh kosong';
        }

        if ($cek) {
            header('Location: /alb/konfirmasi_bayar/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/');
            exit;
        } else {
            echo view('alb/add', $data);
            echo view('layout/footer');
        }*/
    }
}

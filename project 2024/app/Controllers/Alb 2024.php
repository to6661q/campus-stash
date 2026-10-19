<?php

namespace App\Controllers;

use App\Models\ci_albModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_billBniModel;
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
    protected $ci_billBniModel;
    protected $qrcode;
    var $folder_public;

    public function __construct()
    {
        $this->folder_public = 'pulic_html';
        $this->ci_albModel = new ci_albModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
        $this->ci_billBniModel = new ci_billBniModel();
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

    public function printalb($sktp = "", $snama = "", $sstatus = "", $sfrom = "", $sto = "")
    {
        if ($sfrom == "") {
            $sfrom = date("Y-01-01");
        }
        if ($sto == "") {
            $sto = date("Y-m-d");
        }
        $data['judul'] = 'Print ALB';
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        $data['listanggota'] = $this->ci_albModel->getAlbMin($sktp, $snama, $sstatus, $sfrom, $sto);
        echo view('alb/printalb', $data);
    }
    public function exportexcel($sktp = "", $snama = "", $sstatus = "", $sfrom = "", $sto = "")
    {
        if ($sktp == 'null') {
            $sktp = '';
        }
        if ($snama == 'null') {
            $snama = '';
        }
        if ($sfrom == "") {
            $sfrom = date("Y-01-01");
        }
        if ($sto == "") {
            $sto = date("Y-m-d");
        }
        $data['listanggota'] = $this->ci_albModel->getAlb($sktp, $snama, $sstatus, $sfrom, $sto);
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("IPPAT");
        $object->getProperties()->setLastModifiedBy("IPPAT");
        $object->getProperties()->setTitle("Daftar Anggota Luar Biasa");
        $object->setActiveSheetIndex(0);

        foreach (range('A', 'P') as $columnID) {
            $object->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $object->getActiveSheet()->getStyle('A1:O1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $object->getActiveSheet()->getStyle('A1:O1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00A105');
        $object->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('A1:O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'No ALB');
        $object->getActiveSheet()->setCellValue('C1', 'Nama');
        $object->getActiveSheet()->setCellValue('D1', 'Tempat Lahir');
        $object->getActiveSheet()->setCellValue('E1', 'Tanggal Lahir');
        $object->getActiveSheet()->setCellValue('F1', 'Alamat Tinggal');
        $object->getActiveSheet()->setCellValue('G1', 'Lokasi Magang');
        $object->getActiveSheet()->setCellValue('H1', 'Nomor Telp');
        $object->getActiveSheet()->setCellValue('I1', 'Nomor KTP');
        $object->getActiveSheet()->setCellValue('J1', 'Email');
        $object->getActiveSheet()->setCellValue('K1', 'Ijazah');
        $object->getActiveSheet()->setCellValue('L1', 'Transkrip');
        $object->getActiveSheet()->setCellValue('M1', 'Copy KTP');
        $object->getActiveSheet()->setCellValue('N1', 'Uang Pangkal');
        $object->getActiveSheet()->setCellValue('O1', 'Pendidikan Kenotariatan');

        $baris = 2;
        $nomor = 1;

        foreach ($data['listanggota'] as $anggota) {
            $object->getActiveSheet()->setCellValue('A' . $baris, (string)$nomor);
            $object->getActiveSheet()->setCellValue('B' . $baris, date("Y.m.", strtotime($anggota['created_at'])) . $anggota['no_alb']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $anggota['nama']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $anggota['tempat_lahir']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $anggota['tgl_lahir']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $anggota['alamat_tinggal']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $anggota['lokasi_magang']);
            $object->getActiveSheet()->setCellValue('H' . $baris, $anggota['no_tlp']);
            $object->getActiveSheet()->setCellValue('I' . $baris, ' ' . $anggota['no_ktp']);
            $object->getActiveSheet()->setCellValue('J' . $baris, $anggota['email']);
            if (empty($anggota['ijasah'])) {
                $object->getActiveSheet()->setCellValue('K' . $baris, 'Tidak Ada');
            } else {
                $object->getActiveSheet()->setCellValue('K' . $baris, 'Ada');
            }
            if (empty($anggota['transkrip'])) {
                $object->getActiveSheet()->setCellValue('L' . $baris, 'Tidak Ada');
            } else {
                $object->getActiveSheet()->setCellValue('L' . $baris, 'Ada');
            }
            if (empty($anggota['foto_ktp'])) {
                $object->getActiveSheet()->setCellValue('M' . $baris, 'Tidak Ada');
            } else {
                $object->getActiveSheet()->setCellValue('M' . $baris, 'Ada');
            }
            if (empty($anggota['uang_pangkal'])) {
                $object->getActiveSheet()->setCellValue('N' . $baris, 'Tidak Ada');
            } else {
                $object->getActiveSheet()->setCellValue('N' . $baris, 'Ada');
            }
            $object->getActiveSheet()->setCellValue('O' . $baris, $anggota['lokasi_sarjana']);
            $nomor++;
            $baris++;
        }
        $filename = "Data Alb" . '.xlsx';
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
        $cek = false;
        $data['judul'] = 'Tambah Anggota';
        $formData = $this->request->getPost();

        if ($formData['tbnama'] != '') {
            if ($formData['tbtempatlahir'] != '') {
                if ($formData['tbtgllahir'] != '') {
                    if ($formData['tbalamat'] != '') {
                        if ($formData['tblokasimagang'] != '') {
                            if ($formData['tbtlp'] != '') {
                                if ($formData['tbnoktp'] != '' && $this->ci_albModel->cekKTP($_POST['tbnoktp']) == null && is_numeric($_POST['tbnoktp']) && strlen($_POST['tbnoktp']) == 16) {
                                    if ($formData['tbemail'] != '' && filter_var($formData['tbemail'], FILTER_VALIDATE_EMAIL)) {
                                        if ($this->ci_albModel->cekEmail($_POST['tbemail']) == null) {
                                            if ($formData['tbpass'] != '' && $formData['tbpass'] == $formData['tbkpass']) {
                                                if (isset($formData['cbpernyataan']) && $formData['cbpernyataan'] == 'bersedia') {
                                                } else {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'Anda harus menyetujui pernyataan.';
                                                }
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
                                                                /*if ($this->ci_albModel->addalb($formData, $_FILES) > 0) {
                                                                $cek = true;
                                                                $data['detailanggota'] = $this->ci_albModel->getUserDetail($formData);
                                                                $data['bill'] = 2500000 + $data['detailanggota']['no_alb'];
                                                            }*/ else {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Data gagal di tambah';
                                                                }
                                                                /*}*/
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
            return redirect()->to("/alb/konfirmasi_bayar/{$data['detailanggota']['id_user']}");
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di tambah';
            }
        }

        echo view('alb/add', $data);
        echo view('layout/footer');
    }

    
    /*public function add_proc()
    {
        $cek = false;
        $data['judul'] = 'Tambah Anggota';
        $formData = $this->request->getPost();

        if ($formData['tbnama'] != '') {
            if ($formData['tbtempatlahir'] != '') {
                if ($formData['tbtgllahir'] != '') {
                    if ($formData['tbalamat'] != '') {
                        if ($formData['tblokasimagang'] != '') {
                            if ($formData['tbtlp'] != '') {
                                if ($formData['tbnoktp'] != '' && $this->ci_albModel->cekKTP($_POST['tbnoktp']) == null && is_numeric($_POST['tbnoktp']) && strlen($_POST['tbnoktp']) == 16) {
                                    if ($formData['tbemail'] != '' && filter_var($formData['tbemail'], FILTER_VALIDATE_EMAIL)) {
                                        if ($this->ci_albModel->cekEmail($_POST['tbemail']) == null) {
                                            if ($formData['tbpass'] != '' && $formData['tbpass'] == $formData['tbkpass']) {
                                                if (isset($formData['cbpernyataan']) && $formData['cbpernyataan'] == 'bersedia') {
                                                } else {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'Anda harus menyetujui pernyataan.';
                                                }
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
                                                                        } else {*//*
                                                                if ($this->ci_albModel->addalb($formData, $_FILES) > 0) {
                                                                    $cek = true;
                                                                    $data['detailanggota'] = $this->ci_albModel->getUserDetail($formData);
                                                                    $data['bill'] = 2500000 + $data['detailanggota']['no_alb'];
                                                                } else {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Data gagal di tambah';
                                                                }
                                                                /*}*//*
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
            return redirect()->to("/alb/konfirmasi_bayar/{$data['detailanggota']['id_user']}");
        } else {
            echo view('alb/add', $data);
            echo view('layout/footer');
        }*/
    //$billingData = $this->prepareBillingData($formData, $iduser);
    //$this->createBillingBNI($billingData);
    //}
    public function edit()
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Edit ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        if ($data['detailuser']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detailuser']['id_user'] . '.jpg';
        }
        if ($data['detailuser']['ijazah_s1'] == '') {
            $data['ijazah_s1'] = 'Choose file';
        } else {
            $data['ijazah_s1'] = $data['detailuser']['ijazah_s1'];
        }
        if ($data['detailuser']['ijazah_s2'] == '') {
            $data['ijazah_s2'] = 'Choose file';
        } else {
            $data['ijazah_s2'] = $data['detailuser']['ijazah_s2'];
        }
        if ($data['detailuser']['transkrip'] == '') {
            $data['transkrip'] = 'Choose file';
        } else {
            $data['transkrip'] = $data['detailuser']['transkrip'];
        }
        if ($data['detailuser']['foto_ktp'] == '') {
            $data['foto_ktp'] = 'Choose file';
        } else {
            $data['foto_ktp'] = $data['detailuser']['foto_ktp'];
        }
        if ($data['detailuser']['uang_pangkal'] == '') {
            $data['uang_pangkal'] = 'Choose file';
        } else {
            $data['uang_pangkal'] = $data['detailuser']['uang_pangkal'];
        }

        echo view('alb/edit', $data);
        echo view('layout/footer');
    }
    public function edit_proc()
    {
        $data['judul'] = 'Edit ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        if ($_POST['tbnama'] != '') {
            if ($_POST['tbtempatlahir'] != '') {
                if ($_POST['tbtgllahir'] != '') {
                    if ($_POST['tbalamat'] != '') {
                        if ($_POST['tblokasimagang'] != '') {
                            if ($_POST['tbtlp'] != '') {
                                if ($_POST['tbnoktp'] != '') {
                                    if ($_POST['tbemail'] != '') {
                                        if ($_POST['tbpass'] != '') {
                                            $data = $this->cekfile($_FILES);
                                            if ($data['warning'] == 'Data berhasil di simpan') {
                                                $data['detailuser'] = $this->ci_albModel->updateALB($_POST, $_FILES);
                                                if ($data['detailuser'] != 'Update gagal') {
                                                    $_SESSION['detailuser'] = $data['detailuser'];
                                                    $_SESSION['password'] = $_POST['tbpass'];
                                                    $data['password'] = $_POST['tbpass'];
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-success';
                                                    $data['warning'] = 'Data berhasil di update';
                                                } else {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'Gagal di update';
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
                                        $data['warning'] = 'Email tidak boleh kosong';
                                    }
                                } else {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Nomor KTP tidak boleh kosong';
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

        if ($data['detailuser']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detailuser']['id_user'] . '.jpg';
        }
        if ($data['detailuser']['ijazah_s1'] == '') {
            $data['ijazah_s1'] = 'Choose file';
        } else {
            $data['ijazah_s1'] = $data['detailuser']['ijazah_s1'];
        }
        if ($data['detailuser']['ijazah_s2'] == '') {
            $data['ijazah_s2'] = 'Choose file';
        } else {
            $data['ijazah_s2'] = $data['detailuser']['ijazah_s2'];
        }
        if ($data['detailuser']['transkrip'] == '') {
            $data['transkrip'] = 'Choose file';
        } else {
            $data['transkrip'] = $data['detailuser']['transkrip'];
        }
        if ($data['detailuser']['foto_ktp'] == '') {
            $data['foto_ktp'] = 'Choose file';
        } else {
            $data['foto_ktp'] = $data['detailuser']['foto_ktp'];
        }
        if ($data['detailuser']['uang_pangkal'] == '') {
            $data['uang_pangkal'] = 'Choose file';
        } else {
            $data['uang_pangkal'] = $data['detailuser']['uang_pangkal'];
        }

        echo view('alb/edit', $data);
        echo view('layout/footer');
    }
    public function editbyid($iduser)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Edit ALB';
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

        $data['detail'] = $this->ci_albModel->getUserDetailById($iduser);
        if ($data['detail']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detail']['id_user'] . '.jpg';
        }
        if ($data['detail']['ijazah_s1'] == '') {
            $data['ijazah_s1'] = 'Choose file';
        } else {
            $data['ijazah_s1'] = $data['detail']['ijazah_s1'];
        }
        if ($data['detail']['ijazah_s2'] == '') {
            $data['ijazah_s2'] = 'Choose file';
        } else {
            $data['ijazah_s2'] = $data['detail']['ijazah_s2'];
        }
        if ($data['detail']['transkrip'] == '') {
            $data['transkrip'] = 'Choose file';
        } else {
            $data['transkrip'] = $data['detail']['transkrip'];
        }
        if ($data['detail']['foto_ktp'] == '') {
            $data['foto_ktp'] = 'Choose file';
        } else {
            $data['foto_ktp'] = $data['detail']['foto_ktp'];
        }
        if ($data['detail']['uang_pangkal'] == '') {
            $data['uang_pangkal'] = 'Choose file';
        } else {
            $data['uang_pangkal'] = $data['detail']['uang_pangkal'];
        }

        echo view('layout/header', $data);
        echo view('alb/editbyid');
        echo view('layout/footer');
    }
    public function editbyid_proc()
    {
        $data['judul'] = 'Edit ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        if ($_POST['tbnama'] != '') {
            if ($_POST['tbtempatlahir'] != '') {
                if ($_POST['tbtgllahir'] != '') {
                    if ($_POST['tbalamat'] != '') {
                        if ($_POST['tblokasimagang'] != '') {
                            if ($_POST['tbtlp'] != '') {
                                if ($_POST['tbnoktp'] != '') {
                                    $data = $this->cekfile($_FILES);
                                    if ($data['warning'] == 'Data berhasil di simpan') {
                                        $data['detail'] = $this->ci_albModel->updateALBbyid($_POST, $_FILES);
                                        if ($data['detail'] != 'Update gagal') {
                                            $data['displayw'] = '';
                                            $data['displayc'] = 'alert-success';
                                            $data['warning'] = 'Data berhasil di update';
                                        } else {
                                            $data['displayw'] = '';
                                            $data['displayc'] = 'alert-danger';
                                            $data['warning'] = 'Gagal di update';
                                        }
                                    }
                                } else {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Nomor KTP tidak boleh kosong';
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

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['detail'] = $this->ci_albModel->getUserDetailById($_POST['tbid']);

        if ($data['detail']['foto'] == '') {
            $data['foto'] = 'Choose file';
        } else {
            $data['foto'] = $data['detail']['id_user'] . '.jpg';
        }
        if ($data['detail']['ijazah_s1'] == '') {
            $data['ijazah_s1'] = 'Choose file';
        } else {
            $data['ijazah_s1'] = $data['detail']['ijazah_s1'];
        }
        if ($data['detail']['ijazah_s2'] == '') {
            $data['ijazah_s2'] = 'Choose file';
        } else {
            $data['ijazah_s2'] = $data['detail']['ijazah_s2'];
        }
        if ($data['detail']['transkrip'] == '') {
            $data['transkrip'] = 'Choose file';
        } else {
            $data['transkrip'] = $data['detail']['transkrip'];
        }
        if ($data['detail']['foto_ktp'] == '') {
            $data['foto_ktp'] = 'Choose file';
        } else {
            $data['foto_ktp'] = $data['detail']['foto_ktp'];
        }
        if ($data['detail']['uang_pangkal'] == '') {
            $data['uang_pangkal'] = 'Choose file';
        } else {
            $data['uang_pangkal'] = $data['detail']['uang_pangkal'];
        }
        $data['judul'] = 'Edit ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        echo view('layout/header', $data);
        echo view('alb/editbyid');
        echo view('layout/footer');
    }
    public function delete($iduser)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Alb';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['cbtahun'] = $this->ci_albModel->getALByear();
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        $this->ci_albModel->hapus($iduser);
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
            $data['sstatus'] = $_POST['cbstatus'];
            $data['stahun'] = $_POST['cbtahun'];
            $data['listanggota'] = $this->ci_albModel->getAlbMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = 'null';
            $data['snama'] = 'null';
            $data['sstatus'] = '2';
            $data['stahun'] = 'null';
            $data['listanggota'] = $this->ci_albModel->getAlbMin('', '', '2');
        }

        echo view('layout/header', $data);
        echo view('alb/index');
        echo view('layout/footer');
    }
    public function detail($iduser)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }
        $data['judul'] = 'Detail ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['detail'] = $this->ci_albModel->getUserDetailById($iduser);
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($iduser);
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('alb/detail', $data);
        echo view('layout/footer');
    }
    public function skalb($iduser)
    {
        $data['detailuser'] = $this->ci_albModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/anggota/datauser/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = $iduser . '.png';
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['nomoralb'] = date("Y.m.", strtotime($data['detailuser']['created_at'])) . $data['detailuser']['no_alb'];

        echo view('alb/skalb', $data);
        echo view('layout/footer');
    }

    public function qrcode($qrstring, $iduser)
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create($qrstring)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low) // Perubahan disini
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
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
        $data['judul'] = 'Alb';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['cbtahun'] = $this->ci_albModel->getALByear();
        $data['sfrom'] = date("Y-01-01");
        $data['sto'] = date("Y-m-d");

        $this->ci_albModel->approveALB($iduser, $data['detailuser']['id_user']);
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
            $data['stahun'] = $_POST['cbtahun'];
            $data['listanggota'] = $this->ci_albModel->getAlbMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = 'null';
            $data['snama'] = 'null';
            $data['sstatus'] = '0';
            $data['stahun'] = 'null';
            $data['listanggota'] = $this->ci_albModel->getAlbMin('', '', '0');
        }

        echo view('layout/header', $data);
        echo view('alb/index');
        echo view('layout/footer');
    }
    public function reject($iduser)
    {
        $data['judul'] = 'Alb';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['cbtahun'] = $this->ci_albModel->getALByear();

        $this->ci_albModel->rejectALB($iduser, $data['detailuser']['id_user']);
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
            $data['stahun'] = $_POST['cbtahun'];
            $data['listanggota'] = $this->ci_albModel->getAlbMin($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbstatus']);
        } else {
            $data['sktp'] = 'null';
            $data['snama'] = 'null';
            $data['sstatus'] = '0';
            $data['stahun'] = 'null';
            $data['listanggota'] = $this->ci_albModel->getAlbMin('', '', '0');
        }

        echo view('layout/header', $data);
        echo view('alb/index');
        echo view('layout/footer');
    }
    public function approvesertifikat($idevent)
    {
        $result = $this->ci_pesertaModel->approvePelatihan($idevent);
        $data['judul'] = 'Detail ALB';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['password'] = $_SESSION['password'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['detail'] = $this->ci_albModel->getUserDetailById($result['id_user']);
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($result['id_user']);

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('alb/detail', $data);
        echo view('layout/footer');
    }
    public function sertifikat($iduser, $template)
    {
        $data['judul'] = 'Detail ALB';
        $data['detail'] = $this->ci_albModel->getUserDetailById($iduser);

        $kodeqr = 'http://ppippat.org/anggota/datauser/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = $iduser . '.png';

        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }
        $data['tanggal'] = $this->tgl_indo(date('Y-m-d'));
        echo view('sertifikat/' . $template, $data);
        echo view('layout/footer');
    }
    public function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    public function cekfile($FILES)
    {
        $return['judul'] = 'Edit ALB';
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
        if ($FILES['fijazahs1']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['fijazahs1']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Ijazah SH (.pdf)';
        }
        if ($FILES['fijazahs2']['error'] != UPLOAD_ERR_NO_FILE && pathinfo($FILES['fijazahs2']['name'], PATHINFO_EXTENSION) != 'pdf') {
            $return['displayw'] = '';
            $return['displayc'] = 'alert-danger';
            $return['warning'] = 'Harap sertakan Ijazah MKn (.pdf)';
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
    public function konfirmasi_bayar($iduser)
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['detail'] = $this->ci_albModel->getUserDetailById($iduser);
        echo view('alb/konfirmasi_bayar', $data);
        echo view('layout/footer');
    }
    /*public function prepareBillingData($formData, $iduser, $bill)
    {
        // Sesuaikan dengan logika bisnis Anda
        // Tentukan data apa saja yang dibutuhkan untuk billing BNI
        $billingData = [
            'client_id' => $iduser, // Sesuaikan dengan logika bisnis Anda
            'trx_amount' => $data['bill'] = number_format($bill, 0, ",", "."),
            'customer_name' => $formData['nama_pelanggan'],

            // ... tambahkan data lain yang dibutuhkan oleh BNI
        ];

        return $billingData;
    }*/
    /*public function createBillingBNI($billingData)
    {
        // Panggil model atau layanan untuk menyimpan data ke tabel billingbni
        $this->ci_billBniModel->saveBillingData($billingData);
    }*/
}

 //$data['bill'] = number_format($bill, 0, ",", ".");
        //$data['nomor'] = date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_alb'];
        /*if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }
        $data['tglakhir'] = date("d-m-Y", time() + 86400);
*/
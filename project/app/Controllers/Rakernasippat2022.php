<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_pelatihanModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class rakernasippat2022 extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_pelatihanModel;
    protected $qrcode;
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
    public function index()
    {
        //sementara karna pendaftaran di tutup
        header('Location: /login/index/');
        exit;
        $data = [
            'judul' => 'Pendaftaran Rakernas atau Upgrading',
            'warning' => ''
        ];
        echo view('layout/headerloginrak.php', $data);
        echo view('rakernasippat2022/index');
        echo view('layout/footerlogin');
    }
    public function nonkta()
    {
        //header('Location: /login/index/');
        //exit;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/headerrakernas', $data);
        echo view('rakernasippat2022/nonkta', $data);
        echo view('layout/footer');
    }
    public function addnonkta_proc()
    {
        $cek = false;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        if (!isset($_FILES['fphoto']) || $_FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
        } else {
            if ($_POST['tbnama'] != '') {
                if ($_POST['tbnoktp'] != '' && $this->ci_userModel->cekKTP($_POST['tbnoktp']) == null && is_numeric($_POST['tbnoktp']) && strlen($_POST['tbnoktp']) == 16) {
                    if ($_POST['tbtempatlahir'] != '' && $_POST['tbtgllahir'] != '') {
                        if ($_POST['tbalamatkantor'] != '') {
                            if ($_POST['tbtlp'] != '') {
                                if ($_POST['cbpengda'] != 0) {
                                    if (filter_var($_POST['tbemail'], FILTER_VALIDATE_EMAIL) && $this->ci_userModel->cekEmail($_POST['tbemail']) == null) {
                                        if ($_POST['tbpass'] != '' && $_POST['tbpass'] == $_POST['tbkpass']) {
                                            if (!isset($_FILES['fktp']) || $_FILES['fktp']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fktp']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                $data['displayw'] = '';
                                                $data['displayc'] = 'alert-danger';
                                                $data['warning'] = 'Harap sertakan copy ktp (.pdf)';
                                            } else {
                                                if ($_POST['tbnosk'] != '') {
                                                    if ($_POST['tbtglsk'] != '') {
                                                        if (!isset($_FILES['fskjabatan']) || $_FILES['fskjabatan']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fskjabatan']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                            $data['displayw'] = '';
                                                            $data['displayc'] = 'alert-danger';
                                                            $data['warning'] = 'Harap sertakan copy SK (.pdf)';
                                                        } else {
                                                            if (!isset($_FILES['fbasjabatan']) || $_FILES['fbasjabatan']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fskjabatan']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                $data['displayw'] = '';
                                                                $data['displayc'] = 'alert-danger';
                                                                $data['warning'] = 'Harap sertakan copy BA (.pdf)';
                                                            } else {
                                                                if ($_POST['tbtglbas'] != '') {
                                                                    $data['idrakernas'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas 2022')['id_pelatihan'];
                                                                    $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Upgrading 2022')['id_pelatihan'];
                                                                    if ($this->ci_userModel->addAnggota($_POST, $_FILES) > 0) {
                                                                        $data['detailanggota'] = $this->ci_userModel->getUserDetail($_POST);
                                                                        if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernas'], '2') > 0) {
                                                                            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                                                                                $cek = true;
                                                                                $data['bill'] = 1650000 + $data['detailanggota']['no_anggota'];
                                                                            } else {
                                                                                $data['displayw'] = '';
                                                                                $data['displayc'] = 'alert-danger';
                                                                                $data['warning'] = 'Data gagal di tambah';
                                                                            }
                                                                        } else {
                                                                            $data['displayw'] = '';
                                                                            $data['displayc'] = 'alert-danger';
                                                                            $data['warning'] = 'Data gagal di tambah';
                                                                        }
                                                                    } else {
                                                                        $data['displayw'] = '';
                                                                        $data['displayc'] = 'alert-danger';
                                                                        $data['warning'] = 'Data gagal di tambah';
                                                                    }
                                                                } else {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Tanggal BA tidak boleh kosong';
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $data['displayw'] = '';
                                                        $data['displayc'] = 'alert-danger';
                                                        $data['warning'] = 'Tanggal SK tidak boleh kosong';
                                                    }
                                                } else {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'No SK tidak boleh kosong';
                                                }
                                            }
                                        } else {
                                            $data['displayw'] = '';
                                            $data['displayc'] = 'alert-danger';
                                            $data['warning'] = 'Password tidak sesuai';
                                        }
                                    } else {
                                        $data['displayw'] = '';
                                        $data['displayc'] = 'alert-danger';
                                        $data['warning'] = 'Email tidak valid';
                                    }
                                } else {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Harap memilih pengda';
                                }
                            } else {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Alamat kantor tidak boleh kosong';
                            }
                        } else {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Alamat tidak boleh kosong';
                        }
                    } else {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Tempat tanggal lahir tidak boleh kosong';
                    }
                } else {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'KTP tidak valid atau sudah terdaftar';
                }
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Nama tidak boleh kosong';
            }
        }
        if ($cek) {
            header('Location: /rakernasippat2022/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/');
            exit;
        } else {
            echo view('layout/headerrakernas', $data);
            echo view('rakernasippat2022/nonkta', $data);
            echo view('layout/footer');
        }
    }
    public function kta()
    {
        //header('Location: /login/index/');
        //exit;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/headerrakernas', $data);
        echo view('rakernasippat2022/kta', $data);
        echo view('layout/footer');
    }
    public function addkta_proc()
    {
        $cek = false;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyNo($_POST['tbnomorkta']);
        $data['idrakernas'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas 2022')['id_pelatihan'];
        $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Upgrading 2022')['id_pelatihan'];
        if ($_POST['tbnomorkta'] != '' && !empty($data['detailanggota'])) {
            if (
                $this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idrakernas']) == null &&
                $this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idupgrading']) == null
            ) {
                if (filter_var($_POST['tbemail'], FILTER_VALIDATE_EMAIL) && $this->ci_userModel->cekEmailkta($_POST['tbemail'], $data['detailanggota']['id_user']) == null) {
                    if (!isset($_FILES['fphoto']) || $_FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
                    } else {
                        if ($_POST['tbpass'] != '' && $_POST['tbpass'] == $_POST['tbkpass']) {
                            $data['detailanggota'] = $this->ci_userModel->updateUserPassFoto($data['detailanggota']['id_user'], $_POST['tbemail'], $_POST['tbpass'], $_FILES);
                            if ($data['detailanggota'] != 'Update gagal') {
                                if (
                                    $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernas'], '2') > 0
                                ) {
                                    if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                                        $cek = true;
                                        $data['bill'] = 1650000 + $data['detailanggota']['no_anggota'];
                                    } else {
                                        $data['displayw'] = '';
                                        $data['displayc'] = 'alert-danger';
                                        $data['warning'] = 'Data gagal di tambah';
                                    }
                                } else {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Data gagal di tambah';
                                }
                            } else {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Gagal di update';
                            }
                        } else {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Konfirmasi password tidak sesuai';
                        }
                    }
                } else {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'Email tidak Valid';
                }
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Anda sudah pernah mendaftar';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Nomor Anggota tidak terdaftar';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();
        if ($cek) {
            header('Location: /rakernasippat2022/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/');
            exit;
        } else {
            echo view('layout/headerrakernas', $data);
            echo view('rakernasippat2022/kta', $data);
            echo view('layout/footer');
        }
    }
    public function alb()
    {
        //header('Location: /login/index/');
        //exit;
        $data['judul'] = 'Anggota Luar Biasa';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('layout/headerrakernas', $data);
        echo view('rakernasippat2022/alb', $data);
        echo view('layout/footer');
    }
    public function addalb_proc()
    {
        $cek = false;
        $data['judul'] = 'Anggota Luar Biasa';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAlbbyNo($_POST['tbnomoralb']);
        $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Upgrading 2022')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idupgrading']) == null) {
            if ($_POST['tbnomoralb'] != '' && !empty($data['detailanggota'])) {
                if (filter_var($_POST['tbemail'], FILTER_VALIDATE_EMAIL) && $this->ci_userModel->cekEmailkta($_POST['tbemail'], $data['detailanggota']['id_user']) == null) {
                    if (!isset($_FILES['fphoto']) || $_FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
                    } else {
                        $data['detailanggota'] = $this->ci_userModel->updateUserFoto($data['detailanggota']['id_user'], $_POST['tbemail'], $_FILES);
                        if ($data['detailanggota'] != 'Update gagal') {
                            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                                $cek = true;
                                $data['bill'] = 1100000 + $data['detailanggota']['no_anggota'];
                            } else {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Data gagal di tambah';
                            }
                        } else {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Gagal di update';
                        }
                    }
                } else {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'Email tidak Valid';
                }
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Nomor ALB tidak terdaftar';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Anda sudah pernah mendaftar';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        if ($cek) {
            header('Location: /rakernasippat2022/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/');
            exit;
        } else {
            echo view('layout/headerrakernas', $data);
            echo view('rakernasippat2022/alb', $data);
            echo view('layout/footer');
        }
    }
    public function bill($bill, $iduser)
    {
        $data['judul'] = 'Bill';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['bill'] = number_format($bill, 0, ",", ".");
        if ($data['detail']['jenis'] == 'alb') {
            $data['nomor'] = "No ALB : " . date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_anggota'];
            $data['kegiatan'] = "Upgrading";
        } else if ($data['detail']['jenis'] == 'anggota') {
            $data['nomor'] = "No KTA : " . $data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota'];
            $data['kegiatan'] = "Upgrading & Rakernas";
        }
        $data['tglakhir'] = date("d-m-Y", time() + 86400);
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['foto'];
        }
        echo view('rakernasippat2022/bill', $data);
        echo view('layout/footer');
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
}

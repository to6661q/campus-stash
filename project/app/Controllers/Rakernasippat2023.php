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

class rakernasippat2023 extends BaseController
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
    public function alb($noalb)
    {
        $cek = false;
        $data['judul'] = 'Anggota Luar Biasa';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAlbbyId($noalb);
        $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Upgrading 2023')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idupgrading']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                $cek = true;
                $data['bill'] = 1250000 + $data['detailanggota']['no_anggota'];
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di tambah';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Anda sudah pernah mendaftar';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        if ($cek) {
            header('Location: /rakernasippat2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Up Grading');
            exit;
        } else {
            header('Location: /anggota/datauser/' . $data['detailanggota']['id_user']);
            exit;
        }
    }
    public function anggota($id)
    {
        $cek = false;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyId($id);
        $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Upgrading Klb 2023')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idupgrading']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                $cek = true;
                $data['bill'] = 1500000 + $data['detailanggota']['no_anggota'];
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di tambah';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Anda sudah pernah mendaftar';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        if ($cek) {
            header('Location: /rakernasippat2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Up Grading dan KLB');
            exit;
        } else {
            header('Location: /anggota/datauser/' . $data['detailanggota']['id_user']);
            exit;
        }
    }
    public function pengurus($id)
    {
        $cek = false;
        $data['judul'] = 'Pengurus';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyId($id);
        $data['idupgrading'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas 2023')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idupgrading']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idupgrading'], '2') > 0) {
                $cek = true;
                $data['bill'] = 1500000 + $data['detailanggota']['no_anggota'];
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Data gagal di tambah';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Anda sudah pernah mendaftar';
        }
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        if ($cek) {
            header('Location: /rakernasippat2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Rakernas, KLB dan Up Grading');
            exit;
        } else {
            header('Location: /anggota/datauser/' . $data['detailanggota']['id_user']);
            exit;
        }
    }
    public function bill($bill, $iduser, $kegiatan)
    {
        $data['judul'] = 'Bill';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['bill'] = number_format($bill, 0, ",", ".");
        if ($data['detail']['jenis'] == 'alb') {
            $data['nomor'] = "No ALB : " . date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_anggota'];
            $data['kegiatan'] = "Upgrading";
        } else if ($data['detail']['jenis'] == 'anggota') {
            $data['nomor'] = "No KTA : " . $data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota'];
            $data['kegiatan'] = $kegiatan;
        }
        $data['tglakhir'] = date("d-m-Y", time() + 86400);
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['foto'];
        }
        echo view('rakernasippat2023/bill', $data);
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
        $result->saveToFile('./img/qr/rakernas2023' . $iduser . '.png');
    }
    public function kartuimage($iduser)
    {
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/pendaftaranpelatihan/absen/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = 'rakernas2023' . $iduser . '.png';

        if ($data['detail']['jenis'] == 'alb') {
            $data['nomor'] = date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_anggota'];
        } else {
            $data['nomor'] = implode(' ', str_split($data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota']));
        }
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['id_user'] . '.jpg';
        }

        $image = imagecreatetruecolor(1299, 1890);
        $font = realpath('fonts/calibri-bold.ttf');
        $font1 = realpath('fonts/AGENCYR.TTF');
        $black = imagecolorallocate($image, 0, 0, 0);
        $green = imagecolorallocate($image, 25, 100, 9);
        $white = imagecolorallocate($image, 255, 255, 255);
        $overlayImage = imagecreatefrompng('../' . $this->folder_public . '/img/BG_KartuRakernas2023.png');
        $overlayImageJambul = imagecreatefrompng('../' . $this->folder_public . '/img/Jambul_Rakernas2023.png');
        $overlayImageLogo = imagecreatefrompng('../' . $this->folder_public . '/img/LogoRakernas2023.png');
        if ($data['detail']['foto'] == '') {
            $overlayImageFoto = imagecreatefrompng('../' . $this->folder_public . '/img/' . $data['picture']);
        } else {
            $overlayImageFoto = imagecreatefromjpeg('../' . $this->folder_public . '/img/' . $data['picture']);
        }
        $overlayImageQR = imagecreatefrompng('../' . $this->folder_public . '/img/qr/' . $data['qr']);
        imageresolution($overlayImage, 7680, 7680);
        imageresolution($overlayImageJambul, 7680, 7680);
        imageresolution($overlayImageLogo, 7680, 7680);
        imageresolution($overlayImageFoto, 7680, 7680);
        imageresolution($overlayImageQR, 7680, 7680);
        imagecopyresampled($image, $overlayImage, 0, 0, 0, 0, 1299, 1890, imagesx($overlayImage), imagesy($overlayImage));
        imagecopyresampled($image, $overlayImageJambul, 0, -15, 0, 0, 840, 1423, imagesx($overlayImageJambul), imagesy($overlayImageJambul));
        imagecopyresampled($image, $overlayImageLogo, 500, 20, 0, 0, 300, 350, imagesx($overlayImageLogo), imagesy($overlayImageLogo));
        imagettftext($image, 40, 0, 80, 430, $black, $font, "KONGRES LUAR BIASA, RAKERNAS & UP-GRADING");
        imagettftext($image, 40, 0, 520, 500, $black, $font, "IPPAT 2023");
        imagettftext($image, 30, 0, 330, 550, $black, $font, "Depok - Jawa Barat, 23-24 Februari 2023");
        imagettftext($image, 90, 0, 250, 650, $green, $font, "KARTU PESERTA");
        imagettftext($image, 60, 0, 470, 720, $green, $font, "RAKERNAS");
        $mask = imagecreatetruecolor(530, 530);
        imagecopyresampled($image, $overlayImageFoto, 450, 825, 0, 0, 400, 400, imagesx($overlayImageFoto), imagesy($overlayImageFoto));
        imagecopyresampled($mask, $overlayImage, 0, 0, 385, 760, 1299, 1890, imagesx($overlayImage), imagesy($overlayImage));

        $transparent = imagecolorallocate($mask, 255, 0, 0);
        imagecolortransparent($mask, $transparent);
        imagefilledellipse($mask, 265, 265, 530, 530, $green);
        imagefilledellipse($mask, 265, 265, 400, 400, $transparent);
        $red = imagecolorallocate($mask, 0, 0, 0);
        imagecopymerge($image, $mask, 385, 760, 0, 0, 530, 530, 100);
        imagecolortransparent($image, $red);

        $box = imagettfbbox(50, 0, realpath('fonts/calibri-bold.ttf'), $data['detail']['nama']);
        $width = abs($box[4] - $box[0]);
        $x = (1299 / 2) - ($width / 2);
        imagettftext($image, 50, 0, $x, 1350, $black, $font, $data['detail']['nama']);

        $box = imagettfbbox(40, 0, realpath('fonts/calibri-bold.ttf'), 'KTA No. ' . $data['nomor']);
        $width = abs($box[4] - $box[0]);
        $x = (1299 / 2) - ($width / 2);
        imagettftext($image, 40, 0, $x, 1420, $black, $font, 'KTA No. ' . $data['nomor']);

        imagecopyresampled($image, $overlayImageQR, 500, 1450, 0, 0, 300, 300, imagesx($overlayImageQR), imagesy($overlayImageQR));
        // send image to the browser    
        header("Content-Type: image/jpg");
        imagejpeg($image, NULL, 100);
        exit;
    }
}

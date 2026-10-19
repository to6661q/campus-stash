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

class Rakernasbajo2023 extends BaseController
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
        $data['idrakernas'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idrakernas']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernas'], '2') > 0) {
                $cek = true;
                $data['bill'] = 1750000 + $data['detailanggota']['no_anggota'];
            }
        }
        if ($cek) {
            header('Location: /rakernasbajo2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Rakerna 2023 Labuan Bajo');
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
        $data['idrakernas'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023')['id_pelatihan'];
        $data['idrakernasorg'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023 Org')['id_pelatihan'];
        $data['idrakernasstr'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023 Str')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idrakernas']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernas'], '2') > 0) {
                $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernasorg'], '2');
                $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernasstr'], '2');
                $cek = true;
                $data['bill'] = 1850000 + $data['detailanggota']['no_anggota'];
            }
        }

        if ($cek) {
            header('Location: /rakernasbajo2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Rakernas dan Upgrading');
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
        } else if ($data['detail']['jenis'] == 'anggota') {
            $data['nomor'] = "No KTA : " . $data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota'];
        }
        $data['kegiatan'] = $kegiatan;
        $data['tglakhir'] = date("d-m-Y", time() + 86400);
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['foto'];
        }
        $from = "admin@ppippat.org";
        $to = $data['detail']['email'];
        $subject = "Bill " . $kegiatan;
        $message =
            "http://ppippat.org/rakernasbajo2023/bill/" . $bill . "/" . $iduser . "/" . $kegiatan;
        $headers = "From:" . $from;
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        try {
            mail($to, $subject, $message, $headers);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        } finally {
            echo view('rakernasbajo2023/bill', $data);
            echo view('layout/footer');
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
        $result->saveToFile('./img/qr/rakernasbajo2023' . $iduser . '.png');
    }
    public function kartuimage($iduser, $type)
    {
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $kodeqr = 'http://ppippat.org/pendaftaranpelatihan/absen/' . sprintf("%011d", $iduser);
        $this->qrcode($kodeqr, $iduser);
        $data['qr'] = 'rakernasbajo2023' . $iduser . '.png';

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
        $red = imagecolorallocate($image, 255, 0, 0);
        $blue = imagecolorallocate($image, 0, 0, 255);
        $green = imagecolorallocate($image, 0, 255, 0);
        $yellow = imagecolorallocate($image, 255, 255, 0);
        $white = imagecolorallocate($image, 255, 255, 255);
        $overlayImage = imagecreatefrompng('../' . $this->folder_public . '/img/BG_KartuRakernas2023.png');
        $overlayImageJambul = imagecreatefrompng('../' . $this->folder_public . '/img/Jambul_Rakernas2023.png');
        $overlayImageLogo = imagecreatefrompng('../' . $this->folder_public . '/img/LogoIPPAT.png');
        $overlayImageBajo = imagecreatefrompng('../' . $this->folder_public . '/img/LogoRakernasBajo2023.png');
        $overlayImageFooter = imagecreatefrompng('../' . $this->folder_public . '/img/BGRakernasBajo2023.png');
        if ($data['detail']['foto'] == '') {
            $overlayImageFoto = imagecreatefrompng('../' . $this->folder_public . '/img/' . $data['picture']);
        } else {
            $overlayImageFoto = imagecreatefromjpeg('../' . $this->folder_public . '/img/' . $data['picture']);
        }
        $overlayImageQR = imagecreatefrompng('../' . $this->folder_public . '/img/qr/' . $data['qr']);
        imageresolution($overlayImage, 7680, 7680);
        imageresolution($overlayImageJambul, 7680, 7680);
        imageresolution($overlayImageLogo, 7680, 7680);
        imageresolution($overlayImageQR, 7680, 7680);
        imageresolution($overlayImageBajo, 7680, 7680);
        imageresolution($overlayImageFooter, 7680, 7680);
        imageresolution($overlayImageFoto, 7680, 7680);
        imagecopyresampled($image, $overlayImage, 0, 0, 0, 0, 1299, 1890, imagesx($overlayImage), imagesy($overlayImage));
        imagecopyresampled($image, $overlayImageJambul, 0, -15, 0, 0, 840, 1423, imagesx($overlayImageJambul), imagesy($overlayImageJambul));
        imagecopyresampled($image, $overlayImageLogo, 100, 10, 0, 0, 300, 300, imagesx($overlayImageLogo), imagesy($overlayImageLogo));
        imagecopyresampled($image, $overlayImageQR, 500, 10, 0, 0, 300, 300, imagesx($overlayImageQR), imagesy($overlayImageQR));
        imagecopyresampled($image, $overlayImageBajo, 830, 30, 0, 0, 450, 250, imagesx($overlayImageBajo), imagesy($overlayImageBajo));
        imagecopyresampled($image, $overlayImageFooter, 0, 1400, 0, 0, 1299, 500, imagesx($overlayImageFooter), imagesy($overlayImageFooter));
        imagettftext($image, 40, 0, 320, 430, $black, $font, "RAKERNAS III (Pra Kongres) &");
        imagettftext($image, 40, 0, 370, 500, $black, $font, "UP - GRADING IPPAT 2023");
        imagettftext($image, 30, 0, 300, 550, $black, $font, "Labuan Bajo - NTT, 14-15 September 2023");
        if ($type == 'anggota') {
            imagettftext($image, 90, 0, 250, 650, $black, $font, "KARTU PESERTA");
        } else {
            imagettftext($image, 90, 0, 250, 650, $black, $font, "KARTU PANITIA");
        }
        $mask = imagecreatetruecolor(530, 530);
        imagecopyresampled($image, $overlayImageFoto, 450, 725, 0, 0, 400, 400, imagesx($overlayImageFoto), imagesy($overlayImageFoto));
        imagecopyresampled($mask, $overlayImage, 0, 0, 385, 660, 1299, 1890, imagesx($overlayImage), imagesy($overlayImage));

        $transparent = imagecolorallocate($mask, 0, 200, 0);
        imagecolortransparent($mask, $transparent);
        if ($data['detail']['jenis'] == 'alb') {
            imagefilledellipse($mask, 265, 265, 530, 530, $yellow);
            imagefilledrectangle($image, 0, 1790, 1299, 1890, $yellow);
            imagettftext($image, 60, 0, 500, 1870, $white, $font1, "UPGRADING");
        } else {
            if ($type == 'org') {
                imagefilledellipse($mask, 265, 265, 530, 530, $green);
                imagefilledrectangle($image, 0, 1400, 1299, 1500, $green);
                imagettftext($image, 60, 0, 350, 1480, $black, $font1, "ORGANIZING COMMITTEE");
            } elseif ($type == 'str') {
                imagefilledellipse($mask, 265, 265, 530, 530, $blue);
                imagefilledrectangle($image, 0, 1400, 1299, 1500, $blue);
                imagettftext($image, 60, 0, 380, 1480, $white, $font1, "STEERING COMMITTEE");
            } else {
                imagefilledellipse($mask, 265, 265, 530, 530, $red);
                imagefilledrectangle($image, 0, 1790, 1299, 1890, $red);
                imagettftext($image, 60, 0, 320, 1870, $white, $font1, "RAKERNAS & UPGRADING");
            }
        }
        imagefilledellipse($mask, 265, 265, 400, 400, $transparent);
        $red = imagecolorallocate($mask, 0, 0, 0);
        imagecopymerge($image, $mask, 385, 660, 0, 0, 530, 530, 100);
        imagecolortransparent($image, $red);

        $box = imagettfbbox(50, 0, realpath('fonts/calibri-bold.ttf'), $data['detail']['nama']);
        $width = abs($box[4] - $box[0]);
        $x = (1299 / 2) - ($width / 2);
        imagettftext($image, 50, 0, $x, 1250, $black, $font, $data['detail']['nama']);
        $box = imagettfbbox(40, 0, realpath('fonts/calibri-bold.ttf'), 'KTA No. ' . $data['nomor']);
        $width = abs($box[4] - $box[0]);
        $x = (1299 / 2) - ($width / 2);
        imagettftext($image, 40, 0, $x, 1320, $black, $font, 'KTA No. ' . $data['nomor']);
        // send image to the browser    
        header("Content-Type: image/jpg");
        imagejpeg($image, NULL, 100);
        exit;
    }
}

<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use PHPExcel;
use PHPExcel_IOFactory;

class Senior extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
    }
    public function logout()
    {
        session_destroy();
        header('Location: /login/index/');
        exit;
    }
    public function add()
    {
        $data['judul'] = 'Perpanjang Anggota';
        $data['detailuser'] = $_SESSION["detailuser"];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('senior/add', $data);
        echo view('layout/footer');
    }

    public function add_proc()
    {
        $data['judul'] = 'Perpanjang Anggota';
        $data['detailuser'] = $_SESSION["detailuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        if (!isset($_FILES['fskperpanjang']) || $_FILES['fskperpanjang']['error'] == UPLOAD_ERR_NO_FILE) {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Harap sertakan SK perpanjangan';
        } else {
            if (!isset($_FILES['fsertifikat']) || $_FILES['fsertifikat']['error'] == UPLOAD_ERR_NO_FILE) {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Harap sertakan sertifikat peningkatan kualitas';
            } else {
                $data['detailuser'] = $this->ci_userModel->addsenior($_POST, $_FILES);
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
        }

        echo view('senior/add', $data);
        echo view('layout/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Perpanjang Anggota';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        if ($data['detailuser']['sertifikat_peningkatan'] == '') {
            $data['sertifikat_peningkatan'] = 'Choose file';
        } else {
            $data['sertifikat_peningkatan'] = $data['detailuser']['sertifikat_peningkatan'];
        }
        if ($data['detailuser']['sk_perpanjangan'] == '') {
            $data['sk_perpanjangan'] = 'Choose file';
        } else {
            $data['sk_perpanjangan'] = $data['detailuser']['sk_perpanjangan'];
        }

        echo view('senior/edit', $data);
        echo view('layout/footer');
    }

    public function edit_proc()
    {
        $data['judul'] = 'Perpanjang Anggota';
        $data['detailuser'] = $this->ci_userModel->addsenior($_POST, $_FILES);
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

        if ($data['detailuser']['sertifikat_peningkatan'] == '') {
            $data['sertifikat_peningkatan'] = 'Choose file';
        } else {
            $data['sertifikat_peningkatan'] = $data['detailuser']['sertifikat_peningkatan'];
        }
        if ($data['detailuser']['sk_perpanjangan'] == '') {
            $data['sk_perpanjangan'] = 'Choose file';
        } else {
            $data['sk_perpanjangan'] = $data['detailuser']['sk_perpanjangan'];
        }

        echo view('senior/edit', $data);
        echo view('layout/footer');
    }

    public function detail($iduser)
    {
        var_dump($iduser);
        die();
    }
}

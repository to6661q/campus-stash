<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_pelatihanModel;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;

class reportpelatihan extends BaseController
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
        $data['judul'] = 'Peserta Pelatihan';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
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
            $data['sertifikat'] = $_POST['cbsertifikat'];
            $data['sstatus'] = $_POST['cbstatus'];
            $data['sjenis'] = $_POST['cbjenis'];
            $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan($_POST['tbnoktp'], $_POST['tbnama'], $_POST['cbsertifikat'], $_POST['cbjenis']);
        } else {
            $data['sktp'] = "null";
            $data['snama'] = "null";
            $data['spengda'] = '0';
            $data['sstatus'] = '2';
            $data['listanggota'] = $this->ci_userModel->getAnggotaPelatihan('', '', '0', '0');
        }
        $data['cbsertifikat'] = $this->ci_pelatihanModel->getPelatihan();

        echo view('layout/header', $data);
        echo view('reportpelatihan/index');
        echo view('layout/footer');
    }
}

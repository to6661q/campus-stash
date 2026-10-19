<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_menuModel;
use App\Models\ci_rolemenuModel;
use App\Models\ci_roleModel;
use App\Models\ci_pesertaModel;

class DashboardAnggota extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_menuModel;
    protected $ci_rolemenuModel;
    protected $ci_roleModel;
    protected $ci_pesertaModel;

    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
        $this->ci_menuModel = new ci_menuModel();
        $this->ci_rolemenuModel = new ci_rolemenuModel();
        $this->ci_roleModel = new ci_roleModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
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
        $data['jmlwreda'] = $this->ci_userModel->getWredacnt();
        $data['jmlanggota'] = $this->ci_userModel->getAnggotacnt();
        $data['jmlalb'] = $this->ci_userModel->getAlbcnt();
        $data['judul'] = 'Dashboard Anggota';
        $data['detailuser'] = $_SESSION["detailuser"];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['sertifikat'] = $this->ci_pesertaModel->getPelatihanUserId($data['detailuser']['id_user']);
        echo view('layout/header', $data);
        echo view('dashboardanggota/index', $data);
        echo view('layout/footer');
    }
}

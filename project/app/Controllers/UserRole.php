<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_roleModel;

class UserRole extends BaseController
{
    protected $ci_userModel;
    protected $ci_roleModel;

    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_roleModel = new ci_roleModel();
    }
    public function logout()
    {
        session_destroy();
        header('Location: /login/index/');
        exit;
    }
    public function index()
    {
        $data['judul'] = 'Manage User Role';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }
        if (isset($_POST['tbnoktp'])) {
            $data['sktp'] = $_POST['tbnoktp'];
            $data['snama'] = $_POST['tbnama'];
            $data['listanggota'] = $this->ci_userModel->getAnggotaRole($_POST['tbnoktp'], $_POST['tbnama']);
        } else {
            $data['sktp'] = "";
            $data['snama'] = "";
            $data['listanggota'] = $this->ci_userModel->getAnggotaRole('', '');
        }

        echo view('layout/header', $data);
        echo view('UserRole/index');
        echo view('layout/footer');
    }
    public function edit($iduser)
    {
        $data['judul'] = 'Manage User Role';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $data['datauser'] = $this->ci_userModel->getUserDetailById($iduser);
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }
        $data['cbrole'] = $this->ci_roleModel->getRole();
        echo view('layout/header', $data);
        echo view('UserRole/edit');
        echo view('layout/footer');
    }
    public function edit_proc()
    {
        $data['judul'] = 'Manage User Role';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        $this->ci_userModel->updateRole($_POST['tbid'], $_POST['cbrole']);
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }
        $data['listanggota'] = $this->ci_userModel->getAnggotaRole('', '');

        echo view('layout/header', $data);
        echo view('UserRole/index');
        echo view('layout/footer');
    }
}

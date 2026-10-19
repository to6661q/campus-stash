<?php

namespace App\Controllers;

use App\Models\cm_dokumenModel;

class Pengda extends BaseController
{
    protected $cm_dokumenModel;
    public function __construct()
    {
        $this->cm_dokumenModel = new cm_dokumenModel();
    }
    public function logout()
    {
        session_destroy();
        header('Location: /login/index/');
        exit;
    }

    public function index()
    {
        $data = [
            'judul' => 'Admin',
            'detailuser' => $_SESSION['detailuser'],
            'listdokumen' => $this->cm_dokumenModel->getDokument()
        ];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }

        echo view('layout/header', $data);
        echo view('pengda/index');
        echo view('layout/footer');
    }

    public function upload()
    {
        $data = [
            'judul' => 'Admin',
            'detailuser' => $_SESSION['detailuser'],
            'listdokumen' => $this->cm_dokumenModel->getDokument()
        ];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['foto'];
        }

        $this->cm_dokumenModel->uploadDokumen($_POST, $_FILES);
        $data['listdokumen'] = $this->cm_dokumenModel->getDokument();

        echo view('layout/header', $data);
        echo view('pengda/index');
        echo view('layout/footer');
    }
}

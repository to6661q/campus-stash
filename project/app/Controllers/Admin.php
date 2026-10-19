<?php

namespace App\Controllers;

use App\Models\cm_dokumenModel;

class Admin extends BaseController
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
            'listdokumen' => $this->cm_dokumenModel->getDokument(),
            'menuuser' => $_SESSION["menuuser"]
        ];

        $data['download'] = false;
        $data['delete'] = false;
        foreach ($data['menuuser'] as $menuuser) :
            if ($menuuser['download'] == '1' && $menuuser['menu_name'] == 'Kolektif Pengda') $data['download'] = true;
            if ($menuuser['delete'] == '1' && $menuuser['menu_name'] == 'Kolektif Pengda') $data['delete'] = true;
        endforeach;

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('admin/index');
        echo view('layout/footer');
    }

    public function upload()
    {
        $this->cm_dokumenModel->uploadDokumen($_POST, $_FILES);
        $data = [
            'judul' => 'Admin',
            'detailuser' => $_SESSION['detailuser'],
            'listdokumen' => $this->cm_dokumenModel->getDokument(),
            'menuuser' => $_SESSION["menuuser"]
        ];

        $data['download'] = false;
        $data['delete'] = false;
        foreach ($data['menuuser'] as $menuuser) :
            if ($menuuser['download'] == '1' && $menuuser['menu_name'] == 'Kolektif Pengda') $data['download'] = true;
            if ($menuuser['delete'] == '1' && $menuuser['menu_name'] == 'Kolektif Pengda') $data['delete'] = true;
        endforeach;

        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }

        echo view('layout/header', $data);
        echo view('admin/index');
        echo view('layout/footer');
    }

    public function deleteDokumen($idDoc = "")
    {
        $data = [
            'judul' => 'Admin',
            'detailuser' => $_SESSION['detailuser'],
            'listdokumen' => $this->cm_dokumenModel->getDokument()
        ];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $this->cm_dokumenModel->deleteDokumen($idDoc);
        $data['listdokumen'] = $this->cm_dokumenModel->getDokument();

        echo view('layout/header', $data);
        echo view('admin/index');
        echo view('layout/footer');
    }
}

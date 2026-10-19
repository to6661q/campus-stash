<?php

namespace App\Controllers;

use App\Models\ci_roleModel;
use App\Models\ci_menuModel;
use App\Models\ci_rolemenuModel;

class RoleMenu extends BaseController
{
    protected $ci_roleModel;
    protected $ci_menuModel;
    protected $ci_rolemenuModel;

    public function __construct()
    {
        $this->ci_roleModel = new ci_roleModel();
        $this->ci_menuModel = new ci_menuModel();
        $this->ci_rolemenuModel = new ci_rolemenuModel();
    }
    public function logout()
    {
        session_destroy();
        header('Location: /login/index/');
        exit;
    }

    public function index()
    {
        $data['judul'] = 'Role Menu';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['listrole'] = $this->ci_roleModel->getRole();

        echo view('layout/header', $data);
        echo view('rolemenu/index');
        echo view('layout/footer');
    }

    public function editbyid($idrole)
    {
        $data['judul'] = 'Role Menu';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['role'] = $this->ci_roleModel->getRolebyid($idrole);
        $data['listaccess'] = $this->ci_rolemenuModel->getRoleMenubyRoleid($idrole);
        $data['listmenu'] = $this->ci_menuModel->getMenu();

        echo view('layout/header', $data);
        echo view('rolemenu/editbyid');
        echo view('layout/footer');
    }
    public function editbyid_proc($idrole)
    {
        if (!isset($_SESSION['detailuser'])) {
            session_destroy();
            header('Location: /login/index/');
            exit;
        }

        $data['judul'] = 'Role Menu';
        $data['detailuser'] = $_SESSION['detailuser'];
        $data['menuuser'] = $_SESSION["menuuser"];
        if ($data['detailuser']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detailuser']['id_user'] . '.jpg';
        }
        $data['role'] = $this->ci_roleModel->getRolebyid($idrole);
        $data['listmenu'] = $this->ci_menuModel->getMenu();
        $this->ci_rolemenuModel->deleteMenubyRoleid($idrole);
        foreach ($data['listmenu'] as $lmenu) {
            if (isset($_POST['Akses' . $lmenu['id_menu']])) {
                $add = 0;
                $edit = 0;
                $delete = 0;
                $download = 0;
                $upload = 0;
                $approve = 0;
                if (isset($_POST['Add' . $lmenu['id_menu']])) {
                    $add = 1;
                }
                if (isset($_POST['Edit' . $lmenu['id_menu']])) {
                    $edit = 1;
                }
                if (isset($_POST['Delete' . $lmenu['id_menu']])) {
                    $delete = 1;
                }
                if (isset($_POST['Download' . $lmenu['id_menu']])) {
                    $download = 1;
                }
                if (isset($_POST['Upload' . $lmenu['id_menu']])) {
                    $upload = 1;
                }
                if (isset($_POST['Approve' . $lmenu['id_menu']])) {
                    $approve = 1;
                }
                $this->ci_rolemenuModel->insertMenubyRoleid($lmenu['id_menu'], $idrole,  $add, $edit, $delete, $download, $upload, $approve);
            }
        }
        $data['listaccess'] = $this->ci_rolemenuModel->getRoleMenubyRoleid($idrole);

        echo view('layout/header', $data);
        echo view('rolemenu/editbyid');
        echo view('layout/footer');
    }
}

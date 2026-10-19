<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_albModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use DateTime;

class Login extends BaseController
{
    protected $ci_userModel;
    protected $ci_albModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_albModel = new ci_albModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'warning' => ''
        ];
        echo view('layout/headerlogin', $data);
        echo view('login/index');
        echo view('layout/footerlogin');
    }
    public function process()
    {
        $data = [
            'judul' => 'Login',
            'warning' => '',
            'detailuser' => $this->ci_userModel->getUserDetail($_POST),
            'menuuser' => $this->ci_userModel->getUserMenu($_POST),
            'picture' => '',
            'displayw' => 'hidden',
            'displayc' => 'alert-success',
            'cbpengwil' => $this->ci_pengwilModel->getPengwil(),
            'cbpengda' => $this->ci_pengdaModel->getPengda(),
            'password' => $_POST['tbpass'],
            'sktp' => "null",
            'snama' => "null",
            'spengwil' => 0,
            'spengda' => 0
        ];
        if (empty($data['detailuser'])) {
            $data['warning'] = 'Username atau Password Salah';
            echo view('layout/headerlogin', $data);
            echo view('login/index');
            echo view('layout/footerlogin');
        } else {
            $now = new DateTime();
            $date = new DateTime($data['detailuser']['tgl_lahir']);
            $umur = date_diff($now, $date)->y;
            if ($umur > 65 || $data['detailuser']['jenis'] == 'wreda' || $data['detailuser']['jenis'] == 'senior' || $data['detailuser']['id_role'] == '1') {
                if ($data['detailuser']['jenis'] == 'alb' && $data['detailuser']['status'] == 0) {
                    $_SESSION["detailuser"] = $data['detailuser'];
                    $_SESSION["judul"] = 'Pendaftaran ALB';
                    $_SESSION["password"] = $_POST['tbpass'];

                    header('Location: /Alb/konfirmasi_bayar/');
                    //return redirect()->to("/alb/konfirmasi_bayar/{$data['detailanggota']['id_user']}");
                    // Redirect ke halaman konfirmasi pembayaran untuk jenis pengguna 'alb'
                    //return redirect()->to('/Alb/konfirmasi_bayar/');
                    exit;
                } else if ($data['detailuser']['jenis'] == 'wreda' && $data['detailuser']['status'] == 0) {
                    $_SESSION["detailuser"] = $data['detailuser'];
                    $_SESSION["judul"] = 'Pendaftaran';
                    $_SESSION["password"] = $_POST['tbpass'];

                    header('Location: /Wreda/edit/');
                    exit;
                } else if ($data['detailuser']['jenis'] == 'senior' && $data['detailuser']['status'] == 0) {
                    $_SESSION["detailuser"] = $data['detailuser'];
                    $_SESSION["judul"] = 'Pendaftaran';
                    $_SESSION["password"] = $_POST['tbpass'];

                    header('Location: /Senior/edit/');
                    exit;
                } else {
                    $_SESSION["detailuser"] = $data['detailuser'];
                    $_SESSION["menuuser"] = $data['menuuser'];
                    $_SESSION["password"] = $_POST['tbpass'];

                    header('Location: /DashboardAnggota/index/');
                    exit;
                }
            } else {
                $_SESSION["detailuser"] = $data['detailuser'];
                $_SESSION["judul"] = 'Pendaftaran';
                $_SESSION["password"] = $_POST['tbpass'];

                header('Location: /Wreda/add/');
                exit;
            }
            /*
            if ($data['detailuser']['id_role'] == '3') {
                header('Location: /anggota/edit/');
                exit;
            } else if ($data['detailuser']['id_role'] == '2') {
                header('Location: /anggota/index/');
                exit;
            } else if ($data['detailuser']['id_role'] == '0') {
                header('Location: /admin/index/');
                exit;
            } else if ($data['detailuser']['id_role'] == '1') {
                header('Location: /pengda/index/');
                exit;
            } else {
                header('Location: /dashboardanggota/index/');
                exit;
            }*/
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_beritaModel;

class Web extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_beritaModel;
    public function __construct()
    {
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
        $this->ci_beritaModel = new ci_beritaModel();
    }
    public function index()
    {
        header('Location: /wp/index.php');
        exit;
        $data = $this->setdata('Branda');
        $data['judul'] = 'Web Ippat';
        $data['beritaterkini'] = $this->ci_beritaModel->getBerita();
        echo view('layout/headerweb', $data);
        echo view('web/index');
        echo view('layout/footerweb');
    }
    public function beritappipat($id = 0)
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        $data['beritappipat'] = $this->ci_beritaModel->getBeritabyJenis('beritappipat');
        if ($id == 0) {
            $data['beritadetail'] = $this->ci_beritaModel->getBeritabyJenisTerkini('beritappipat');
        } else {
            $data['beritadetail'] = $this->ci_beritaModel->getBeritabyid($id);
        }
        echo view('layout/headerweb', $data);
        echo view('web/beritappipat');
        echo view('layout/footerweb');
    }
    public function beritapengwil($id = 0)
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        $data['beritapengwil'] = $this->ci_beritaModel->getBeritabyJenis('beritapengwil');
        if ($id == 0) {
            $data['beritadetail'] = $this->ci_beritaModel->getBeritabyJenisTerkini('beritapengwil');
        } else {
            $data['beritadetail'] = $this->ci_beritaModel->getBeritabyid($id);
        }
        echo view('layout/headerweb', $data);
        echo view('web/beritapengwil');
        echo view('layout/footerweb');
    }
    public function beritapengda()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/beritapengda');
        echo view('layout/footerweb');
    }
    public function breakingnews()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/breakingnews');
        echo view('layout/footerweb');
    }
    public function seputarippat()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/seputarippat');
        echo view('layout/footerweb');
    }
    public function galerifoto()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/galerifoto');
        echo view('layout/footerweb');
    }
    public function galerivideo()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/galerivideo');
        echo view('layout/footerweb');
    }
    public function article()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/article');
        echo view('layout/footerweb');
    }
    public function sahabatippat()
    {
        $data = $this->setdata('Berita');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/sahabatippat');
        echo view('layout/footerweb');
    }
    public function struktur()
    {
        $data = $this->setdata('Profil');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/struktur');
        echo view('layout/footerweb');
    }
    public function visimisi()
    {
        $data = $this->setdata('Profil');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/visimisi');
        echo view('layout/footerweb');
    }
    public function konshukum()
    {
        $data = $this->setdata('Layanan');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/konshukum');
        echo view('layout/footerweb');
    }
    public function konspjp()
    {
        $data = $this->setdata('Layanan');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/konspjp');
        echo view('layout/footerweb');
    }
    public function konsorg()
    {
        $data = $this->setdata('Layanan');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/konsorg');
        echo view('layout/footerweb');
    }
    public function kantor()
    {
        $data = $this->setdata('Publik');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/kantor');
        echo view('layout/footerweb');
    }
    public function ppup()
    {
        $data = $this->setdata('Regulasi');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/ppup');
        echo view('layout/footerweb');
    }
    public function ppbank()
    {
        $data = $this->setdata('Regulasi');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/ppbank');
        echo view('layout/footerweb');
    }
    public function pengumuman()
    {
        $data = $this->setdata('Agenda');
        $data['judul'] = 'Web Ippat';
        echo view('layout/headerweb', $data);
        echo view('web/pengumuman');
        echo view('layout/footerweb');
    }
    public function setdata($select)
    {
        $data['branda'] = '';
        $data['berita'] = '';
        $data['profil'] = '';
        $data['layanan'] = '';
        $data['publik'] = '';
        $data['regulasi'] = '';
        $data['agenda'] = '';
        if ($select == 'Branda') $data['branda'] = 'nav-actived';
        if ($select == 'Berita') $data['berita'] = 'nav-actived';
        if ($select == 'Profil') $data['profil'] = 'nav-actived';
        if ($select == 'Layanan') $data['layanan'] = 'nav-actived';
        if ($select == 'Publik') $data['publik'] = 'nav-actived';
        if ($select == 'Regulasi') $data['regulasi'] = 'nav-actived';
        if ($select == 'Agenda') $data['agenda'] = 'nav-actived';
        return $data;
    }
}

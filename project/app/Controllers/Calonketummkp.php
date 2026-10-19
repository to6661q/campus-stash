<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_pelatihanModel;
use App\Models\ci_dokumenuserModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Calonketummkp extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_pelatihanModel;
    protected $ci_dokumenuserModel;
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
        $this->ci_dokumenuserModel = new ci_dokumenuserModel();
    }
    public function index()
    {
        //sementara karna pendaftaran di tutup
        header('Location: /login/index/');
        exit;
        $data = [
            'judul' => 'Pendaftaran Calon Ketum atau MKP',
            'warning' => ''
        ];
        echo view('layout/headermkp', $data);
        echo view('calonketummkp/index');
    }
    public function ketum()
    {
        header('Location: /login/index/');
        exit;
        $data['judul'] = 'Calon Ketua Umum';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';

        echo view('calonketummkp/ketum', $data);
        echo view('layout/footer');
    }
    public function addketum_proc()
    {
        $cek = false;
        $data['judul'] = 'Calon Ketua Umum';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyNo($_POST['tbnomorkta']);
        if ($_POST['tbnomorkta'] != '' && !empty($data['detailanggota'])) {
            if (strlen($_POST['tbnomorktp']) == 16 && is_numeric($_POST['tbnomorktp'])) {
                if ((!isset($_FILES['fktp']) || $_FILES['fktp']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fktp']['name'], PATHINFO_EXTENSION) != 'pdf') && $data['detailanggota']['foto_ktp'] == '') {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'Harap Sertakan Foto KTP';
                } else {
                    if (!isset($_FILES['fcv']) || $_FILES['fcv']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fcv']['name'], PATHINFO_EXTENSION) != 'pdf') {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Harap Sertakan Biodata';
                    } else {
                        if (!isset($_FILES['fsk']) || $_FILES['fsk']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fsk']['name'], PATHINFO_EXTENSION) != 'pdf') {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Harap Sertakan SK Pengangkatan';
                        } else {
                            if (!isset($_FILES['fbas']) || $_FILES['fbas']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fbas']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Harap Sertakan BAS Jabatan';
                            } else {
                                if (!isset($_FILES['fspkes']) || $_FILES['fspkes']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fspkes']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Harap Sertakan Surat Pernyataan kesediaan menjadi ketum';
                                } else {
                                    if (!isset($_FILES['fsppidana']) || $_FILES['fsppidana']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fsppidana']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                        $data['displayw'] = '';
                                        $data['displayc'] = 'alert-danger';
                                        $data['warning'] = 'Harap Sertakan Surat Pernyataan tidak pernah di pidana';
                                    } else {
                                        if (!isset($_FILES['fskketuapengda']) || $_FILES['fskketuapengda']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fskketuapengda']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                            $data['displayw'] = '';
                                            $data['displayc'] = 'alert-danger';
                                            $data['warning'] = 'Harap Sertakan SK Ketua Pengda';
                                        } else {
                                            if (!isset($_FILES['fpi']) || $_FILES['fpi']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fpi']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                $data['displayw'] = '';
                                                $data['displayc'] = 'alert-danger';
                                                $data['warning'] = 'Harap Sertakan Pakta Integritas';
                                            } else {
                                                if (!isset($_FILES['fnarkoba']) || $_FILES['fnarkoba']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fnarkoba']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                    $data['displayw'] = '';
                                                    $data['displayc'] = 'alert-danger';
                                                    $data['warning'] = 'Harap Sertakan SK bebas narkoba dari RS';
                                                } else {
                                                    if (!isset($_FILES['fsehat']) || $_FILES['fsehat']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fsehat']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                        $data['displayw'] = '';
                                                        $data['displayc'] = 'alert-danger';
                                                        $data['warning'] = 'Harap Sertakan SK sehat jasmani dan rohani dari RS';
                                                    } else {
                                                        $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], '22', 0);
                                                        $this->ci_userModel->updateBAS($data['detailanggota']['id_user'], $_FILES);
                                                        $this->ci_userModel->updateSK($data['detailanggota']['id_user'], $_FILES);
                                                        $this->ci_userModel->updateKTP($data['detailanggota']['id_user'], $_FILES, $_POST);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 1, $_FILES['fcv']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 2, $_FILES['fspkes']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 3, $_FILES['fsppidana']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 4, $_FILES['fskketuapengda']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 5, $_FILES['fpi']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 6, $_FILES['fnarkoba']);
                                                        $this->ci_dokumenuserModel->adddokumen($data['detailanggota']['id_user'], 7, $_FILES['fsehat']);
                                                        $cek = true;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Harap isi no ktp dengan benar';
            }
        } else {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-danger';
            $data['warning'] = 'Nomor Anggota tidak terdaftar';
        }
        if ($cek) {
            $data['displayw'] = '';
            $data['displayc'] = 'alert-success';
            $data['warning'] = 'Terima Kasih Telah Mendaftar';
        }
        echo view('calonketummkp/ketum', $data);
        echo view('layout/footer');
    }
    public function mkp()
    {
        header('Location: /login/index/');
        exit;
        $data['judul'] = 'Calon Anggota MKP';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();

        echo view('calonketummkp/mkp', $data);
        echo view('layout/footer');
    }
    public function addmkp_proc()
    {
        $cek = false;
        $data['judul'] = 'Calon Anggota MKP';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['cbpengda'] = $this->ci_pengdaModel->getPengda();
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyNo($_POST['tbnomorkta']);
        if ($_POST['tbnomorkta'] != '' && !empty($data['detailanggota'])) {
            if (!isset($_FILES['fcv']) || $_FILES['fcv']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fcv']['name'], PATHINFO_EXTENSION) != 'pdf') {
                $data['displayw'] = '';
                $data['displayc'] = 'alert-danger';
                $data['warning'] = 'Harap Sertakan Biodata';
            } else {
                if (!isset($_FILES['fspkes']) || $_FILES['fspkes']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fspkes']['name'], PATHINFO_EXTENSION) != 'pdf') {
                    $data['displayw'] = '';
                    $data['displayc'] = 'alert-danger';
                    $data['warning'] = 'Harap Sertakan Surat Pernyataan Kesediaan';
                } else {
                    if (!isset($_FILES['fsppidana']) || $_FILES['fsppidana']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fsppidana']['name'], PATHINFO_EXTENSION) != 'pdf') {
                        $data['displayw'] = '';
                        $data['displayc'] = 'alert-danger';
                        $data['warning'] = 'Harap Sertakan Surat Pernyataan Kesediaan';
                    } else {
                        if (!isset($_FILES['fskketuapengda']) || $_FILES['fskketuapengda']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fskketuapengda']['name'], PATHINFO_EXTENSION) != 'pdf') {
                            $data['displayw'] = '';
                            $data['displayc'] = 'alert-danger';
                            $data['warning'] = 'Harap Sertakan Surat Keterangan Mantan Anggota';
                        } else {
                            if (!isset($_FILES['frangkap']) || $_FILES['frangkap']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['frangkap']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                $data['displayw'] = '';
                                $data['displayc'] = 'alert-danger';
                                $data['warning'] = 'Harap Sertakan Surat Pernyataan Tidak Rangkap Jabatan';
                            } else {
                                if (!isset($_FILES['fpi']) || $_FILES['fpi']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fpi']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Harap Sertakan Pakta Integritas';
                                } else {
                                    if (!isset($_FILES['fnarkoba']) || $_FILES['fnarkoba']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fnarkoba']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                        $data['displayw'] = '';
                                        $data['displayc'] = 'alert-danger';
                                        $data['warning'] = 'Harap Sertakan SK bebas narkoba dari RS';
                                    } else {
                                        $id = $data['detailanggota']['id_user'];
                                        $cek = true;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            if ($_POST['tbnama'] == '') {
                $return['displayw'] = '';
                $return['displayc'] = 'alert-danger';
                $return['warning'] = 'Nama tidak boleh kosong';
            } else {
                if ($_POST['tbtempatlahir'] == '') {
                    $return['displayw'] = '';
                    $return['displayc'] = 'alert-danger';
                    $return['warning'] = 'Tempat lahir tidak boleh kosong';
                } else {
                    if ($_POST['tbtgllahir'] == '') {
                        $return['displayw'] = '';
                        $return['displayc'] = 'alert-danger';
                        $return['warning'] = 'Tanggal lahir tidak boleh kosong';
                    } else {
                        if ($_POST['tbnoktp'] == '') {
                            $return['displayw'] = '';
                            $return['displayc'] = 'alert-danger';
                            $return['warning'] = 'Nomor KTP tidak boleh kosong';
                        } else {
                            if ($this->ci_userModel->cekKTP($_POST['tbnoktp']) != null) {
                                $return['displayw'] = '';
                                $return['displayc'] = 'alert-danger';
                                $return['warning'] = 'No KTP sudah terdaftar';
                            } else {
                                if ((!isset($_FILES['fktp']) || $_FILES['fktp']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fktp']['name'], PATHINFO_EXTENSION) != 'pdf') && $data['detailanggota']['foto_ktp'] == '') {
                                    $data['displayw'] = '';
                                    $data['displayc'] = 'alert-danger';
                                    $data['warning'] = 'Harap Sertakan Foto KTP';
                                } else {
                                    if (!isset($_FILES['fphoto']) || $_FILES['fphoto']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fphoto']['name'], PATHINFO_EXTENSION) != 'jpg') {
                                        $return['displayw'] = '';
                                        $return['displayc'] = 'alert-danger';
                                        $return['warning'] = 'Harap sertakan Photo 3x4 (.jpg)';
                                    } else {
                                        if ($_POST['cbpengda'] == '0') {
                                            $return['displayw'] = '';
                                            $return['displayc'] = 'alert-danger';
                                            $return['warning'] = 'Pengda harus di pilih';
                                        } else {
                                            if ($this->ci_userModel->cekEmail($_POST['tbemail']) != null) {
                                                $return['displayw'] = '';
                                                $return['displayc'] = 'alert-danger';
                                                $return['warning'] = 'Email sudah digunakan';
                                            } else {
                                                if ($_POST['tbemail'] == '') {
                                                    $return['displayw'] = '';
                                                    $return['displayc'] = 'alert-danger';
                                                    $return['warning'] = 'Email tidak boleh kosong';
                                                } else {
                                                    if ($_POST['tbpass'] == '') {
                                                        $return['displayw'] = '';
                                                        $return['displayc'] = 'alert-danger';
                                                        $return['warning'] = 'Password tidak boleh kosong';
                                                    } else {
                                                        if ($_POST['tbtlp'] == '') {
                                                            $return['displayw'] = '';
                                                            $return['displayc'] = 'alert-danger';
                                                            $return['warning'] = 'Nomor tlp tidak boleh kosong';
                                                        } else {
                                                            if ($_POST['tbalamatkantor'] == '') {
                                                                $return['displayw'] = '';
                                                                $return['displayc'] = 'alert-danger';
                                                                $return['warning'] = 'Alamat kantor tidak boleh kosong';
                                                            } else {
                                                                if (!isset($_FILES['fcv']) || $_FILES['fcv']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fcv']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                    $data['displayw'] = '';
                                                                    $data['displayc'] = 'alert-danger';
                                                                    $data['warning'] = 'Harap Sertakan Biodata';
                                                                } else {
                                                                    if (!isset($_FILES['fspkes']) || $_FILES['fspkes']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fspkes']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                        $data['displayw'] = '';
                                                                        $data['displayc'] = 'alert-danger';
                                                                        $data['warning'] = 'Harap Sertakan Surat Pernyataan Kesediaan';
                                                                    } else {
                                                                        if (!isset($_FILES['fsppidana']) || $_FILES['fsppidana']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fsppidana']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                            $data['displayw'] = '';
                                                                            $data['displayc'] = 'alert-danger';
                                                                            $data['warning'] = 'Harap Sertakan Surat Pernyataan Kesediaan';
                                                                        } else {
                                                                            if (!isset($_FILES['fskketuapengda']) || $_FILES['fskketuapengda']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fskketuapengda']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                                $data['displayw'] = '';
                                                                                $data['displayc'] = 'alert-danger';
                                                                                $data['warning'] = 'Harap Sertakan Surat Keterangan Mantan Anggota';
                                                                            } else {
                                                                                if (!isset($_FILES['frangkap']) || $_FILES['frangkap']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['frangkap']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                                    $data['displayw'] = '';
                                                                                    $data['displayc'] = 'alert-danger';
                                                                                    $data['warning'] = 'Harap Sertakan Surat Pernyataan Tidak Rangkap Jabatan';
                                                                                } else {
                                                                                    if (!isset($_FILES['fpi']) || $_FILES['fpi']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fpi']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                                        $data['displayw'] = '';
                                                                                        $data['displayc'] = 'alert-danger';
                                                                                        $data['warning'] = 'Harap Sertakan Pakta Integritas';
                                                                                    } else {
                                                                                        if (!isset($_FILES['fnarkoba']) || $_FILES['fnarkoba']['error'] == UPLOAD_ERR_NO_FILE || pathinfo($_FILES['fnarkoba']['name'], PATHINFO_EXTENSION) != 'pdf') {
                                                                                            $data['displayw'] = '';
                                                                                            $data['displayc'] = 'alert-danger';
                                                                                            $data['warning'] = 'Harap Sertakan SK bebas narkoba dari RS';
                                                                                        } else {
                                                                                            $id = $this->ci_userModel->addWredaFull($_POST, $_FILES);
                                                                                            $cek = true;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if ($cek) {
            $this->ci_pesertaModel->addPeserta($id, '23', 0);
            $this->ci_dokumenuserModel->adddokumen($id, 1, $_FILES['fcv']);
            $this->ci_dokumenuserModel->adddokumen($id, 8, $_FILES['fspkes']);
            $this->ci_dokumenuserModel->adddokumen($id, 3, $_FILES['fsppidana']);
            $this->ci_dokumenuserModel->adddokumen($id, 9, $_FILES['fskketuapengda']);
            $this->ci_dokumenuserModel->adddokumen($id, 10, $_FILES['frangkap']);
            $this->ci_dokumenuserModel->adddokumen($id, 5, $_FILES['fpi']);
            $this->ci_dokumenuserModel->adddokumen($id, 6, $_FILES['fnarkoba']);
            $data['displayw'] = '';
            $data['displayc'] = 'alert-success';
            $data['warning'] = 'Terima Kasih Telah Mendaftar';
        }
        echo view('calonketummkp/mkp', $data);
        echo view('layout/footer');
    }
}

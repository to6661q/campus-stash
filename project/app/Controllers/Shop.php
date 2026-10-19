<?php

namespace App\Controllers;

use App\Models\ci_userModel;
use App\Models\ci_pengwilModel;
use App\Models\ci_pengdaModel;
use App\Models\ci_pesertaModel;
use App\Models\ci_pelatihanModel;
use App\Models\ci_pembayaranModel;
use App\Models\ci_invoiceModel;


class Shop extends BaseController
{
    protected $ci_userModel;
    protected $ci_pengwilModel;
    protected $ci_pengdaModel;
    protected $ci_pesertaModel;
    protected $ci_pelatihanModel;
    protected $ci_pembayaranModel;
    protected $ci_invoiceModel;

    var $folder_public;

    public function __construct()
    {
        $this->folder_public = 'public_html';
        $this->ci_userModel = new ci_userModel();
        $this->ci_pengwilModel = new ci_pengwilModel();
        $this->ci_pengdaModel = new ci_pengdaModel();
        $this->ci_pesertaModel = new ci_pesertaModel();
        $this->ci_pelatihanModel = new ci_pelatihanModel();
        $this->ci_pembayaranModel = new ci_pembayaranModel();
        $this->ci_invoiceModel = new ci_invoiceModel();
    }
    public function index()
    {
        $data['title'] = 'Dashboard User';
        $data['product'] = $this->ci_pembayaranModel->get('product')->result();
        return view('layout/header', $data);
        return view('shop', $data);
        return view('layout/user/footer');
    }
    public function cart($id)
    {
        $product = $this->ci_pembayaranModel->find($id);

        $data = array(
            'id'      => $product->id_brg,
            'qty'     => 1,
            'price'   => $product->harga,
            'name'    => $product->nama_brg,
            'options' => array(
                'keterangan' => $product->keterangan,
                'kategori' => $product->kategori,
                'gambar' => $product->gambar
            )
        );

        $this->cart->insert($data);
        $_SESSION["sukses"] = 'Pesanan telah disimpan di keranjang';
        redirect('shop');
    }

    public function anggota($id)
    {
        $cek = false;
        $data['judul'] = 'Anggota';
        $data['warning'] = '';
        $data['displayw'] = 'hidden';
        $data['displayc'] = 'alert-success';
        $data['detailanggota'] = $this->ci_userModel->getAnggotabyId($id);
        $data['idrakernas'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023')['id_pelatihan'];
        $data['idrakernasorg'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023 Org')['id_pelatihan'];
        $data['idrakernasstr'] = $this->ci_pelatihanModel->getidPelatihanByNama('Rakernas Bajo 2023 Str')['id_pelatihan'];
        if ($this->ci_pesertaModel->cekpeserta($data['detailanggota']['id_user'], $data['idrakernas']) == null) {
            if ($this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernas'], '2') > 0) {
                $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernasorg'], '2');
                $this->ci_pesertaModel->addPeserta($data['detailanggota']['id_user'], $data['idrakernasstr'], '2');
                $cek = true;
                $data['bill'] = 1850000 + $data['detailanggota']['no_anggota'];
            }
        }

        if ($cek) {
            header('Location: /rakernasbajo2023/bill/' . $data['bill'] . '/' . $data['detailanggota']['id_user'] . '/Rakernas dan Upgrading');
            exit;
        } else {
            header('Location: /anggota/datauser/' . $data['detailanggota']['id_user']);
            exit;
        }
    }
    public function bill($bill, $iduser, $kegiatan)
    {
        $data['judul'] = 'Bill';
        $data['detail'] = $this->ci_userModel->getUserDetailById($iduser);
        $data['bill'] = number_format($bill, 0, ",", ".");
        if ($data['detail']['jenis'] == 'alb') {
            $data['nomor'] = "No ALB : " . date("Y.m.", strtotime($data['detail']['created_at'])) . $data['detail']['no_anggota'];
        } else if ($data['detail']['jenis'] == 'anggota') {
            $data['nomor'] = "No KTA : " . $data['detail']['id_pengwil'] . "." . $data['detail']['id_pengda'] . "." . $data['detail']['no_anggota'];
        }
        $data['kegiatan'] = $kegiatan;
        $data['tglakhir'] = date("d-m-Y", time() + 86400);
        if ($data['detail']['foto'] == '') {
            $data['picture'] = 'nopicture.png';
        } else {
            $data['picture'] = 'foto/' . $data['detail']['foto'];
        }
        $from = "admin@ppippat.org";
        $to = $data['detail']['email'];
        $subject = "Bill " . $kegiatan;
        $message =
            "http://ppippat.org/rakernasbajo2023/bill/" . $bill . "/" . $iduser . "/" . $kegiatan;
        $headers = "From:" . $from;
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        try {
            mail($to, $subject, $message, $headers);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        } finally {
            echo view('rakernasbajo2023/bill', $data);
            echo view('layout/footer');
        }
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class KonfirmasiPembayaran extends Controller
{
    public function index()
    {
        // Tampilkan halaman konfirmasi pembayaran
        $data['judul'] = 'Konfirmasi Pembayaran';
        // Tambahkan data atau logika yang diperlukan
        return view('alb/konfirmasi_bayar', $data);
    }
}

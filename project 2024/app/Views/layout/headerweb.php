<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ikatan Pejabat Pembuat Akta Tanah</title>
    <link href="/css/all.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugin/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <!-- Carusel -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="/plugin/jquery/jquery.min.js" crossorigin="anonymous"></script>
    <script src="/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="sh_mobile"><br><br>
            <headen>
                <div class="container">
                    <div id="logs-wrapper">
                        <div class="cell-view">
                            <a id="logo" href="index.php">
                                <img src="/img/LogoIPPATText.png" />
                            </a>
                        </div>
                    </div>
                    <div class="open-icon"><span></span><span></span><span></span></div>
                    <div class="headen-container">
                        <div class="scrollable-container">
                            <div class="headen-left">
                                <nav>
                                    <div class="menu-entry"><a href='index.php'>Beranda</a></div>
                                    <div class="menu-entry"><a href='index.php'>Berita</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Berita PP IPPAT</a></li>
                                                <li><a href=''>Berita Pengwil</a></li>
                                                <li><a href=''>Berita Pengda</a></li>
                                                <li><a href=''>Breaking News</a></li>
                                                <li><a href=''>Seputar PPAT</a></li>
                                                <li><a href=''>Galeri Foto</a></li>
                                                <li><a href=''>Galeri Video</a></li>
                                                <li><a href=''>Artikel</a></li>
                                                <li><a href=''>Berita Sahabat IPPAT</a></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-entry"><a href='index.php'>Profil</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Struktur Organisasi</a></li>
                                                <li><a href=''>Visi Misi</a></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-entry"><a href='index.php'>Layanan</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Konsultasi Hukum</a></li>
                                                <li><a href=''>Konsultasi Pelaksanaan Jabatan PPAT</a></li>
                                                <li><a href=''>Konsultasi Seputar Organisasi</a></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-entry"><a href='index.php'>Informasi Publik</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Alamat Kantor IPPAT</a></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-entry"><a href='index.php'>Regulasi</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Peraturan Perundang Undangan Pertanahan</a></li>
                                                <li><a href=''>Peraturan Perbankan</a></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-entry"><a href='index.php'>Agenda</a><span class="submenu-icon"><span class="glyphicon glyphicon-chevron-down"></span></span>
                                        <div class="submenu">
                                            <div>
                                                <li><a href=''>Pengumuman</a></li>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </headen>
        </div>
        <div id="sh_desktop">
            <div class="primary-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="mails"><span style="margin-top:-4px;"><a href="/home/faq" target="_blank">FAQ</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="home/tautan" target="_blank">Tautan</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="home/peta" target="_blank">Peta Situs</a></span></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="social6-wrap clearfix">
                                <div class="request">
                                    <div class="col-xs-4 col-sm-4"><a href="/login/index" style="margin-left:12px;">Login</a></div>
                                </div>
                                <ul class="social6"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3" style="margin-top:20px; z-index:0;">
                            <a href="index.php" class="logo">
                                <img src="/img/LogoIPPATText.png" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 custom-nav" style="margin-top:-10px; z-index:0;">
                            <nav>
                                <div id='cssmenu'>
                                    <ul class="navigation blocked">
                                        <li class="<?= $branda; ?>"><a href='/web/index'>Beranda</a></li>
                                        <li class="<?= $berita; ?>"><a href='/web/index'>Berita</a>
                                            <ul class="sub-menu">
                                                <li><a href='/web/beritappipat'>Berita PP IPPAT</a></li>
                                                <li><a href='/web/beritapengwil'>Berita Pengwil</a></li>
                                                <li><a href='/web/beritapengda'>Berita Pengda</a></li>
                                                <li><a href='/web/breakingnews'>Breaking News</a></li>
                                                <li><a href='/web/seputarippat'>Seputar PPAT</a></li>
                                                <li><a href='/web/article'>Artikel</a></li>
                                                <li><a href='/web/sahabatippat'>Berita Sahabat IPPAT</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $profil; ?>"><a href='/web/index'>Profil</a>
                                            <ul class="sub-menu">
                                                <li class=""><a href='/web/struktur'>Struktur Organisasi</a></li>
                                                <li class=""><a href='/web/visimisi'>Visi Misi</a></li>
                                                <li class=""><a href='/web/redaksi'>Redaksi</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $layanan; ?>"><a href='/web/index'>Layanan</a>
                                            <ul class="sub-menu">
                                                <li class=""><a href='/web/konshukum'>Konsultasi Hukum</a></li>
                                                <li class=""><a href='/web/konspjp'>Konsultasi Pelaksanaan Jabatan PPAT</a></li>
                                                <li class=""><a href='/web/konsorg'>Konsultasi Seputar Organisasi</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $publik; ?>"><a href='/web/index'>Informasi Publik</a>
                                            <ul class="sub-menu">
                                                <li class=""><a href='/web/kantor'>Alamat Kantor IPPAT</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $regulasi; ?>"><a href='/web/index'>Regulasi</a>
                                            <ul class="sub-menu">
                                                <li class=""><a href='/web/ppup'>Peraturan Perundang Undangan Pertanahan</a></li>
                                                <li class=""><a href='/web/ppbank'>Peraturan Perbankan</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?= $agenda; ?>"><a href='/web/index'>Agenda</a>
                                            <ul class="sub-menu">
                                                <li class=""><a href='/web/pengumuman'>Pengumuman</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="nav-icon"><span></span><span></span><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
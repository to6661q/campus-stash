<!DOCTYPE html>
<html>

<head>
    <title>Website Penilaian Dosen</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" type="text/javascript"></script>
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="container">
        <div class="header">
            <!-- <div class="animated flash"> -->
            <h1>WEBSITE PENILAIAN DOSEN</h1>
            <p>Website yang ditujukan untuk memberi penilaian terhadap dosen</p>
            <!-- </div> -->
            <?php
            if ($_SESSION['level'] == 'admin') {
                ?>
                <ul id="navmenu">
                    <li class="menu-item"><a href="../konten/main.php">Homepage</a></li>
                    <li class="menu-item has-child">
                        <span>Akun</span>
                        <ul class="menu sub-menu">
                            <li class="menu-item sub-menu-item"><a href="?page=daftar">Daftarkan Akun</a></li>
                            <li class="menu-item sub-menu-item"><a href="?page=masterData">Lihat Daftar Akun</a></li>
                        </ul>
                    </li>
                    <li class="menu-item has-child">
                        <span>Pertanyaan</span>
                        <ul class="menu sub-menu">
                            <li class="menu-item sub-menu-item"><a href="?page=pertanyaan">Buat Pertanyaan</a></li>
                            <li class="menu-item sub-menu-item"><a href="?page=masterQuest">Lihat Daftar Pertanyaan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item has-child">
                        <span>Hasil</span>
                        <ul class="menu sub-menu">
                            <li class="menu-item sub-menu-item"><a href="?page=hasil">Hasil dan Grafik Penilaian</a></li>
                            <li class="menu-item sub-menu-item"><a href="cetak.php">Cetak Hasil Penilaian</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="../konten/logout.php">Logout</a></li>
                </ul>
            <?php
            } else if ($_SESSION['level'] == 'dosen') {
                ?>
                <ul id="navmenu">
                    <li class="menu-item"><a href="../konten/main.php">Homepage</a></li>
                    <li class="menu-item"><a href="?page=bio">Detail Akun</a></li>
                    <li class="menu-item has-child">
                        <span>Hasil</span>
                        <ul class="menu sub-menu">
                            <li class="menu-item sub-menu-item"><a href="?page=hasil">Hasil dan Grafik Penilaian</a></li>
                            <li class="menu-item sub-menu-item"><a href="cetak.php">Cetak Hasil Penilaian</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="../konten/logout.php">Logout</a></li>
                </ul>
            <?php
            } else {
                ?>
                <ul id="navmenu">
                    <li class="menu-item"><a href="../konten/main.php">Homepage</a></li>
                    <li class="menu-item"><a href="?page=bio">Detail Akun</a></li>
                    <li class="menu-item has-child">
                        <span>Pertanyaan</span>
                        <ul class="menu sub-menu">
                            <li class="menu-item sub-menu-item"><a href="?page=penilaian">Jawab Pertanyaan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="../konten/logout.php">Logout</a></li>
                </ul>
            <?php
            };
            ?>
        </div>
        <div class="page">
            <div class="item_warp">
                <?php
                if (isset($_GET['page'])) {
                    include "../konten/$_GET[page].php";
                } else {
                    ?>
                    <h2>Halo, <?php echo $_SESSION['namadep']; ?> <?php echo $_SESSION['namabel']; ?></h2>
                    <p>Selamat Datang di Website Penilaian Dosen</p>
					
                <?php
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2019. Alfani & Toriq</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title>LAPORAN HASIL PENILAIAN DOSEN OLEH MAHASISWA</title>
</head>
<body>
    <?php
        include "../koneksi/koneksi.php";
        $select = "SELECT * FROM bank_soal";
        $hasil = mysqli_query($conn, $select);
        while($buff=mysqli_fetch_array($hasil)) {
            ?>
            <table width="100%" border="3">
                <tr style="text-align: center;">
                    <td width="1%">No</td>
                    <td width="21%">Nama Dosen</td>
                    <td width="21%">Mata Kuliah</td>
                    <td width="57%">Pertanyaan</td>
                </tr>
                <?php
                $count = 0;
                $select = "SELECT * FROM bank_soal WHERE ";
                while($buff=mysqli_fetch_array($hasil)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $buff['nama_dosen']; ?></td>
                        <td><?php echo $buff['mk']; ?></td>
                        <td><?php echo $buff['pertanyaan']; ?></td>
                    </tr>
                    <?php
                    }; ?>
            </table>
            <script>
                window.print();
            </script>
            <?php
        };
    ?>
</body>
</html>
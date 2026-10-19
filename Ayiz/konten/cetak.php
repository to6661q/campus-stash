<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final Report</title>



    <style>
        @media print {
            .cetak {
                display: none;
            }
        }
    </style>

</head>


<body>
    <?php
    include "../koneksi/koneksi.php";
    $select = "SELECT * FROM rekap INNER JOIN dosen ON rekap.id_dosen=dosen.id_dosen INNER JOIN matkul ON dosen.id_mk=matkul.id_mk INNER JOIN akun ON dosen.id=akun.id";
    $hasil = mysqli_query($conn, $select);
    ?>
    <div>

        <h1>LAPORAN DOSEN</h1>

        <table width="100%" border="3">
            <tr align="center">
                <td>No</td>
                <td>Dosen</td>
                <td>Mata Kuliah</td>
                <td>Rata-rata</td>
                <td>Keseluruhan Nilai</td>
            </tr>

            <?php
            $count = "0";
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
                ?>

                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $buff['namadep']; ?> <?php echo $buff['namabel']; ?></td>
                    <td><?php echo $buff['mk']; ?></td>
                    <td><?php echo $buff['rata_rata']; ?></td>
                    <td><?php
                            if ($buff['rata_rata'] < "2") {
                                echo "Cukup";
                            } else if ($buff['rata_rata'] > "2" && $buff['rata_rata'] < "3.5") {
                                echo "Baik";
                            } else if ($buff['rata_rata'] > "3.5") {
                                echo "Sangat Baik";
                            }
                            ?></td>
                <?php } ?>
                </tr>
        </table>
    </div>


    <script>
        window.print();
    </script>

</body>

</html>
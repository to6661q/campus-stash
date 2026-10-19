<form action="cetakbyDsn.php" method="post" target="_blank">
    <?php
    include "../koneksi/koneksi.php";
    $id_dosen = $_GET['id_dosen'];
    $select = "SELECT * FROM hasil INNER JOIN bank_soal ON hasil.id_soal=bank_soal.id_soal WHERE id_dosen='$id_dosen'";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);
    if ($rowcount > 0) { ?>
        <div class="view">
            <table class="paleBlueRows" width="100%" border="3">
                <thead>
                    <tr align="center">
                        <td>No</td>
                        <td>Pertanyaan</td>
                        <td>Total Nilai</td>
                        <td>Rata-rata</td>
                    </tr>
                </thead>
                <?php
                    $count = "0";
                    while ($buff = mysqli_fetch_array($hasil)) {
                        $count++;
                        ?>
                    <input type="hidden" name='id_dosen' value="<?php echo $buff['id_dosen']; ?>" />
                    <tr align="center">
                        <td><?php echo $count; ?></td>
                        <td align="left"><?php echo $buff['pertanyaan']; ?></td>
                        <td><?php echo $buff['nilai']; ?></td>
                        <td><?php echo $buff['rata_rata']; ?></td>
                    <?php } ?>
                    </tr>
            </table>
        </div>


        <?php
            $select1 = "SELECT * FROM hasil INNER JOIN bank_soal ON hasil.id_soal = bank_soal.id_soal WHERE id_dosen='" . $_GET['id_dosen'] . "'";
            $hasil1 = mysqli_query($conn, $select1);
            ?>



        <div style="padding-top: 45px;">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawStuff);

                function drawStuff() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Pertanyaan', 'Nilai'],
                        <?php
                            $count = "0";
                            while ($buff = mysqli_fetch_array($hasil1)) {
                                $count++;
                                echo "['" . $count . "'," . $buff['rata_rata'] . "],";
                            }
                            ?>
                    ]);

                    var options = {
                        title: 'Final Result',
                        width: 900,
                        legend: {
                            position: 'none'
                        },
                        chart: {
                            title: 'Final Result',
                            subtitle: 'Berdasarkan Tanggapan Dari Mahasiswa'
                        },
                        bars: 'horizontal', // Required for Material Bar Charts.
                        axes: {
                            x: {
                                0: {
                                    side: 'top',
                                    label: 'Question '
                                } // Top x-axis.
                            },
                            y: {
                                0: {
                                    side: 'left',
                                    label: 'Mean '
                                } // Top x-axis.
                            }
                        },
                        bar: {
                            groupWidth: "90%"
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                    chart.draw(data, options);
                };
            </script>
            <div id="top_x_div" style="width: 900px; height: 500px;"></div>
        </div>
        <input class="buttonP" type="submit" value="Print" target="_blank">
</form>
<?php } else { ?>
    <h2>KUESIONER BELUM DIISI SAMA SEKALI OLEH MAHASISWA</h2>
<?php } ?>
<!DOCTYPE html>

<head>
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
    <!-- //Button Print -->
    <a class="cetak" href="cetak.php" target="_blank"><span class="icon"><i class="fas fa-print"></i>PRINT</a>

    <table class="paleBlueRows" width="100%" border="3">
      <thead>
        <tr align="center">
          <td>No</td>
          <td>Dosen</td>
          <td>Mata Kuliah</td>
          <td>Rata-rata</td>
          <td>Keseluruhan Nilai</td>
        </tr>
      </thead>
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


  <?php
  $select1 = "SELECT * FROM rekap INNER JOIN dosen ON rekap.id_dosen=dosen.id_dosen INNER JOIN matkul ON dosen.id_mk=matkul.id_mk INNER JOIN akun ON dosen.id=akun.id";
  $hasil1 = mysqli_query($conn, $select1);
  ?>



  <div align="center" style="padding-top: 45px;">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['bar']
      });
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Dosen', 'Nilai'],
          <?php
          $count = "0";
          while ($buff = mysqli_fetch_array($hasil1)) {
            $count++;
            echo "['" . $buff['namadep'] . "'," . $buff['rata_rata'] . "],";
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


</body>

</html>
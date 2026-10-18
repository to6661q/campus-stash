<!-- <script>
                var ctx = document.getElementById("myChart") getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',        //Tipe tampilan grafik, sobat bisa menggunakan tampilan bar, pie, line, radar dan sebagainya
                    data: {
                        labels: [<?php while($buff = mysqli_fetch_array($id_soal)) { echo ' " '.$buff['id_soal'].' ", '; }?>], //keterangan nama-nama label
                        datasets: [{
                            label: 'TANGGAPAN', //Judul Grafik
                            data: [<?php while($buff = mysqli_fetch_array($nilai)) { echo ' " '.$buff['nilai'].' ", '; }?>], //Data Grafik
                            backgroundColor: [
                                'red', //Warna Background Data Grafik
                                'green', //Warna Background Data Grafik
                                'blue', //Warna Background Data Grafik
                                'silver', //Warna Background Data Grafik
                                'yellow', //Warna Background Data Grafik
                                'brown' //Warna Background Data Grafik
                                'cyan' //Warna Background Data Grafik
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)', //Warna Garis Data Grafik
                                'rgba(54, 162, 235, 1)', //Warna Garis Data Grafik
                                'rgba(255, 206, 86, 1)', //Warna Garis Data Grafik
                                'rgba(75, 192, 192, 1)', //Warna Garis Data Grafik
                                'rgba(153, 102, 255, 1)', //Warna Garis Data Grafik
                                'rgba(255, 159, 64, 1)' //Warna Garis Data Grafik
                                'rgba(255, 159, 64, 1)' //Warna Garis Data Grafik
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
             </script> -->
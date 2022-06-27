<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3" style="width:600px">
        <h4 style="text-align: center;"><?= $title; ?></h4>
        <br />

        <canvas id="myChart"></canvas>
        <?php
        $tahun = "";            // string kosong untuk menampung data tahun
        $total_siswa = null;    // nilai awal null untuk menampung data total siswa

        // looping data dari $chartSiswa
        foreach ($chartSiswa as $chart) {
            $dataTahun     = "Tahun " . $chart->TAHUN;
            $tahun         .= "'$dataTahun'" . ",";
            $dataTotal     = $chart->total_siswa_lulus;
            $total_siswa .= "'$dataTotal'" . ",";
        }

        ?>
    </div>
</body>
<!-- CDN CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    const chartSiswa = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(chartSiswa, {
        type: 'bar',
        data: {
            labels: [<?= $tahun; ?>], // data tahun sebagai label dari chart
            datasets: [{
                label: 'Jumlah Peserta',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?= $total_siswa; ?>] //data siswa sebagai data dari chart
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</html>
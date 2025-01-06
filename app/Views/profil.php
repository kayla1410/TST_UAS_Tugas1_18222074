<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Data Pribadi Mahasiswa</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Nama: <?= esc($student['nama']) ?></h5>
                <p class="card-text">NIM: <?= esc($student['id']) ?></p>
                <p class="card-text">Semester: <?= esc($student['semester']) ?></p>
                <p class="card-text">IPK: <?= esc(round($ipk, 2)) ?></p>
            </div>
        </div>

        <div class="mt-5">
            <h3>Mata Kuliah yang Dipilih</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Durasi</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($mataKuliah)) : ?>
                        <?php foreach ($mataKuliah as $index => $mk) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($mk['course_name']) ?></td>
                                <td><?= esc($mk['day']) ?></td>
                                <td><?= esc($mk['start_time']) ?></td>
                                <td><?= esc($mk['duration']) ?> menit</td>
                                <td><?= esc($mk['credits']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada mata kuliah yang dipilih</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <h3>Grafik Perkembangan IP</h3>
            <canvas id="grafikIP" width="300" height="150"></canvas>
        </div>
    </div>

    <script>
        const data = {
            labels: <?= json_encode(array_keys($ip_per_semester)) ?>, // Semester sebagai label
            datasets: [{
                label: 'Grafik Perkembangan IP',
                data: <?= json_encode(array_column($ip_per_semester, 'ip')) ?>, // Data IP per semester
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Perkembangan IP Mahasiswa'
                    }
                },
                layout: {
                    padding: {
                        bottom: 50 // Tambahkan padding di bawah grafik
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Semester'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Indeks Prestasi'
                        },
                        suggestedMin: 0,
                        suggestedMax: 4
                    }
                }
            }
        };

        const ctx = document.getElementById('grafikIP').getContext('2d');
        new Chart(ctx, config);
    </script>
</body>
</html>

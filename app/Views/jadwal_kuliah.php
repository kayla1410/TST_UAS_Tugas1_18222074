<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Perkuliahan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Jadwal Perkuliahan Mahasiswa</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data hari
                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

                // Buat array jadwal berdasarkan hari
                $jadwalByDay = array_fill_keys($days, []);

                foreach ($jadwal as $item) {
                    $jadwalByDay[$item['day']][] = $item;
                }

                // Loop hari untuk mengisi jadwal
                for ($i = 0; $i < 5; $i++) {
                    echo "<tr>";

                    foreach ($days as $day) {
                        echo "<td>";
                        if (!empty($jadwalByDay[$day])) {
                            foreach ($jadwalByDay[$day] as $item) {
                                echo "<p><strong>" . esc($item['course_name']) . "</strong></p>";
                                echo "<p>" . esc($item['start_time']) . " - " . esc(date('H:i', strtotime($item['start_time'] . ' + ' . $item['duration'] . ' minutes'))) . "</p>";
                                echo "<hr>";
                            }
                        }
                        echo "</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

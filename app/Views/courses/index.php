<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Mata Kuliah</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Durasi (Menit)</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= $course['course_name']; ?></td>
                        <td><?= $course['credits']; ?></td>
                        <td><?= $course['day']; ?></td>
                        <td><?= $course['start_time']; ?></td>
                        <td><?= $course['duration']; ?></td>
                        <td>
                            <form method="POST" action="/admin/courses/<?= $course['id']; ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Tambah Mata Kuliah</h3>
        <form method="POST" action="/admin/courses">
            <div class="form-group">
                <label for="course_name">Nama Mata Kuliah</label>
                <input type="text" name="course_name" id="course_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="credits">SKS</label>
                <input type="number" name="credits" id="credits" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="day">Hari</label>
                <select name="day" id="day" class="form-control" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Jam Mulai</label>
                <input type="time" name="start_time" id="start_time" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
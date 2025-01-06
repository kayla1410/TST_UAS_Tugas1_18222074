<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Pendaftaran Mata Kuliah</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= esc($course['id']) ?></td>
                        <td><?= esc($course['course_name']) ?></td>
                        <td><?= esc($course['day']) ?></td>
                        <td><?= esc($course['start_time']) ?></td>
                        <td><?= esc($course['credits']) ?></td>
                        <td><?= esc($course['semester']) ?></td>
                        <td>
                            <form method="POST" action="/mahasiswa/mata-kuliah/pilih" style="display:inline;">
                                <input type="hidden" name="course_id" value="<?= esc($course['id']) ?>">
                                <input type="hidden" name="semester" value="<?= esc($course['semester']) ?>">
                                <button type="submit" class="btn btn-success btn-sm">Pilih</button>
                            </form>
                            <form method="POST" action="/mahasiswa/mata-kuliah/batal" style="display:inline;">
                                <input type="hidden" name="course_id" value="<?= esc($course['id']) ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

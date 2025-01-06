<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai IP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Input Nilai IP</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/teacher/simpan-nilai">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= esc($student['nama']) ?></td>
                            <td><?= esc($student['id']) ?></td>
                            <td>
                                <input type="number" name="students[<?= $student['id'] ?>][semester]" class="form-control" min="1" max="8" placeholder="Semester">
                            </td>
                            <td>
                                <input type="number" name="students[<?= $student['id'] ?>][ip]" class="form-control" step="0.01" min="0" max="4" placeholder="IP">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        </form>
    </div>
</body>
</html>

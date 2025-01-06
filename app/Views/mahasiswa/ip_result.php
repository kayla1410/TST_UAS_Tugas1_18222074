<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil IP Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Hasil IP Generator</h2>
        <p>IP Perkiraan Semester Ini: <strong><?= number_format($ip, 2) ?></strong></p>
        <a href="/mahasiswa/ip-generator" class="btn btn-primary">Kembali</a>
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Sign Up</h2>
        <form method="POST" action="/signup">
        <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" id="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <br>
            <label for="role">Role:</label>
                <select name="role" id="role" required>
                <option value="student">Mahasiswa</option>
                <option value="admin">Admin</option>
                <option value="teacher">Dosen</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <p class="mt-3">Already have an account? <a href="/login">Log In</a></p>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Dashboard Petugas</h2>
    <p>Selamat datang, {{ auth()->user()->name }}</p>

    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

</body>
</html>

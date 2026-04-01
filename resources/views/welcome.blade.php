<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#7b4b2a,#a86b45);
color:white;
}

.container{
text-align:center;
max-width:600px;
}

.container h1{
font-size:36px;
margin-bottom:15px;
}

.container p{
font-size:16px;
margin-bottom:30px;
opacity:0.9;
}

.btn-login{
padding:12px 30px;
background:white;
color:#7b4b2a;
border:none;
border-radius:30px;
font-weight:600;
cursor:pointer;
text-decoration:none;
transition:0.3s;
}

.btn-login:hover{
background:#f5f5f5;
transform:translateY(-2px);
}

.logo{
font-size:50px;
margin-bottom:20px;
}

</style>

</head>

<body>

<div class="container">

<div class="logo">
📚
</div>

<h1>Selamat Datang di Aplikasi<br>Perpustakaan Digital</h1>

<p>
Aplikasi perpustakaan digital untuk memudahkan peminjaman buku,
melihat koleksi buku, dan mengelola perpustakaan secara online.
</p>

<a href="/login" class="btn-login">
Masuk ke Aplikasi
</a>

</div>

</body>
</html>

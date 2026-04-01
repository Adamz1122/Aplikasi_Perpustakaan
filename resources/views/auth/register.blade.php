<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

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
background:#f5f5f5;
}

.register-box{
width:380px;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.register-box h2{
text-align:center;
margin-bottom:20px;
}

.form-group{
margin-bottom:15px;
}

.form-group label{
display:block;
margin-bottom:5px;
font-size:14px;
}

.form-group input,
.form-group select{
width:100%;
padding:10px;
border-radius:8px;
border:1px solid #ddd;
outline:none;
}

.btn-register{
width:100%;
padding:10px;
background:#7b4b2a;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
margin-top:10px;
}

.btn-register:hover{
background:#a86b45;
}

.text-center{
text-align:center;
margin-top:15px;
}

.text-center a{
color:#7b4b2a;
text-decoration:none;
font-weight:500;
}

</style>

</head>

<body>

<div class="register-box">

<h2>Register</h2>

<form action="/register" method="POST">
@csrf

<div class="form-group">
<label>Nama</label>
<input type="text" name="name" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<div class="form-group">
<label>Role</label>
<select name="role">
<option value="anggota">Anggota</option>
<option value="petugas">Petugas</option>
<option value="kepala">Kepala Perpustakaan</option>
</select>
</div>

<button class="btn-register">Register</button>

</form>

<div class="text-center">
Sudah punya akun? <a href="/login">Login</a>
</div>

</div>

</body>

</html>

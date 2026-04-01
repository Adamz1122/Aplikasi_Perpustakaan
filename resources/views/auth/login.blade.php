<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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

    .login-box{
        width:350px;
        background:white;
        padding:30px;
        border-radius:15px;
        box-shadow:0 5px 15px rgba(0,0,0,0.1);
    }

    .login-box h2{
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

    .form-group input{
        width:100%;
        padding:10px;
        border-radius:8px;
        border:1px solid #ddd;
        outline:none;
    }

    .btn-login{
        width:100%;
        padding:10px;
        background:#7b4b2a;
        color:white;
        border:none;
        border-radius:8px;
        cursor:pointer;
        margin-top:10px;
    }

    .btn-login:hover{
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

    .error{
        color:red;
        text-align:center;
        margin-bottom:10px;
    }

    </style>

</head>

<body>

<div class="login-box">

<h2>Login</h2>

@if(session('error'))
<p class="error">{{ session('error') }}</p>
@endif

<form action="/login" method="POST">
@csrf

<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button class="btn-login">Login</button>

</form>

<div class="text-center">
Belum punya akun? <a href="/register">Register</a>
</div>

</div>

</body>

</html>

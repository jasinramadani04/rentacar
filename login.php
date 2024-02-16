<?php
include "inc/functions.php";
if(isset($_POST['login'])){
    //print_r($_POST);
    login($_POST['email'],$_POST['fjalekalimi']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rent a Car</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>

<body id="loginPage">

<header class="header">
    <div class="logo">
        <a href="index.html">
            <h3>Rent A Car</h3>
        </a>
    </div>
</header>

<div class="loginForma container">
    <div class="formaLogin">
        <h1>Login</h1>
        <form method="POST">
            <div>
                <input name="email" type="text" placeholder="email"> <br>
                <input name="fjalekalimi" type="password" placeholder="password">
            </div>

            <div class="loginFormFooter">
                <span>Nuk keni akoma account? <br> <a href="regjistrohu.html">Regjistrohu</a></span> <br>
                <input type="submit" id="login" name="login" value='Login'>
            </div>
        </form>
    </div>
</div>

</body>
</html>

<?php

session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $ok = true;
    if ((strlen($username) < 3) || (strlen($username) > 15)) {
        $ok = false;
        $_SESSION['e_username'] = 'Nick musi posiadać od 3 do 20 znaków!';
    }
    if (ctype_alnum($username) == false) {
        $ok = false;
        $_SESSION['e_username'] = 'username moze skladac sie tylko z liter i bez polskich znakow';
    }
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $ok = false;
        $_SESSION['e_email'] = "podaj poprawny emial!";
    }

    $password = $_POST['password'];
    if ((strlen($password) < 8) || (strlen($password) > 20)) {
        $ok = false;
        $_SESSION['e_password'] = 'Hasło musi posiadać od 8 do 20 znaków!';
    }

    $password_hash = hash('sha224', $password);
    $baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');

    $rezultat = $baza->query("SELECT id_user FROM users WHERE email='$email'");

    if (!$rezultat) throw new Exception($baza->error);

    $ile_takich_maili = $rezultat->fetchColumn();
    if ($ile_takich_maili > 0) {
        $ok = false;
        $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
    }

    //Czy nick jest już zarezerwowany?
    $rezultat = $baza->query("SELECT id_user FROM users WHERE username='$username'");

    if (!$rezultat) throw new Exception($baza->error);

    $ile_takich_nickow = $rezultat->fetchColumn();
    if ($ile_takich_nickow > 0) {
        $ok = false;
        $_SESSION['e_username'] = "Istnieje już taka nazwa uzytkownika. Wybierz inny.";
    }


    if ($ok == true) {

        $baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');

        $wynik = $baza->query("SELECT MAX(id_user) FROM users");
        $wynik = $wynik->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id_user)'];
        $wynik += 1;
        $profilowe = 'https://r-scale-20.dcs.redcdn.pl/scale/o2/tvn/web-content/m/p1/i/c1fea270c48e8079d8ddf7d06d26ab52/f132e851-9c81-4fe9-b985-95240e6fdeca.jpg?type=1&srcmode=0&srcx=1%2F1&srcy=1%2F1&srcw=1%2F1&srch=1%2F1&dstw=1920&dsth=1080&quality=80&fbclid=IwAR1G38f08oOGFJP6v2HsH2n6tgUCuIKTYadDtRM2okuVcjsg_6aM2lqbFDs';

        $zapytanie1 = $baza->prepare('INSERT INTO konto (id_konto,polubienia,data_zalozenia,profilowe,obserwujacy,obserwatorzy) 
        VALUES ("' . $wynik . '",0,CURDATE(), "' . $profilowe . '",0,0)');
        $zapytanie1->execute();


        $zapytanie = $baza->prepare('INSERT INTO users (id_user,email,username,password,id_konto) 
        VALUES ("' . NULL . '","' . $email . '","' . $username . '","' . $password_hash . '", "' . $wynik . '")');
        $zapytanie->execute();
        header('Location: index.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj się</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>

    <div class="container">
        <div class="img">
            <img class="wave" src="jpg/backRegi.png" alt="Zdjecie osoby wygladajacej zza okna">
        </div>
        <div class="login-content">
            <form method="POST">
                <h2 class="title">Welcome!</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" name='email' class="input">

                    </div>

                </div>
                <?php
                if (isset($_SESSION['e_email'])) {
                    echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                    unset($_SESSION['e_email']);
                } ?>


                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" name='username' class="input">
                    </div>
                </div>
                <?php
                if (isset($_SESSION['e_username'])) {
                    echo '<div class="error">' . $_SESSION['e_username'] . '</div>';
                    unset($_SESSION['e_username']);
                } ?>


                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name='password' class="input">
                    </div>
                </div>
                <?php
                if (isset($_SESSION['e_password'])) {
                    echo '<div class="error">' . $_SESSION['e_password'] . '</div>';
                    unset($_SESSION['e_password']);
                } ?>
                <?php
                if (isset($_SESSION['spr'])) {
                    echo '<div class="error">' . $_SESSION['spr'] . '</div>';
                    unset($_SESSION['spr']);
                } ?>



                <input type="submit" class="btn" name='register' value="Zarejestruj sie">
            </form>
        </div>
    </div>
    <script src="js/register.js"></script>
</body>

</html>
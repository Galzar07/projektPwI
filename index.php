<?php

session_start();

$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = hash('sha224', $password);
    $zapytanie = $baza->prepare('SELECT COUNT("id_user") FROM users WHERE username = "' . $username . '" AND password = "' . $password_hash . '"');

    $zapytanie->execute();
    $count = $zapytanie->fetchColumn();
    if ($count == "1") {
        $_SESSION['username'] = $username;


        header('location: home.php');
    } else {
        $message = '<label>Username OR Password is wrong</label>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaTon</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Trade+Winds&display=swap" rel="stylesheet">
</head>

<body>

    <header>

        <div>
            <h1 class='log'> InstaTon</h1>
        </div>

    </header>
    <main>
        <div class="containerM">
            <div id="img">
                <div class="slider">
                    <img class='changeImg' src="images/zdj1.jpg" alt="">
                </div>
            </div>

            <div id="loginMenu">
                <ul>
                    <?php
                    if (isset($message)) {
                        echo '<li class="err">' . $message . '</li>';
                    }
                    ?>
                    <li><button class="signIn">Zaloguj się</button>
                        <div class="loginContent">
                            <form method="post">
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Username</h5>
                                        <input type="text" name="username" class="input">
                                    </div>
                                </div>
                                <div class="input-div two">
                                    <div class="i">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Password</h5>
                                        <input type="password" name="password" class="input">
                                    </div>
                                </div>
                                <div class="three">
                                    <input type="submit" name="login" class="btn" value="Zaloguje sie">

                                    <div>Nie masz konta?! <a href="register.php">Zarejestruj sie!</a></div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <button class="signIn">Zaloguj się jako Administrator</button>
                        <div class="loginContent">
                            <form>
                                <div class="input-div two">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Username</h5>
                                        <input type="text" class="input">
                                    </div>
                                </div>
                                <div class="input-div two">
                                    <div class="i">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div class="div">
                                        <h5>Password</h5>
                                        <input type="password" class="input">
                                    </div>
                                </div>
                                <input type="submit" class="btn" value="Zaloguje sie">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="fotterNav">
                <ul>
                    <li>Kontakt</li>
                    <li>Pomoc</li>
                    <li>Regulamin</li>
                    <li>Polityka Prywatnośći</li>
                </ul>
            </div>

            <div id='copy'>
                <p></p>
            </div>

        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>
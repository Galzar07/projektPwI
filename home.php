<?php

session_start();
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');
$username = $_SESSION['username'];
$id_user = $baza->query('SELECT id_user FROM users WHERE username = "' . $username . '"');
$id_user = $id_user->fetchAll(PDO::FETCH_ASSOC)[0]['id_user'];

if (isset($_POST['btn'])) {
    $komentarz = $_POST['komentarz'];

    $wynik = $baza->query("SELECT MAX(id_kom) FROM komentarze");
    $wynik = $wynik->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id_kom)'];
    $wynik += 1;
    $zapytanie = $baza->prepare('INSERT INTO komentarze (id_kom,id_user,tresc) VALUES ("' . $wynik . '","' . $id_user . '","' . $komentarz . '")');
    $zapytanie->execute();
}

if (isset($_POST['serce'])) {
    echo $_POST['serce'];
    $znajdz = $baza->query('SELECT id_user FROM users WHERE ');
    $dodaj = $baza->query('UPDATE galeria SET polubienia = polubienia + 1 WHERE zdjecie = zdjecie ');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaTonHome</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>
    <div class="container-fluid">
        <header>
            <div id="header" class="row">

                <div class="log col-4">
                    <a href="home.php">
                        <h1 class='log'> InstaTon</h1>
                    </a>
                </div>

                <div id='inp' class="col-4">
                    <input type="text" placeholder="Szukaj">
                </div>

                <div id='homeMenu' class="col-4">
                    <ul>
                        <li><a href="home.php"><i class="fas fa-home"></i></a></li>
                        <li><a href="Stats.php"><i class="fas fa-hand-holding-heart"></i></a></li>
                        <li><a href="user.php"><i class="fas fa-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="row">

            <div id='leftSect' class="">


                <?php
                $wypiszPosty = $baza->query("SELECT zdjecie,username,id_user FROM galeria INNER JOIN users ON galeria.id = users.id_user ORDER BY zdjecie DESC");
                foreach ($wypiszPosty as $row) {
                    echo '<div class="post">
                                <div class="zdjLog ">
                                    <form method="POST">
                                    <i class="fas fa-user"></i><span>' . $row['username'] . ' </span><button type="submit" name="serce"><i class="far fa-heart"></i></button>
                                    </form>
                                </div>
                                <div class="imgFriends " >
                                    <img src="' . $row['zdjecie'] . '" alt="">
                                </div>
                            </div>';
                }

                ?>



            </div>


            <div id='rightSect'>
                <div id='profile'>
                    <i class="fas fa-user"></i>

                    <?php
                    if (isset($username)) {
                        echo '<span>' . $username . '</span>';
                    }
                    ?>
                    <div class="comment">
                        <div>
                            <h2>Komentarze</h2>
                        </div>
                        <div class="comUsers">
                            <?php
                            $baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');
                            $zap = $baza->query('SELECT username,tresc FROM users,komentarze WHERE users.id_user = komentarze.id_user');
                            foreach ($zap as $i) {
                                echo '<div><span>' . $i['username'] . ': </span>' . $i['tresc'] . '</div> ';
                            }

                            ?>

                        </div>
                        <div class="addCom">
                            <form method="post">
                                <input type="text" name='komentarz' placeholder="Dodaj Komentarz">
                                <input type='submit' name='btn' value="->" />
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </main>
    </div>
    <script src="js/home.js"></script>
</body>

</html>
<?php

session_start();
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');
$username = $_SESSION['username'];
$id = $baza->query('SELECT id_user FROM users WHERE username="' . $username . '"');
$id = $id->fetchAll(PDO::FETCH_ASSOC)[0]['id_user'];
$profi = $baza->query("SELECT profilowe FROM konto WHERE id_konto= $id");
$profi = $profi->fetchAll(PDO::FETCH_ASSOC)[0]['profilowe'];

$dataDol = $baza->query("SELECT data_zalozenia FROM konto WHERE id_konto=$id");
$dataDol = $dataDol->fetchAll(PDO::FETCH_ASSOC)[0]['data_zalozenia'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="container-fluid">
        <nav>
            <div class="row header">
                <div>
                    <a href="home.php">
                        <h1 class='log'>InstaTon</h1>
                    </a>
                </div>
                <div id='inp'>
                    <input type="text" placeholder="Szukaj">
                </div>
                <div id='homeMenu'>
                    <ul>
                        <li><a href="home.php"><i class="fas fa-home"></i></a></li>
                        <li><a href="Stats.php"><i class="fas fa-hand-holding-heart"></i></a></li>
                        <li><i class="fas fa-user"></i></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="row infoProf">

                <div class='profileImg col-4'>
                    <?php
                    echo '<img src=' . $profi . '>'
                    ?>

                </div>

                <div class="infoAboutProfile col-8">

                    <div class='profilHeader'>
                        <?php
                        if (isset($username)) {
                            echo '<h1>' . $username . '</h1>';
                        }
                        ?>
                    </div>

                    <div id='stats'>
                        <ul>
                            <li>Posty: <span id='postNumber'>0</span></li>
                            <?php
                            echo 'Data dołaczenia: ' . $dataDol;
                            ?>
                        </ul>
                    </div>
                    <div id='settings'>
                        <ul>

                            <li><button name='logout'><a href="wyloguj.php">Wyloguj sie</a></button></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row galeryImg">

                <?php
                $wypiszGalerie = $baza->query("SELECT * FROM galeria WHERE id=$id");
                foreach ($wypiszGalerie as $row) {
                    echo '<div class="post"><img src="' . $row['zdjecie'] . '"><div class="postText"><i class="far fa-heart"></i><span>' . $row['polubienia'] . '</span></div></div>';
                }

                ?>

            </div>
        </main>

        <footer>
            <div class="footer">
                <div class="fotterNav">
                    <ul>
                        <li>Kontakt</li>
                        <li><a href="pomoc.php">Pomoc</a></li>
                        <li>Regulamin</li>
                        <li>Polityka Prywatnośći</li>
                    </ul>
                </div>
                <div id='copy'>
                    <p></p>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/user.js"></script>
</body>

</html>
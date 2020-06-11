<?php

session_start();
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');



if (isset($_POST['usunKom'])) {
    $usuwanieKomentarzy = $baza->prepare('DELETE FROM komentarze WHERE id_kom="' . $_POST['usid'] . '"');
    $usuwanieKomentarzy->execute();
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>

<body>
    <div class="container-fluid">
        <header>
            <div id="header" class="row">

                <div class="log col-4">
                    <h1 class='log'> InstaTon</h1>
                </div>

                <div id='inp' class="col-4">
                    <form method="post">
                        <input type="text" class='wyszukiwarka' placeholder="Szukaj" name="wyszukiwarka">
                    </form>
                </div>
                <div id='homeMenu' class="col-4">
                    <ul>

                        <li><a href="wyloguj.php"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="row">

            <div id='leftSect' class="">
                <?php
                $baza = new PDO('mysql:host=localhost; dbname=instaton', 'root', '');
                $wypiszPosty = $baza->query("SELECT zdjecie,username,id_user,nr_postu FROM galeria INNER JOIN users ON galeria.id = users.id_user ORDER BY nr_postu DESC");
                foreach ($wypiszPosty as $row) {
                    $nrpostu = $row['nr_postu'];
                    echo '<div class="post">
                                <div class="zdjLog ">
                                    <form method="GET" action="usunadmin.php">
                                    <i class="fas fa-user"></i><span class="nickName">' . $row['username'] . ' </span>
                                    <button type="submit" name="nr_postu"><i class="fas fa-trash"></i></button>
                                    <input type="hidden" id="nr_postu" name="nr_postu" value="' . $row['nr_postu'] . '">
                                    </form>
                                </div>
                                <div class="imgFriends " >
                                    <img src="' . $row['zdjecie'] . '" alt="">
                                    <div class="comUsers">';
                    $com = $baza->query("SELECT users.username,komentarze.tresc,komentarze.nr_postu,komentarze.id_kom FROM users,komentarze WHERE users.id_user = komentarze.id_user AND komentarze.nr_postu = $nrpostu");
                    foreach ($com as $i) {
                        echo '<div><span> ' . $i['username'] . ': </span> ' . $i['tresc'] . ' 
                                            <form method="post">
                                                <button type="submit" name="usunKom"><i class="fas fa-trash"></i></button>
                                                <input type="hidden" id="usid" name="usid" value="' . $i['id_kom'] . '">
                                        </form>
                                            </div>';
                    }
                    echo           '</div>
                                </div>
                            </div>';
                }

                ?>



            </div>



        </main>
    </div>
    <script src="js/home.js"></script>
</body>

</html>
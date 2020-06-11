<?php
session_start();
if (isset($_POST['pomoc'])) {
    $username = $_POST['username'];
    $temat = $_POST['temat'];
    $problem = $_POST['problem'];

    $message = 'Dzieki' . $username . ' za wiadomosc postaramy sie odpowiedziec jak najszybciej';
}

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
    <link rel="stylesheet" href="css/pomoc.css">
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

                <div id='homeMenu'>
                    <ul>
                        <li><a href="home.php"><i class="fas fa-home"></i></a></li>
                        <li><a href="Stats.php"><i class="fas fa-hand-holding-heart"></i></a></li>
                        <li><a href="user.php"><i class="fas fa-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="kontakt">
                <h3>KONTAKT</h3>
                <form>
                    Temat: <input name='temat' type="text">
                    <br>
                    Twój nick: <input name='username' type='text'>
                    <br>
                    problem:
                    <br>
                    <textarea name="problem" id="" cols="50" rows="10"></textarea>
                    <br>
                    <input type="submit" name='pomoc' value="wyślij">
                </form>
            </div>

            <div>
                <?php
                if (isset($message)) {
                    echo '<span>' . $message . '</span>';
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
</body>

</html>
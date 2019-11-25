<?php

session_start();

if (!isset($_SESSION['res'])) {
    $_SESSION['res'] = 0;
}

$code = <-- REDACTED -->;

if (isset($_GET['code'])) {
    $c = $_GET['code'];

    if ($code[$_SESSION['res']] == $c) {
        $msg = "Lanjutkan";
        $_SESSION['res'] += 1;
    } else {
        $msg = "Salah, ulangi dari awal";
        $_SESSION['res'] = 0;
    }

    if ($c == "reset") {
        $_SESSION['res'] = 0;
        $msg = "";
    }
}

if ($_SESSION['res'] >= strlen($code)) {
    $msg = <-- REDACTED -->;
    $_SESSION['res'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gimme Nuclear Code</title>
</head>
<body>
    <center>
        <p>Masukkan beberapa kombinasi kode nuklir:</p>
        <p><a href="?code=1">1</a> <a href="?code=2">2</a> <a href="?code=3">3</a></p>
        <p><a href="?code=4">4</a> <a href="?code=5">5</a> <a href="?code=6">6</a></p>
        <p><a href="?code=7">7</a> <a href="?code=8">8</a> <a href="?code=9">9</a></p>
        <p><a href="?code=0">0</a></p>
        <p><a href="?code=reset">RESET</a></p>
    <?php
        if (isset($msg)) {
            echo "<p>" . $msg . "</p>";
        }
    ?>
    </center>
</body>
</html>

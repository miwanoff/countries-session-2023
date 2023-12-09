<?php
if (isset($_GET['login']) && $_GET['login'] == "admin") {
    include "header.php";
    $login = $_GET['login'];
    echo "<h2>Секретная информация для $login</h2>";
    echo "Сводка погоды";
    include "footer.php";
}
else {
    header("Location: index.php") ;
}
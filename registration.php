<?php
include "action.php";
include "header.php";

$user_form = '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="autoForm" class="login-form">
<input type="text" name="login" placeholder="Input login">
<input type="password" name="pass" placeholder="Input password">
<input type="submit" value="Go" name="go">
</form>';

echo '<div class="container authorized">';

echo "<h2>Sign up</h2>";
if (!isset($_SESSION['authorized'])) {
    echo $user_form;
} else {
    echo "<p>" . "You are registered" . "</p>";
}
echo "</div>";

if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];

    if (add_user($login, $password)) {
        echo "<p>Hello, $login </p>";
    }
    echo "<p>exist!</p>";
}

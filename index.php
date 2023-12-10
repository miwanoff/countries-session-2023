<?php
include "action.php";
//include "db.php";
include "header.php";

$autorized = false;

if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    echo check_role($login, $password) . "<br>";
    if (check_autorize($login, $password)) {
        $autorized = $_SESSION['authorized'] ;
        echo "Hello, $login";
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Report</a>";
        }

    } else {
        echo "<p>You are not registered</p>";
    }
}




$user_form = '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="autoForm" class="login-form">
<input type="text" name="login" placeholder="Input login">
<input type="password" name="pass" placeholder="Input password">
<input type="submit" value="Go" name="go">
</form>';
echo '<div class="container authorized">';
if (!isset($_SESSION['authorized'])) {
    echo $user_form;
    echo "<a href='registration.php'>Sign up</a>";
}
else {
    if (isset($_SESSION['authorized'])) {
        echo "<p>Hello,". $_SESSION['login']."</p>";
        echo "<a href='hello.php?login=".$_SESSION['login']."'>Report</a>";
    }
    echo '<br><a href="logout.php" class="logout">logout</a>';
}
echo "</div>"
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Banner Start ***** -->
                <div class="main-banner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="header-text">
                                <h6>Welcome To Cyborg</h6>
                                <h4><em>Browse</em> Our Popular Games Here</h4>
                                <div class="main-button">
                                    <a href="browse.html">Browse Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->
            </div>
        </div>
    </div>
</div>

<!-- ***** Most Popular Start ***** -->
<div class="most-popular">
    <div class="row">
        <div class="col-lg-12">
            <?php

$str_form_s = '<h3>Сортировать по:</h3>
<form action="index.php" method="post" name="sort_form">
    <select name="sort" id="sort" size="1">
        <option value="name">названию</option>
        <option value="area">площади</option>
        <option value="population">среднему населению</option>
    </select>
    <input type="submit" name="submit" value="OK">
</form>';
echo $str_form_s;

if (isset($_POST["sort"])) {
    $how_to_sort = $_POST["sort"];
    sorting($how_to_sort);

    $out = out_arr();

    if (count($out) > 0) {
        foreach ($out as $row) {
            echo $row;
        }
    } else {
        echo "Нет данных";
    }
}

$str_form_search = "
<div class=\"container\">
    <h3>Search:</h3>
    <form name='searchForm' action='index.php' method='post' onSubmit='return overify_login(this);'>
        <input type='text' name='search' class='form-control'>
        <input type='submit' name='gosearch' value='Confirm' class='btn btn-secondary my-2'>
        <input type='reset' name='clear' value='Reset' class='btn btn-secondary my-2'>
    </form>
</div>";

echo $str_form_search;

if (isset($_POST['gosearch'])) {
    $data = test_input($_POST['search']);
    $out = out_search($data);

// вызов функции out_arr() из action.php для получения массива
    if (count($out) > 0) {
        foreach ($out as $row) { //вывод массива построчно
            echo $row;
        }
    } else // если нет данных
    {
        echo "Nothing found...";
    }
}
?>
        </div>
    </div>
</div>
<!-- ***** Most Popular End ***** -->
<?php           
            include "footer.php";
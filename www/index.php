<?php 

define("ROOT", ".");

require_once(ROOT . "/const.php");
require_once(ROOT . "/model/user.php");
require_once(ROOT . "/pdo.php");

$path = isset($_GET["p"]) ? filter_input(INPUT_GET, "p", FILTER_SANITIZE_SPECIAL_CHARS) : null;

if(!is_logged() && $path != "signup" && $path != "login"){
    $path = "login";
}

switch($path){
    case "login":
        require_once(ROOT . "/vue/login.php");
        break;
    case "signup":
        $username = isset($_POST["username"]) ? filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $email = isset($_POST["email"]) ? filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) : null;
        $password = isset($_POST["password"]) ? filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $password2 = isset($_POST["password2"]) ? filter_input(INPUT_POST, "password2", FILTER_SANITIZE_SPECIAL_CHARS) : null;
        signup_verify($username, $email, $password, $password2);
        require_once(ROOT . "/vue/inscription.php");
        break;
}
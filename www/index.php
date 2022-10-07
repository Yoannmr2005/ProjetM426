<?php 

define("ROOT", ".");

require_once(ROOT . "/const.php");
require_once(ROOT . "/model/user.php");
require_once(ROOT . "/pdo.php");

$path = isset($_GET["p"]) ? filter_input(INPUT_GET, "p", FILTER_SANITIZE_SPECIAL_CHARS) : null;

if(!$path)
    header("location: ?p=home");

if(!is_logged())
    header("location: ?p=home");

if(is_logged() && ($path == "login" || $path == "signup"))
    header("location: ?p=home");

switch($path){
    case "home":
        if(is_logged()){
            require_once(ROOT . "/vue/homeCo.php");
        }
        else{
            require_once(ROOT . "/vue/homeDeco.php");
        }
        break;
    case "login":
        $username_or_email = isset($_POST["username_or_email"]) ? filter_input(INPUT_POST, "username_or_email", FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $password = isset($_POST["password"]) ? filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS) : null;
        login_verify($username_or_email, $password);
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
    /*case "logout":
        if(is_logged())
            logout();
            header("location: ?p=home");
        break;*/
}
<?php 

function is_logged(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_SESSION["username"]))
        return $_SESSION["username"];
    return false;
}

function find_user($columns, $search){
    $sql = "SHOW COLUMNS FROM `user` WHERE Field LIKE '".$columns."'";
    $req = dbRun($sql);
    $res = $req->fetchAll();

    if(!empty($res)){
        $sql = "SELECT * FROM `user` WHERE `".$columns."` = '".$search."'";
        $req = dbRun($sql);
        $res = $req->fetchAll();
        return $res;
    }

    return false;
}

function signup_verify($username, $email, $password, $password_conf){
    
    if($username === null && $email === null && $password === null && $password_conf === null)
        return;

    if(!empty(find_user("username", $username))){
        echo "Nom d'utilisateur déjà utilisé.";
        return;
    }

    if(!empty(find_user("email", $email))){
        echo "Email déjà utilisé.";
        return;
    }

    if($username < USERNAME_MIN_LENGTH){
        echo "Nom d'utilisateur trop court.";
        return;
    }

    /*if($username > USERNAME_MAX_LENGTH){
        echo "Nom d'utilisateur trop long.";
        return;
    }*/

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email invalide.";
        return;
    }

    if($email < EMAIL_MIN_LENGTH){
        echo "Email trop court.";
        return;
    }

    /*if($email > EMAIL_MAX_LENGTH){
        echo "Email trop long.";
        return;
    }*/

    if($password != $password_conf){
        echo "Les mots de passes ne correspondent pas.";
    }

    if($password < PASSWORD_MIN_LENGTH){
        echo "Mot de passe trop court.";
        return;
    }

    /*if($password > PASSWORD_MAX_LENGTH){
        echo "Mot de passe trop long.";
        return;
    }*/

    signup($username, $email, password_hash($password, PASSWORD_DEFAULT));

}

function signup($username, $email, $password){
    $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('".$username."', '".$email."', '".$password."')";
    $req = dbRun($sql);
}

function logout()
{
    // initialisation de la session
    if (!isset($_SESSION))
        session_start();

    // destruction des valeurs de la session
    $_SESSION = array();

    // suppression du cookie de session
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy(); // destruction de la session

    header("location: " . ROOT); // redirection
}



?>
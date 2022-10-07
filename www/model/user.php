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

    if(strlen($username) < 3){
        echo "Nom d'utilisateur trop court.";
        return;
    }

    if(strlen($username) > 45){
        echo "Nom d'utilisateur trop long.";
        return;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email invalide.";
        return;
    }

    if(strlen($email) < 5){
        echo "Email trop court.";
        return;
    }

    if(strlen($email) > 100){
        echo "Email trop long.";
        return;
    }

    if($password != $password_conf){
        echo "Les mots de passes ne correspondent pas.";
    }

    if(strlen($password) < 4){
        echo "Mot de passe trop court.";
        return;
    }

    if(strlen($password) > 60){
        echo "Mot de passe trop long.";
        return;
    }

    signup($username, $email, password_hash($password, PASSWORD_DEFAULT));

}

function signup($username, $email, $password){
    $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('".$username."', '".$email."', '".$password."')";
    $req = dbRun($sql);
}

function login_verify($username_or_email, $password)
{
    if ($username_or_email === null && $password === null) // si le username, l'email et le mot de passe sont inexistants 
        return;

    if ($username_or_email === "" || $password === "") { // vérifie si les formulaires sont complets
        echo "<p id=\"errorMsg\">Please complete all fields.</p>";
        return;
    }

    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) // vérfie si c'est un email
        $is_email = true;
    else
        $is_email = false;

    if ($is_email) { // si c'est un email
        $user_find = find_user("email", $username_or_email); // recherche de l'utilisateur via son email
        if (!$user_find) { // si l'utilisateur n'existe pas
            echo "<p id=\"errorMsg\">User not found.</p>";
            return;
        }

        if (password_verify($password, $user_find[0]["password"])) { // si le password est correct
            connect(intval($user_find[0]["idUser"]), $user_find[0]["username"], $user_find[0]["email"]);
        } else {
            echo "<p id=\"errorMsg\">Incorrect password.</p>";
            return;
        }
    } else { // si ce n'est pas un email
        $user_find = find_user("username", $username_or_email); // recherche de l'utilisateur via son username
        if (!$user_find) { // si l'utilisateur n'existe pas
            echo "<p id=\"errorMsg\">User not found.</p>";
            return;
        }

        if (password_verify($password, $user_find[0]["password"])) { // si le password est correct
            connect(intval($user_find[0]["idUser"]), $user_find[0]["username"], $user_find[0]["email"]);
        } else {
            echo "<p id=\"errorMsg\">Incorrect password.</p>";
            return;
        }
    }
}

function connect($idUser, $username, $email)
{
    $_SESSION["id"] = $idUser;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
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
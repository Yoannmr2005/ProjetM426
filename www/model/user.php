<?php 

function find_user($columns, $search){
    $sql = "SHOW COLUMNS FROM `user` WHERE Filed LIKE '".$columns."'";
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
    
    if(!empty(find_user("username", $username))){
        echo "Nom d'utilisateur déjà utilisé.";
    }

    if(!empty(find_user("email", $email))){
        echo "Email déjà utilisé.";
    }

    if($username < USERNAME_MIN_LENGTH){
        echo "Nom d'utilisateur trop court.";
        return;
    }

    if($username > USERNAME_MAX_LENGTH){
        echo "Nom d'utilisateur trop long.";
        return;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email invalide.";
        return;
    }

    if($email < EMAIL_MIN_LENGTH){
        echo "Email trop court.";
        return;
    }

    if($email > EMAIL_MAX_LENGTH){
        echo "Email trop long.";
        return;
    }

    if($password != $password_conf){
        echo "Les mots de passes ne correspondent pas.";
    }

    if($password < PASSWORD_MIN_LENGTH){
        echo "Mot de passe trop court.";
        return;
    }

    if($password > PASSWORD_MAX_LENGTH){
        echo "Mot de passe trop long.";
        return;
    }

    signup($username, $email, password_hash($password, PASSWORD_DEFAULT));

}

function signup($username, $email, $password){
    $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('".$username."', '".$email."', '".$password."')";
    $req = dbRun($sql);
}



?>
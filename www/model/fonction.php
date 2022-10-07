<?php 

require_once("pdo.php");

function PDO_Select_All($sql,$param){
    $query = dbRun($sql,$param);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function PDO_Select($sql,$param){
    $query = dbRun($sql,$param);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function PDO_Insert_Update_Delete($sql,$param){
    $query = dbRun($sql,$param);
    return $query;
}
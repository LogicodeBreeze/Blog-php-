<?php
session_start();

define('DB_PATH', __DIR__ . '/blog.sqlite');

function redirigir($url){
    header("Location: $url");
    exit;
}

function usuarioLogueado(){
    return isset($_SESSION['usuario_id']);
}

function requiereLogin(){
    if(!usuarioLogueado()){
        redirigir("login.php");
    }
}
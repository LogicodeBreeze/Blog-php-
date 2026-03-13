<?php
require "db.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email=?");
$stmt->execute([$email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password,$user["password"])){

$_SESSION["usuario_id"] = $user["id"];
$_SESSION["usuario_nombre"] = $user["nombre"];

header("Location: dashboard.php");

}else{

echo "Datos incorrectos";

}

}
?>

<h2>Login</h2>

<form method="POST">

<input type="email" name="email">

<input type="password" name="password">

<button>Entrar</button>

</form>

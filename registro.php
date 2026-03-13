<?php
require "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO usuarios(nombre,email,password) VALUES(?,?,?)");

$stmt->execute([$nombre,$email,$password]);

header("Location: login.php");

}
?>

<h2>Registro</h2>

<form method="POST">

<input type="text" name="nombre" placeholder="Nombre">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button>Registrarse</button>

</form>

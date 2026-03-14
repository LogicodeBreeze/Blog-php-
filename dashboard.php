<?php
require "db.php";
session_start();

if(!isset($_SESSION["usuario_id"])){
header("Location: login.php");
}

$stmt = $pdo->prepare("SELECT * FROM notas WHERE usuario_id=? ORDER BY fecha DESC");
$stmt->execute([$_SESSION["usuario_id"]]);

$notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Mis notas</h2>

<a href="crear_nota.php">Nueva nota</a>
<a href="logout.php">Cerrar sesión</a>

<hr>

<?php foreach($notas as $nota): ?>

<h3><?= $nota["titulo"] ?></h3>

<p><?= $nota["contenido"] ?></p>

<a href="eliminar_nota.php?id=<?=$nota["id"]?>">Eliminar</a>

<hr>

<?php endforeach ?>

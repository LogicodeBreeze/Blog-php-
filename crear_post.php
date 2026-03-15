<?php
require_once "db.php";
requiereLogin();

if($_SERVER["REQUEST_METHOD"] == "POST"){

$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];

$db = obtenerDB();

$stmt = $db->prepare("
INSERT INTO posts(usuario_id,titulo,contenido)
VALUES(?,?,?)
");

$stmt->execute([
$_SESSION["usuario_id"],
$titulo,
$contenido
]);

header("Location: dashboard.php");

}
?>

<form method="POST">

<input type="text" name="titulo" placeholder="Título">

<textarea name="contenido" placeholder="Contenido"></textarea>

<button>Publicar</button>

</form>

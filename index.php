<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conferences Near you</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <p class="slogan">Todo lo que te interesa <span>en una web </span></p>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Ha iniciado sesión correctamente
      <a href="logout.php"> 
Cerrar sesión
      </a>
    <?php else: ?>
      <h1>Bienvenido</h1>
      <h3>Inicie sesion o registrese</h3>

      <a href="login.php" class="button hollow">Iniciar sesion</a>

      <a href="signup.php" class="button hollow">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
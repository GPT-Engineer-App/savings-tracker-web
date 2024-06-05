<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Bem-vindo, <?php echo $_SESSION['email']; ?></h2>
    <div class="row mt-4">
      <div class="col-md-4">
        <a href="gastos.php" class="btn btn-danger btn-block">Gastos</a>
      </div>
      <div class="col-md-4">
        <a href="economias.php" class="btn btn-danger btn-block">Economias</a>
      </div>
      <div class="col-md-4">
        <a href="investimentos.php" class="btn btn-danger btn-block">Investimentos</a>
      </div>
    </div>
  </div>
</body>
</html>
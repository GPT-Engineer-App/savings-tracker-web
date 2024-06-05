<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];
  $data = $_POST['data'];
  $conta_id = '1234567890'; // Exemplo de conta_id

  $sql = "INSERT INTO transacao (descricao, valor, data, tipo, conta_id) VALUES ('$descricao', '$valor', '$data', 'Crédito', '$conta_id')";
  if ($conn->query($sql) === TRUE) {
    header('Location: economias.php');
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Economia</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Adicionar Economia</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao" required>
      </div>
      <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="number" class="form-control" id="valor" name="valor" required>
      </div>
      <div class="form-group">
        <label for="data">Data:</label>
        <input type="date" class="form-control" id="data" name="data" required>
      </div>
      <button type="submit" class="btn btn-danger">Adicionar</button>
    </form>
  </div>
</body>
</html>
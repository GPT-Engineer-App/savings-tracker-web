<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $valor_atual = $_POST['valor_atual'];
  $retorno = $_POST['retorno'];

  $sql = "INSERT INTO investimento (nome, valor_atual, retorno) VALUES ('$nome', '$valor_atual', '$retorno')";
  if ($conn->query($sql) === TRUE) {
    header('Location: investimentos.php');
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
  <title>Adicionar Investimento</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Adicionar Investimento</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="valor_atual">Valor Atual:</label>
        <input type="number" class="form-control" id="valor_atual" name="valor_atual" required>
      </div>
      <div class="form-group">
        <label for="retorno">Retorno:</label>
        <input type="number" class="form-control" id="retorno" name="retorno" required>
      </div>
      <button type="submit" class="btn btn-danger">Adicionar</button>
    </form>
  </div>
</body>
</html>
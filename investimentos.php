<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

$sql = "SELECT * FROM investimento";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Investimentos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Investimentos</h2>
    <canvas id="investimentosChart" width="400" height="200"></canvas>
    <table class="table mt-4">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Valor Atual</th>
          <th>Retorno</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['nome']; ?></td>
          <td><?php echo $row['valor_atual']; ?></td>
          <td><?php echo $row['retorno']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="add_investimento.php" class="btn btn-danger">Adicionar Investimento</a>
  </div>

  <script>
    var ctx = document.getElementById('investimentosChart').getContext('2d');
    var investimentosChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
        datasets: [{
          label: 'Investimentos',
          data: [500, 600, 700, 800, 900, 1000],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>
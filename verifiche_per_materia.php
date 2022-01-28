<?php
//connect to db compitiphp
$db = mysqli_connect('localhost', 'root', '', 'compitiphp');
$materia=$_GET["materia"];
//get nome materia
$sql = "SELECT nome FROM materie WHERE codice = '$materia'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
$nome_materia = $row["nome"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once("navbar.php") ?>
  <div id="layoutSidenav">
    <?php include_once("sidenav.php") ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Verifiche di <?php echo $nome_materia;?></h1>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Elenco verifiche
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Codice</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Scadenza</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Codice</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Scadenza</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $sql = "SELECT codice, titolo, descrizione, scadenza FROM verifiche WHERE MATERIA = ".$materia." ORDER BY scadenza";
                  $result = mysqli_query($db, $sql);
                  //print all records
                  $indice = 0;
                  
                  while ($row = $result->fetch_assoc()) {
                    $indice += 1;
                    echo "<tr>";
                    echo "<td>".$indice."</td>";
                    echo "<td>".$row["codice"]."</td>";
                    echo "<td>".$row["titolo"]."</td>";
                    echo "<td>".$row["descrizione"]."</td>";
                    echo "<td>".$row["scadenza"]."</td>";
                    echo "</tr>";
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
<?php
//connect to db compitiphp
$db = mysqli_connect('localhost', 'root', '', 'compitiphp');
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
          <h1 class="mt-4">Materie</h1>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Elenco materie
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Codice</th>
                    <th>Modifica</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Codice</th>
                    <th>Modifica</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM materie ORDER BY nome";
                  $result = mysqli_query($db, $sql);
                  //print all records
                  $indice = 0;
                  while ($row = $result->fetch_assoc()) {
                    $indice += 1;
                    echo "<tr>";
                    echo "<td>" . $indice . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["codice"] . "</td>";
                    echo "<td><button id='btnModificaMateria" . $row["codice"] . "' onclick='modificaMateria(this)'>Modifica</button></td>";
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
  <script>
    function modificaMateria(button) {
      if (button.innerHTML == "Modifica") {
        const riga = $(button).parent().parent();
        const tdNome = riga.children().eq(1);
        tdNome.html("<input type='text' id='txtNomeMateria' value='" + tdNome.text() + "'>");
        button.innerHTML = "Salva";
      } else {
        const riga = $(button).parent().parent();
        const tdNome = riga.children().eq(1);
        tdNome.html($(tdNome).children().val());
        button.innerHTML = "Modifica";
        //TODO: da salvare sul DB
      }
    }
  </script>
</body>

</html>
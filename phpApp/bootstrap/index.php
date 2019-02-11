<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row1">
                <h3>Podaci o turniru</h3>
            </div>
            <div class="row1">
              <p>
                    <a href="createturnir.php" class="btn btn-success">Kreiraj turnir</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Naziv</th>
                      <th>Mesto</th>
                      <th>Datum</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
               header('Content-type: text/html; charset=utf-8');
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM TURNIR ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row1) {
                   echo '<tr>';
                            echo '<td>'. $row1['Naziv'] . '</td>';
                            echo '<td>'. $row1['Mesto'] . '</td>';
                            echo '<td>'. $row1['Datum'] . '</td>';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row1['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <div class="row2">
                <h3>Podaci o partiji</h3>
            </div>
            <div class="row2">
              <p>
                    <a href="createpartija.php" class="btn btn-success">Kreiraj partiju</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Vreme</th>
                      <th>Ishod</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM TURNIR';
                   foreach ($pdo->query($sql) as $row1) {
                   echo '<tr>';
                            echo '<td>'. $row2['Vreme'] . '</td>';
                            echo '<td>'. $row2['Ishod'] . '</td>';
                            echo '<a class="btn btn-success"href="updatepartija.php?id='.$row2['id'].'">Azuriraj</a>';
                                echo ' ';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <div class="row3">
                <h3>Podaci o korisniku</h3>
            </div>
            <div class="row3">
              <p>
                    <a href="createkorisnik.php" class="btn btn-success">Kreiraj korisnika</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Ime</th>
                      <th>Prezime</th>
                      <th>BrLK</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM TURNIR ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row3) {
                   echo '<tr>';
                            echo '<td>'. $row3['Ime'] . '</td>';
                            echo '<td>'. $row3['Prezime'] . '</td>';
                            echo '<td>'. $row3['BrLK'] . '</td>';
                            echo '<td width=250>';
                                echo '<a class="btn" href="readkorisnik.php?id='.$row3['id'].'"> Read </a>';
                                echo ' ';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div><div class="row4">
                <h3>Podaci o potezu</h3>
            </div>
            <div class="row4">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Potez</th>
                      <th>BrPoteza</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM TURNIR ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row4) {
                   echo '<tr>';
                            echo '<td>'. $row4['Potez'] . '</td>';
                            echo '<td>'. $row4['BrPoteza'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> 
  </body>
</html>
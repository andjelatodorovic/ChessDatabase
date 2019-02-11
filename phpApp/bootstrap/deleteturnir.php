<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['SifT'])) {
        $id = $_REQUEST['SifT'];
    }
     
    if ( !empty($_POST)) {
        $id = $_POST['SifT'];
         
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM TURNIR  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row1">
                        <h3>Obrisi turnir</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Da li zelite da obrisete?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Da</button>
                          <a class="btn" href="index.php">Ne</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>
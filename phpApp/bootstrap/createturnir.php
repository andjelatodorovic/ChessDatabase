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
                        <h3>Kreiraj turnir</h3>
                    </div>
             
                    <form class="form-horizontal" action="createturnir.php" method="post">
                      <div class="control-group <?php echo !empty($nazivError)?'error':'';?>">
                        <label class="control-label">Naziv</label>
                        <div class="controls">
                            <input name="naziv" type="text"  placeholder="Naziv" value="<?php echo !empty($naziv)?$naziv:'';?>">
                            <?php if (!empty($nazivError)): ?>
                                <span class="help-inline"><?php echo $nazivError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mestoError)?'error':'';?>">
                        <label class="control-label">Mesto
                        </label>
                        <div class="controls">
                            <input name="mesto" type="text" placeholder="Mesto" value="<?php echo !empty($mesto)?$mesto:'';?>">
                            <?php if (!empty($mestoError)): ?>
                                <span class="help-inline"><?php echo $mestoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($datumError)?'error':'';?>">
                        <label class="control-label">Datum
                        </label>
                        <div class="controls">
                            <input name="datum" type="text"  placeholder="Datum" value="<?php echo !empty($datum)?$datum:'';?>">
                            <?php if (!empty($datumError)): ?>
                                <span class="help-inline"><?php echo $datumError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Kreiraj</button>
                          <a class="btn" href="index.php">Nazad</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>
<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        $nazivError = null;
        $mestoError = null;
        $datumError = null;
         
        $naziv = $_POST['naziv'];
        $mesto = $_POST['mesto'];
        $datum = $_POST['datum'];
         
        $valid = true;
        if (empty($naziv)) {
            $nazivError = 'Unesite naziv';
            $valid = false;
        }
         
        if (empty($mesto)) {
            $mestoError = 'Unesite mesto';
            $valid = false;
        } 
         
        if (empty($datum)) {
            $datumError = 'Unesite datum';
            $valid = false;
        }
         
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (naziv,mesto,datum) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($naziv,$mesto,$datum));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
        
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
                    <div class="row2">
                        <h3>Kreiraj partiju</h3>
                    </div>
             
                    <form class="form-horizontal" action="createpartija.php" method="post">
                      <div class="control-group <?php echo !empty($vremeError)?'error':'';?>">
                        <label class="control-label">Vreme</label>
                        <div class="controls">
                            <input name="vreme" type="text"  placeholder="Vreme" value="<?php echo !empty($vreme)?$vreme:'';?>">
                            <?php if (!empty($vremeError)): ?>
                                <span class="help-inline"><?php echo $vremeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ishodError)?'error':'';?>">
                        <label class="control-label">Ishod
                        </label>
                        <div class="controls">
                            <input name="ishod" type="text" placeholder="Ishod" value="<?php echo !empty($ishod)?$ishod:'';?>">
                            <?php if (!empty($ishodError)): ?>
                                <span class="help-inline"><?php echo $ishodError;?></span>
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
        $vremeError = null;
        $ishodError = null;
         
        $vreme = $_POST['vreme'];
        $ishod = $_POST['ishod'];
         
        $valid = true;
        if (empty($vreme)) {
            $vremeError = 'Unesite vreme';
            $valid = false;
        }
         
        if (empty($ishod)) {
            $ishodError = 'Unesite ishod';
            $valid = false;
        } 
         
         
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (vreme,ishod) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($vreme,$ishod));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
        
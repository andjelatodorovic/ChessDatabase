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
                    <div class="row3">
                        <h3>Kreiraj korisnika</h3>
                    </div>
             
                    <form class="form-horizontal" action="createkorisnik.php" method="post">
                      <div class="control-group <?php echo !empty($imeError)?'error':'';?>">
                        <label class="control-label">Ime</label>
                        <div class="controls">
                            <input name="ime" type="text"  placeholder="Ime" value="<?php echo !empty($ime)?$ime:'';?>">
                            <?php if (!empty($imeError)): ?>
                                <span class="help-inline"><?php echo $imeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($prezimeError)?'error':'';?>">
                        <label class="control-label">Prezime
                        </label>
                        <div class="controls">
                            <input name="prezime" type="text" placeholder="Prezime" value="<?php echo !empty($prezime)?$prezime:'';?>">
                            <?php if (!empty($prezimeError)): ?>
                                <span class="help-inline"><?php echo $prezimeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($brlkError)?'error':'';?>">
                        <label class="control-label">BrLK
                        </label>
                        <div class="controls">
                            <input name="brlk" type="text" placeholder="brlk" value="<?php echo !empty($brlk)?$brlk:'';?>">
                            <?php if (!empty($brlkError)): ?>
                                <span class="help-inline"><?php echo $brlkError;?></span>
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
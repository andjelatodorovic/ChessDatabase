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
                        <h3>Azuriranje turnira</h3>
                    </div>
             
                    <form class="form-horizontal" action="updatepartija.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($vremeError)?'error':'';?>">
                        <label class="control-label">Vreme</label>
                        <div class="controls">
                            <input name="Vreme" type="text"  placeholder="Vreme" value="<?php echo !empty($vreme)?$vreme:'';?>">
                            <?php if (!empty($vremeError)): ?>
                                <span class="help-inline"><?php echo $vremeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ishodError)?'error':'';?>">
                        <label class="control-label">Ishod</label>
                        <div class="controls">
                            <input name="ishod" type="text" placeholder="Ishod" value="<?php echo !empty($ishod)?$ishod:'';?>">
                            <?php if (!empty($ishodError)): ?>
                                <span class="help-inline"><?php echo $ishodError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Azuriraj</button>
                          <a class="btn" href="index.php">Nazad</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>
<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['SifP'])) {
        $id = $_REQUEST['SifP'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
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
            $sql = "UPDATE PARTIJA  set Vreme = ?, Ishod = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($vreme,$ishod,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM PARTIJA where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $vreme = $data['vreme'];
        $ishod = $data['ishod'];
        Database::disconnect();
    }
?>
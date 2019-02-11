<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['SifK'])) {
        $id = $_REQUEST['SifK'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM KORISNIK where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                    <div class="row3">
                        <h3>CitajKorisnika</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Ime</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ime'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Prezime</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['prezime'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">BrLK</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['brlk'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div>
  </body>
</html>
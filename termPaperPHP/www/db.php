
<?php 
try {
    $connection = new PDO( 
        "mysql:host=localhost;port=3306;dbname=flower_shop;charset=utf8",
        "admin", "pass",[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ] ) ;
    echo "Connection OK" ;
}
catch( PDOException $ex ) {
    echo $ex->getMessage() ;
}?>

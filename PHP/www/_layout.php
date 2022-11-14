<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PV011</title>
    <link  href="www/style.css"rel="stylesheet" type="text/css">
</head>
<body>
<h1>PHP</h1>
<div style="display:flex; flex-direction: column;  font-size:18px;">
    <a   href="/basics">Введение PHP</a>
    <a  href="/fundamentals">Основы PHP</a>
    <a href="/layout">Шаблонизация</a>
</div>
    
    <?php 
        switch( $path_parts[1]){
            case ''             :
            case 'index'        :
                include "index.php";
                break;
            case 'basics'       :
                include "basics.php";
                break;
            case 'fundamentals' :
                include "fundamentals.php";
                break;
            case 'layout'   :
                include "layout.php";
                break;
            default:
           include "error404.php";
        }
    ?>
    <?php  $x = 10;
     $i = 20;
     include "footer.php" ?>
        
</body>
</html>
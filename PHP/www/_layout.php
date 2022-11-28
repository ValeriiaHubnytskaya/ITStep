<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PV011</title>
    <link  href="/css/style.css" rel="stylesheet" >
</head>
<body>

<h1>PHP</h1>
<div  class="menu">
    <img src="/img/image.png" alt="logo" class="logo"/>
    <a   href="/basics">Введение PHP</a>
    <a  href="/fundamentals">Основы PHP</a>
    <a href="/layout">Шаблонизация</a>
    <a href="/formdata">Данные форм</a>
    <a href="/db">Работа с БД</a>
    <?php if(is_array($_AUTH)) { ?>
        <b>Hello</b>
    <?php } else {  ?>
    <form method="post">
        <label><input name="userlogin" placeholder="login" /></label>
        <label><input name="userpassw" type="password" /></label>
        <button>Log in</button>
        <a href="/registration">Reg</a>
    </form>
    <?php if(is_string($_AUTH)) {echo $_AUTH;} ?>
    <?php }  ?>
</div>
    
    <?php 
    if($path_parts[1] === '') 
    $path_parts[1] = 'index';
        switch( $path_parts[1]){
          
            case 'index'        :
            case 'basics'       :
            case 'fundamentals' :
            case 'layout'   :
            case 'formdata'     :
            case 'db':
            case 'registration' :
                include "{$path_parts[1]}.php";
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
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
    <a  style="color:maroon" href="/email_test">E-mail</a>
     

    <?php if(is_array($_CONTEXT['auth_user'])) { ?>
        <b>Hello, <?= $_CONTEXT['auth_user']['name'] ?></b>
        <img class='user-avatar' src = '/avatars/<?= empty($_CONTEXT['auth_user']['avatar']) ? 'images.png': $_CONTEXT['auth_user']['avatar'] ?>'
        <!-- Кнопка выхода из авторизованого режима - ссылка передающая параметр logout-->
        <a class="logout" href="?logout"> Log Out </a>
    <?php } else {  ?>
    <form method="post">
        <label><input name="userlogin" placeholder="login" /></label>
        <label><input name="userpassw" type="password" /></label>
        <button>Log in</button>
        <a href="/register">Регистрация</a>
    </form>
    <?php if(isset($_CONTEXT['auth_error'])) {echo $_CONTEXT['auth_error'];} ?>
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
            case 'email_test':
            case 'register' :
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
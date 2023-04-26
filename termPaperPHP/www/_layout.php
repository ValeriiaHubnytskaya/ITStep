<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers - <?= $_CONTEXT['page_title'] ?? '' ?> </title>
    <link  href="/css/main.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <section  class="menu">
        <header class="title"> 
            <h1>Квіткова крамничка</h1>
        </header>
        <nav class="funct">
            <a href="/shop/index"> <b>Букет для коханої</b></a>
            <a href="/shop_men/men"> <b>Букет для коханого</b></a>
            <a href="/woman"> <b>Кошик</b> </a>
           <a   href="/_auth/_auth"><b>Вхід</b></a>
         <a href="/register/register"><b>Зареєструватися</b></a>
        </nav>
      
        
    </section>
    
    <?php 
    if(empty($path_parts[2])) 
    $path_parts[2] = 'index';
   
        switch( $path_parts[2]){
          
            case 'index'        :
            case 'fundamentals' :
            case 'men'          :
            case 'db'           : 
            case '_auth'        :           
            case 'email_test'   :
            case 'register'     :
                include "{$path_parts[2]}.php";
                break;
           
            case 'profile': include "views/{$path_parts[2]}.php";
                break;
            default:
                include "error404.php";
        }
    ?>
   
        
</body>
</html>
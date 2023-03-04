<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers</title>
    <link  href="/css/style.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>

    <?php include "_auth.php" ?>
    <form method="post" class="registerForm" enctype="multipart/form-data">
       
        <label>Логін <br/>
            <input name="login" value='<?= (isset($view_data['login'])) ? $view_data['login'] : "" ?>' />
        </label>
        <br/>
        <label>Ім'я <br/>
            <input name="name" value='<?= (isset($view_data['name'])) ? $view_data['name'] : "" ?>'/>
        </label>
        <br/>
        <label>Пароль <br/>
            <input name="password" type="password" required>
        </label>
        <br/>
        <label>Підтвердження пароля <br/>
            <input type="password" name="confirm">
        </label>
        <br/>
        <label>E-mail<br/>
            <input type="email" name="email" required value='<?= (isset($view_data['email'])) ? $view_data['email'] : "" ?>' />
        </label>
        <br/>
        <label>Фото<br/>
            <input type="file" name="avatar" />
        </label>
        <br/>
        <button>Зареєструватися</button>
    
    </form>  
</body>
</html>

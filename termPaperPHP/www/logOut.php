<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers</title>

</head>
<body>

    <?php include "_auth.php" ?>

    <form  action="controllers/auth_controller.php"method="post" class="registerForm" >
       
       <label>Логін <br/>
           <input name="login"  />
       </label>
       <br/>
      
       <label>Пароль <br/>
           <input name="password" type="password" required >
       </label><br/>
      
       <button type="submit">Авторизація</button>
      
       
   
   </form>  


  
</body>
</html>
     <?php include "_auth.php"; ?>
     
       

    <form action="/controllers/register_controller.php" method="post" class="registerForm" enctype="multipart/form-data">
       
        <label>Логін <br/> 
            <input name="login" value='<?= (isset($_SESSION['login']) ? $_SESSION['login'] : "")  ?>'/>
        </label>
        <span style="color: #05330c;"><?=(isset($error['login']) ? $error['login'] : "")?></span>
        <br/>
        <label>Ім'я <br/>
            <input name="name" value='<?= (isset($_SESSION['name']) ? $_SESSION['name'] : "") ?>'/>
        </label>
        <span style="color: #05330c;"><?=(isset($error['name'])? $error['name'] : "")?></span>
        <br/>
        <label>Пароль </span><br/>
            <input name="password" type="password" >
        </label>
        <span style="color: #05330c;"><?=(isset($error['pass'])? $error['pass'] : "")?></span>
        <br/>
        <label>Підтвердження пароля <br/>
            <input type="password" name="confirm" >            
        </label>
        <span style="color: #05330c;"><?=(isset($error['confirm'])? $error['confirm'] : "")?></span>
        <br/>
        <label>E-mail<br/>
            <input type="email" name="email"  value='<?= (isset($_SESSION['email']) ? $_SESSION['email'] : "")?>'/>            
        </label>
        <span style="color: #05330c;"><?=(isset($error['email'])? $error['email'] : "")?></span>
        <br/>
        <label>Фото<br/>
            <input type="file" name="avatar" />
        </label>
        <br/>
        <button type="submit">Зареєструватися</button>
    
    </form>  

<!-- required -->
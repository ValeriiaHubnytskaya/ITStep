     <?php include "_auth.php"; ?>
     <?php if(isset($view_data['r_error'] )): ?>
        <div class ="r_error"><?=  $view_data['r_error'] ?></div>
    <?php endif ?>

    <?php if(isset($view_data['r_ok'] )): ?>
        <div class ="r_error"><?=  $view_data['r_ok'] ?></div>
    <?php endif ?>
       

    <form action="/controllers/register_controller.php" method="post" class="registerForm" enctype="multipart/form-data">
       
        <label>Логін <br/> 
            <input name="login"  value='<?= (isset($view_data['login']) ? $view_data['login'] : "")  ?>'/>
        </label>
        
        <br/>
        <label>Ім'я <br/>
            <input name="name" value='<?= (isset($view_data['name']) ? $view_data['name'] : "") ?>'/>
        </label>
        
        <br/>
        <label>Пароль </span><br/>
            <input name="password" type="password" >
        </label>
        <br/>
        <label>Підтвердження пароля <br/>
            <input type="password" name="confirm" >            
        </label>
        <br/>
        <label>E-mail<br/>
            <input type="email" name="email"  value='<?= (isset($view_data['email']) ? $view_data['email'] : "")?>'/>            
        </label>
        <br/>
        <label>Фото<br/>
            <input type="file" name="avatar" />
        </label>
        <br/>
        <button type="submit">Зареєструватися</button>
    
    </form>  

<!-- required -->
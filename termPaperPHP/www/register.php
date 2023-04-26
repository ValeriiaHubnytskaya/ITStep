<?php if(isset($view_data['reg_error'] )): ?>
    <div class ="reg-error"><?=  $view_data['reg_error'] ?></div>
    <?php endif ?>

    <?php if(isset($view_data['reg_ok'] )): ?>
    <div class ="reg_error"><?=  $view_data['reg_ok'] ?></div>
    <?php endif ?>
    

<form method="post" class="registerForm" enctype="multipart/form-data">
    <label>Логін <br/>
        <input name="login" value='<?= (isset($view_data['login'])) ? $view_data['login'] : "" ?>' />
    </label>
    <br/>
    <label>Ім'я<br/>
        <input name="name" value='<?= (isset($view_data['name'])) ? $view_data['name'] : "" ?>'/>
    </label>
        <br/>
    <label>Пароль<br/>
        <input name="password" type="password" >
    </label>
        <br/>
    <label>Підтвердження пароля<br/>
        <input type="password" name="confirm">
    </label>
        <br/>
    <label>E-mail<br/>
        <input type="email" name="email"  value='<?= (isset($view_data['email'])) ? $view_data['email'] : "" ?>' />
    </label>
     <br/>
    <label>Фото<br/>
        <input type="file" name="avatar" />
    </label>
     <br/>
    <button>Зареєструватися</button>
</form>
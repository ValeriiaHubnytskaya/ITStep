<?php if(isset($view_data['reg_error'] )): ?>
    <div class ="reg-error"><?  $view_data['reg_error'] ?></div>
    <?php endif ?>

    <?php if(isset($view_data['reg_ok'] )): ?>
    <div class ="reg_error"><?  $view_data['reg_ok'] ?></div>
    <?php endif ?>
    

<form method="post" class="registerForm">
<label>Login <br/>
    <input name="login" value='<?= (Isset($view_data['login'])) ? $view_data['login'] : "" ?>' />
</label>
 <br/>
<label>UserName <br/>
    <input name="name" value='<?= (Isset($view_data['name'])) ? $view_data['name'] : "" ?>'/>
</label>
<br/>
<label>Password <br/>
    <input name="password" type="password" required>
</label>
 <br/>
<label>ConfirmPassword <br/>
    <input type="password" name="confirm">
</label>
<br/>
<label>E-mail<br/>
    <input type="email" name="email" required value='<?= (Isset($view_data['email'])) ? $view_data['email'] : "" ?>' />
</label>
<br/>
 <button>Registration</button>
</form>
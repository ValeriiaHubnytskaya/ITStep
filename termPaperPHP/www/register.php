
    

<form action="/register" method="post" class="registerForm" enctype="multipart/form-data">
    <label>Логін <br/>
        <input name="login" value="<?= (isset($view_data['login'])) ? $view_data['login'] :"" ?>" />
        <br/>
        <?php if( isset( $view_data[ 'reg_log' ] )  ) : ?>
                           <?= $view_data[ 'reg_log' ] ?>
                        <?php endif ?>
    </label>
    <br/>
    <label>Ім'я<br/>
        <input name="name" value="<?= (isset($view_data['name'])) ? $view_data['name'] : "" ?> "/>
        <br/>
        <?php if( isset( $view_data[ 'reg_name' ] )): ?>
                            <?= $view_data[ 'reg_name' ] ?>
                        <?php endif ?>
    </label>
        <br/>
    <label>Пароль<br/>
        <input name="password" type="password"  >
        <br/>
        <?php if( isset( $view_data[ 'reg_pass' ] )): ?>
                            <?= $view_data[ 'reg_pass' ] ?>
                        <?php endif ?>
    </label>
        <br/>
    <label>Підтвердження пароля<br/>
        <input type="password" name="confirm">
        <br/>
        <?php if( isset( $view_data[ 'reg_conf' ] )) :?>
                            <?= $view_data[ 'reg_conf' ] ?>
                        <?php endif ?>
    </label>
        <br/>
    <label>E-mail<br/>
        <input type="email" name="email"  value="<?= (isset($view_data['email'])) ? $view_data['email'] : "" ?>" />
        <br/>
        <?php if( isset( $view_data[ 'reg_email' ] )) : ?>
                           <?= $view_data[ 'reg_email' ] ?>
                        <?php endif ?>
    </label>
     <br/>
    <label>Фото<br/>
        <input type="file" name="avatar"  />
    </label>
     <br/>
    <button name="form-name" value="register">Зареєструватися</button>
</form>
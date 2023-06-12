<?php
@session_start(); //сессия - перед обращением к сессии обязательно
switch( strtoupper($_SERVER['REQUEST_METHOD'])){
    case 'GET'  :     
        $view_data = [];
        if(isset($_SESSION['reg_log'])||isset($_SESSION['reg_name'])|| isset($_SESSION['reg_pass']) || isset($_SESSION['reg_conf'])|| isset($_SESSION['reg_email'])){
            $view_data['reg_log'] = $_SESSION['reg_log'];
            $view_data['reg_name'] = $_SESSION['reg_name'];
            $view_data['reg_pass'] = $_SESSION['reg_pass'];
            @$view_data['reg_conf'] = $_SESSION['reg_conf'];
            $view_data['reg_email'] = $_SESSION['reg_email'];
            unset($_SESSION['reg_log']);  
            unset($_SESSION['reg_name']);  
            unset($_SESSION['reg_pass']);  
            unset($_SESSION['reg_conf']);  
            unset($_SESSION['reg_email']);  
            $view_data['login'] = $_SESSION['login'];
            $view_data['email'] = $_SESSION['email'];
            $view_data['name'] = $_SESSION['name'];
        }
        if(isset($_SESSION['reg_ok'])){
            $view_data['reg_ok'] = $_SESSION['reg_ok'];
            unset($_SESSION['reg_ok']);  
        }
        include "_layout.php";
        break;

    case 'POST' : 
        if(empty($_POST['login'])){
            $_SESSION[ 'reg_log' ] = 'Введіть логін.' ;
        }
        else if ( strlen($_POST['login']) < 8 ) {
            $_SESSION[ 'reg_log' ] = 'Має бути не менше 8 символів.';
        }
        if(empty($_POST['name'])){
            $_SESSION[ 'reg_name' ] = "Введіть ім'я" ;
        }
        // else if ( preg_match( "/\s/", $_POST['name'] ) ) {
        //     $_SESSION[ 'reg_name' ] = "Ім'я не може містити пробіли";
        // }
        if(empty($_POST['password'])){
            $_SESSION[ 'reg_pass' ] = 'Введіть пароль.';
        }
        // else if ( !preg_match( "/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password'] ) ) {
        //     $_SESSION[ 'reg_pass' ] = 'Пароль має містити 8 символів, одна цифра, одна велика та одна мала літера';
        // }
        if(empty($_POST['email'])){
            $_SESSION[ 'reg_email' ] = 'Введіть email';
        }
        if($_POST['password'] !== $_POST['confirm']){
            $_SESSION[ 'reg_conf' ] = 'Паролі не співпадають';
        } 
        try{
            $prep = $connection->prepare(
            "SELECT COUNT(Id) FROM users u WHERE u.`login` = ?");
            $prep->execute([$_POST['login']]);
            $cnt = $prep->fetch(PDO::FETCH_NUM)[0];
        }
        catch (PDOException $ex){
            $_SESSION['reg_log'] = $ex->getMessage();
        }
        if($cnt > 0){
            $_SESSION[ 'reg_log' ] = 'Логін вже зайнятий.';
        }
             // Проверяем наличие аватара и загружаем файл
            // Берем имя файла, отделяем разширение, проверяем на допустимые (изображения)
            //сохраняем разширение, но меняем имя файла
            //использовать переданные имена (опасно)
            //Возможные ДТ - атаки со спецсимволами в именах
            // Файлы храним в отдельной папке, их имена
        if( isset( $_FILES['avatar'] ) ) {  // наличие файлового поля на форме
            if( $_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] != 0 ) {
                // есть переданный файл
                $dot_position = strrpos( $_FILES['avatar']['name'], '.' ) ;  // strRpos ~ lastIndexOf
                if( $dot_position == -1 ) {  // нет расширения у файла
                    $_SESSION[ 'reg_error' ] = "File without type not supported" ;
                }
                else {
                    $extension = substr( $_FILES['avatar']['name'], $dot_position ) ;  // расширение файла (с точкой ".png")
                    if( ! in_array( $extension, ['.jpg', '.png', '.jpeg', '.svg'] ) ) {
                        $_SESSION[ 'reg_error' ] = "File extension '{$extension}' not supported" ;
                    }
                    else {
                        $avatar_path = 'avatars/' ;
                        do {
                            $avatar_saved_name = bin2hex( random_bytes(8) ) . $extension ;
                        } while( file_exists( $avatar_path . $avatar_saved_name ) ) ;
                        if( ! move_uploaded_file( $_FILES['avatar']['tmp_name'], $avatar_path . $avatar_saved_name ) ) {
                            $_SESSION[ 'reg_error' ] = "File (avatar) uploading error" ;
                        }
                        
                    }
                }
            }
        }
        if( empty( $_SESSION[ 'reg_error' ] ) ) {
            // подключаем фукнцию отправки почты
            @include_once "helper/send_email.php" ;
            if( ! function_exists( "send_email" ) ) {
                $_SESSION[ 'reg_error' ] = "Inner error" ;
            }
        }

        if(empty($_SESSION['reg_log'])&& empty($_SESSION['reg_name']) && empty($_SESSION['reg_pass']) && empty($_SESSION['reg_email']) && empty($_SESSION['reg_conf'])){            $salt = md5(random_bytes(16));
            $pass = md5($_POST['confirm'] . $salt);
            $confirm_code = bin2hex(random_bytes(3));
            send_email( $_POST['email'], 
            "pv011.local Email verification", 
            "<b>Hello, {$_POST['name']}</b><br/>
            Type code <strong>$confirm_code</strong> to confirm email<br/>
            Or follow next <a href='https://php.local/confirm?code={$confirm_code}&email={$_POST['email']}'>link</a>" ) ;

            $sql = "INSERT INTO users(`id`, `login`,`name`, `salt`, `pass`, `email`,`confirm`,      `avatar`) 
                VALUES(            UUID(),?,      ?,    '$salt','$pass',   ?,   '$confirm_code',    ?)" ;
            try {
                $prep = $connection->prepare( $sql ) ;
                $prep->execute( [ 
                    $_POST['login'], 
                    $_POST['name'], 
                    $_POST['email'],
                    isset( $avatar_saved_name ) ? $avatar_saved_name : null
                ] ) ;
                $_SESSION[ 'reg_ok' ] = "Reg ok" ;
            }
            catch( PDOException $ex ) {
                $_SESSION[ 'reg_error' ] = $ex->getMessage() ;
            }
            
    }
    else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $_POST['name'];
    }
    header("Location: /shop/register");
    break;

}
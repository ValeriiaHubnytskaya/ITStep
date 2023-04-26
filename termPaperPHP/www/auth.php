<?php
//Аутентификация
session_start(); //включаем в работу сессии
$_CONTEXT[ 'auth_user' ] = false ;
//традиционно проверяется первым выход
if(isset($_GET['logout'])){
    logout() ;
}
if (isset($_POST['userlogin']) && isset( $_POST[ 'userpassw' ] )){ 
    //находим данные в бд по логину
    $sql = "SELECT * FROM users u WHERE u.`login` =
     '{$_POST['userlogin']}'";
    try {
           $res = $connection->query($sql);
           $row = $res->fetch(PDO::FETCH_ASSOC); 
            if($row){
                $salt = $row['salt'];
                $hash = md5($_POST['userpassw'] . $salt);
                if($hash == $row['pass']){
                    //авторизация успешна
                    //$_AUTH = $row;
                    //сохраняем в сессии факт авториации  - id пользователя
                    $_SESSION['auth_id'] = $row['id'];
                    //так же сохраняем метку времени начало авторизованого режиме
                    $_SESSION['auth_time'] = time();
                }
                else { //пароль не правильный
                    //$_AUTH = "ACCESS DENIED";
                    $_SESSION['auth_error'] = $row['access denied'];
                }
            }
            else { //такого логина нет в БД
                //$_AUTH = "ACCESS RESTRICTED";
                $_SESSION['auth_error'] = $row['access restricted'];
            }
        }
        catch(PDOException $ex) {
            echo $ex->getMessage();
               exit; 
        }
        header("Location: " . $_CONTEXT['path']);
        exit;
     
}
if(isset($_SESSION['auth_error'])){
    $_CONTEXT['auth_error'] = $_SESSION['auth_error'];
    unset($_SESSION['auth_error']);
}

if(isset($_SESSION['auth_id'])){ //есть сохраненные данные аутентификации

    //проверяем длительность авторизованого режима
    $auth_interval = time() - $_SESSION[ 'auth_time' ] ;
    $_CONTEXT[ 'auth_interval' ] = $auth_interval ;
    if( $auth_interval > 10000 ) {
        logout() ;
    }
    //если интересует только время простоя, то здесь нужно лбновить сохраненное время
    //$_SESSION['auth_time'] = time();
    
    //извлекаем данные по сохраненному id
    $sql = "SELECT * FROM users u WHERE u.`id` = ?";
    try{
     $prep = $_CONTEXT[ 'connection' ]->prepare( $sql ) ;
        $prep->execute( [ $_SESSION[ 'auth_id' ] ] ) ;
        $row = $prep->fetch( PDO::FETCH_ASSOC ) ;
        $_CONTEXT[ 'auth_user' ] = $row ;
        if( $row ) {
            unset( $_CONTEXT[ 'auth_user' ][ 'pass' ] ) ;
            unset( $_CONTEXT[ 'auth_user' ][ 'salt' ] ) ;
        }
        else {
            // Есть сохраненный в сессии ID, но запрос не дал результата. Вероятно пользователь был удален
            unset( $_SESSION[ 'auth_id' ] ) ;   // убираем ID из сессии
        }
    }

    catch(PDOException $ex){
        echo $ex->getMessage();
        exit;
    }
}

function logout() {
    unset( $_SESSION[ 'auth_id' ] ) ;
    // по требованиям безопасности после смены авторизации необходимо перезагрузить
    // и желательно перевести на заведомо не требующую авторизации страницу - на главную
    header( "Location: /" ) ;
    exit ;
}
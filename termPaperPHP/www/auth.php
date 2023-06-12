<?php
//Аутентификация
session_start(); //включаем в работу сессии
$_CONTEXT[ 'auth_user' ] = false ;

//традиционно проверяется первым выход
if(isset($_GET['logout'])){
    logout() ;
}
switch( strtoupper($_SERVER['REQUEST_METHOD'])){
    case 'GET'  :   
        $view_data=[];
        if(isset($_SESSION['auth_log'])||isset($_SESSION['auth_pass'])){
            @$view_data['auth_log'] = $_SESSION['auth_log'];
            $view_data['auth_pass'] = $_SESSION['auth_pass'];
            unset($_SESSION['auth_log']);
            unset($_SESSION['auth_pass']);
            @$view_data['userlogin'] = $_SESSION['userlogin'];  
            include "_layout.php"; 
           
        }       
        //  header("Location: /shop/_auth");
        break;

    case 'POST' :  
        if (isset($_POST['userlogin']) && isset( $_POST[ 'userpassw' ] )){ 
            if(empty($_POST['userlogin'])){
                $_SESSION['auth_log'] = "Введіть логін.";
            }
            else if( strlen($_POST['userlogin']) < 8 ){
                $_SESSION['auth_log'] = "Має бути не менше 8 символів..";
            }
            if(empty($_POST[ 'userpassw' ])){
                $_SESSION['auth_pass'] = "Введіть пароль.";
            }
            else{
                //находим данные в бд по логину
                $sql = "SELECT * FROM users u WHERE u.`login` = '{$_POST['userlogin']}'";        
                try {
                    $res = $connection->query($sql);
                    $row = $res->fetch(PDO::FETCH_ASSOC); 
                    if($row){
                        $salt = $row['salt'];
                        $hash = md5($_POST['userpassw'] . $salt);
                        if($hash == $row['pass']){
                            //авторизация успешна
                            //сохраняем в сессии факт авториации  - id пользователя
                            $_SESSION['auth_id'] = $row['id'];
                            //так же сохраняем метку времени начало авторизованого режиме
                            $_SESSION['auth_time'] = time();
                        }
                        else { //пароль не правильный
                            $_SESSION['auth_pass'] = $row['access destrict'];
                        }
                    }
                    else { //такого логина нет в БД
                        //$_AUTH = "ACCESS RESTRICTED";
                        $_SESSION['auth_log'] = $row["Такого логіну не існує"];
                    }
                }
                catch(PDOException $ex) {
                    echo $ex->getMessage();
                    exit; 
                }
                header("Location: " . $_CONTEXT['path']);                
                exit;
            }
        } 
      
        if(isset($_SESSION['auth_id'])){ //есть сохраненные данные аутентификации
            //проверяем длительность авторизованого режима
            $auth_interval = time() - $_SESSION[ 'auth_time' ] ;
            $_CONTEXT[ 'auth_interval' ] = $auth_interval ;
            if( $auth_interval > 10000 ) {
                logout() ;
            }
            
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
            //include "_layout.php";
        }     
        else{
            $view_data['userlogin'] = $_SESSION['userlogin'];
             header("Location: /shop/_auth");
        }  
   
    
    break;
}
function logout() {
    unset( $_SESSION[ 'auth_id' ] ) ;
    // по требованиям безопасности после смены авторизации необходимо перезагрузить
    // и желательно перевести на заведомо не требующую авторизации страницу - на главную
    header( "Location: /shop/index" ) ;
    exit ;
}
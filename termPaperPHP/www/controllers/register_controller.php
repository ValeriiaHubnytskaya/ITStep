<?php
//    filter_var - очищаем строку от ненужных символов html
//  trim - очищает строку от пробелов 
   

    @$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    @$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    @$pass = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);
    @$confirm = filter_var(trim($_POST['confirm']),
    FILTER_SANITIZE_STRING);
    @$email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    
    session_start();
    // $_SESSION['login'] = $login;
    // $_SESSION['email'] = $email;
    // $_SESSION['name'] = $name;

    // $error = [];    
    switch( strtoupper($_SERVER['REQUEST_METHOD'])){
        case 'GET'  :     
            $view_data = [];
            if(isset($_SESSION['r_error'])){
                $view_data['r_error'] = $_SESSION['r_error'];
                unset($_SESSION['r_error']);  
                $view_data['login'] = $_SESSION['login'];
                $view_data['email'] = $_SESSION['email'];
                $view_data['name'] = $_SESSION['name'];
            }

            if(isset($_SESSION['r_ok'])){
                $view_data['r_ok'] = $_SESSION['r_ok'];
                unset($_SESSION['r_ok']);  
            }
            include "../index.php";
            break;
        
        case 'POST':

            if(empty($email)){
                // $error['email'] = "Введіть Email.";
                $_SESSION['r_error'] = "Введіть Email.";
            }   
            if($pass != $confirm){
                // $error['confirm']= "Паролі не співпадають.";      
                $_SESSION['r_error'] = "Паролі не співпадають.";     
            }       
            if(strlen($login) < 8 || empty($login)){
                // $error['login'] = "Недостатньо символів. Введіть логін.";
                $_SESSION['r_error'] = "Недостатньо символів. Введіть логін.";
            }
            if(strlen($name) < 8 || empty($name)){
                // $error['name'] = "Недостатньо символів. Введіть Ім'я.";
                $_SESSION['r_error'] = "Недостатньо символів. Введіть Ім'я.";
            }
            if(strlen($pass) < 8 || empty($pass)){
                // $error['pass'] = "Недостатньо символів. Введіть пароль.";
                $_SESSION['r_error'] = "Недостатньо символів. Введіть пароль.";
            }
            // if(count($error)>0){
            //     include "../register.php";
            //         }
           
            else{
                try{ //перевірка на зайнятість логіну
                    $prep = $connection->prepare(
                        "SELECT COUNT(Id) FROM users u WHERE u.`login` = ?");
                        $prep->execute([$_POST['login']]);
                        $cnt = $prep->fetch(PDO::FETCH_NUM)[0];
                }
                catch (PDOException $ex){
                    $_SESSION['r_error'] = $ex->getMessage();
                }
                if($cnt > 0){
                    $_SESSION['r_error']  = "Логін вже зайнятий.";
                }
                //Перевірка аватарки, і якщо все ок, то записуємо в папку
                if(isset($_FILES['avatar'])){
                    if( $_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] != 0 ) {
                        $dot_position = strrpos( $_FILES['avatar']['name'], '.' ) ;  
                        if( $dot_position == -1 ) {  
                            $_SESSION['r_error']  = "File without type not supported" ;
                        }
                        else{
                            $extension = substr( $_FILES['avatar']['name'], $dot_position ) ; 
                            if( ! in_array( $extension, ['.jpg', '.png', '.jpeg', '.svg'] ) ) {
                                $_SESSION['r_error']  = "File extension '{$extension}' not supported" ;
                            }
                            else {
                                $avatar_path = '../avatars/' ;
                                do {
                                    $avatar_saved_name = bin2hex( random_bytes(8) ) . $extension ;
                                } while( file_exists( $avatar_path . $avatar_saved_name ) ) ;
                                if( ! move_uploaded_file( $_FILES['avatar']['tmp_name'], $avatar_path . $avatar_saved_name ) ) {
                                    $_SESSION['r_error']  = "File (avatar) uploading error" ;
                                }
                                
                            }
                        }
                    }
                }
            }
            
            if(empty($_SESSION['r_error'])){
                $salt = md5(random_bytes(16));
                $pass = md5('123'.$salt);
                //підключення до бд, та відправка данних.
                $mysql = new mysqli('localhost','admin','pass','flower_shop');
                // $mysql->query("INSERT INTO users (`login`,`name`,`password`,`confirm`,`email`,`avatar`)
                // VALUES( '$login','$name','$pass','$confirm ','$email','')");
                $mysql = "INSERT INTO users (`login`,`name`,`password`,`confirm`,`email`,`avatar`)
                 VALUES( '$login','$name','$pass','$confirm ','$email','')";
                try{
                    $prep = $connection->prepare( $mysql ) ;
                    $prep->execute( [ 
                        $_POST['login'], 
                        $_POST['name'], 
                        $_POST['email'],
                        isset( $avatar_saved_name ) ? $avatar_saved_name : null
                    ] ) ;
                    $_SESSION[ 'r_ok' ] = "Reg ok" ;
                }
                catch( PDOException $ex ) {
                    $_SESSION[ 'r_error' ] = $ex->getMessage() ;
                }  
               
            }  
            else {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = $_POST['name'];
                // print_r($_SESSION['r_error']);
            }

        // header("Location: ../register.php");
         include "../register.php";

        //   $mysql->close();
        //session_destroy();   
    }
?>
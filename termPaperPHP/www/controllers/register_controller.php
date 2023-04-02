<?php
//    filter_var - очищаем строку от ненужных символов html
//  trim - очищает строку от пробелов 
$mysql = new mysqli('localhost','admin','pass','flower_shop');

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
    $_SESSION['login'] = $login;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $error = [];    

    
    
    if(empty($email)){
        $error['email'] = "Введіть Email.";
    }   
    if($pass != $confirm){
        $error['confirm']= "Паролі не співпадають.";           
    }       
    if(strlen($login) < 8 || empty($login)){
        $error['login'] = "Недостатньо символів. Введіть логін.";
    }
    if(strlen($name) < 8 || empty($name)){
        $error['name'] = "Недостатньо символів. Введіть Ім'я.";
    }
    if(strlen($pass) < 8 || empty($pass)){
        $error['pass'] = "Недостатньо символів. Введіть пароль.";
    }
    if(count($error)>0){
        include "../register.php";
    }
   
   
    else{
      

        if(isset($_FILES['avatar'])){
            if( $_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] != 0 ) {
                $dot_position = strrpos( $_FILES['avatar']['name'], '.' ) ;  
                if( $dot_position == -1 ) {  
                    $error[ 'avatar' ] = "File without type not supported" ;
                }
                else{
                    $extension = substr( $_FILES['avatar']['name'], $dot_position ) ; 
                    if( ! in_array( $extension, ['.jpg', '.png', '.jpeg', '.svg'] ) ) {
                        $error[ 'avatar' ] = "File extension '{$extension}' not supported" ;
                    }
                    else {
                        $avatar_path = '../avatars/' ;
                        do {
                            $avatar_saved_name = bin2hex( random_bytes(8) ) . $extension ;
                        } while( file_exists( $avatar_path . $avatar_saved_name ) ) ;
                        if( ! move_uploaded_file( $_FILES['avatar']['tmp_name'], $avatar_path . $avatar_saved_name ) ) {
                            $error[ 'avatar' ] = "File (avatar) uploading error" ;
                        }
                        
                    }
                }
            }
        }
    }
    if(empty($error)){
        $salt = md5(random_bytes(16));
        $pass = md5('123'.$salt);
        
       
        $mysql->query("INSERT INTO users (`login`,`name`,`password`,`confirm`,`email`,`avatar`)
        VALUES( '$login','$name','$pass','$confirm ','$email','')");
        $mysql->close();
        header('Location: /index.php');

       session_destroy();

    }
 
   

   
    

?>
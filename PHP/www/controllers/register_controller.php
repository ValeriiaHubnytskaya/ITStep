<?php
session_start(); //сессия - перед обращением к сессии обязательно
switch( strtoupper($_SERVER['REQUEST_METHOD'])){
    case 'GET'  :
     
        $view_data = [];
        if(isset($_SESSION['reg_error'])){
            $view_data['reg_error'] = $_SESSION['reg_error'];
            unset($_SESSION['reg_error']);  
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
        //данные формы регистрации - обрабатываем
        if(empty($_POST['login'])){
            $_SESSION['reg_error'] = "Empty login";
        }
        else if(empty($_POST['name'])){
            $_SESSION['reg_error'] = "Empty USer NAme";
        }
        else if(empty($_POST['password'])){
            $_SESSION['reg_error'] = "Empty password";
        }
        else if(empty($_POST['email'])){
            $_SESSION['reg_error'] = "Empty email";
        }
        else if($_POST['password'] !== $_POST['confirm']){
            $_SESSION['reg_error'] = "Passwords mismatch";
        }
        else {
            try{
               $prep = $connection->prepare(
                "SELECT COUNT(Id) FROM Users u WHERE u.`login` = ?");
                $prep->execute([$_POST['login']]);
                $cnt = $prep->fetch(PDO::FETCH_NUM)[0];
            }
            catch (PDOException $ex){
                $_SESSION['reg_error'] = $ex->getMessage();
            }
            if($cnt > 0){
                $_SESSION['reg_error'] = "Login in use";
            }
        }
        if(empty($_SESSION['reg_error'])){
            //$_SESSION['reg_error'] = "ok";
            $salt = md5(random_bytes(16));
            $pass = md5($_POST['confirm'] . $salt);
            $confirm_code = bin2hex(random_bytes(3));
            $sql = "INSERT INTO Users(`id`, `login`, `name`, `salt`, `pass`, `email`, `confirm`)
             VALUES(UUID(),?,?,'$salt','$pass',?, )";
             try{
                $prep = $connection->prepare($sql);
                $prep->execute(
                    [$_POST['login'],$_POST['name'],$_POST['email']]);
                $_SESSION['reg_ok'] = "REG OK";
            }
            catch (PDOException $ex){
                $_SESSION['reg_error'] = $ex->getMessage();
            }

            
        }
        else {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $_POST['name'];

        }
        header("Location: /" .$path_parts[1]);
        // echo "<pre>"; print_r($_POST);
        break;

}
<?php
//Аутентификация
$_AUTH = false;
if (isset($_POST['userlogin'])
&& isset($_POST['userpassw'])){
    //находим данные в бд по логину
    $sql = "SELECT * FROM Users u WHERE u.`login` = '{$_POST['userlogin']}'";
    try{
           $res = $connection->query($sql);
           $row = $res->fetch(PDO::FETCH_ASSOC); 
            if($row){
                $salt = $row['salt'];
                $hash = md5($_POST['userpassw'] . $salt);
                if($hash == $row['pass']){
                    //авторизация успешна
                    $_AUTH = $row;
                }
                else { //пароль не правильный
                    $_AUTH = "ACCESS DENIED";
                }
            }
            else { //такого логина нет в БД
                $_AUTH = "ACCESS RESTRICTED";
            }
        }
        catch(PDOException $ex) {
            echo $ex->getMessage();
               exit; 
        }
     
}
// $salt = md5( random_bytes(16) ) ;
// $pass = md5( '123' . $salt ) ;
// $sql = "INSERT INTO Users VALUES( UUID(), 'admin', 'Root Administrator',
// '$salt', '$pass', 'admin@i.ua', '123456', CURRENT_TIMESTAMP )" ;
// try{
//     $connection->query($sql);
//     echo "INSERT OK";       

// }
// catch(PDOException $ex) {
//     echo $ex->getMessage();
// }
// exit;
/*
CREATE TABLE Users (
    
    'id'      CHAR(36)   NOT NULL   PRIMARY KEY COMMENT'UUID',
    'login' VARCHAR(64) NOT NULL,
    'name' VARCHAR(64) NULL,
    'salt'  CHAR(32) NOT NULL COMMENT 'random 128 bit hex-string',
    'pass' CHAR(32) NOT NULL COMMENT 'password hash',
    'email' VARCHAR(64) NOT NULL,
    'confirm' CHAR(6) COMMENT 'email confirm code',
    'reg_dt' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB, DEFAULT CHARSET = UTF8

    INSERT INTO Users VALUE( UUID(), 'admin', 'Root Administrator',)
    CHAR(N) СТРОКА ФИКСИРОВАННОЙ ДЛИНЫ (РОВНО) . Если передается
    меньше, то дополняется . Хранится ровно н символов
    VARCHAR (N) СТРОКА ПЕРЕМЕННОЙ ДЛИНЫ (ОТ 0 ДО Н симвлов). Хранится столько, сколько 
    передано + один символ , отвечающий за реальную длину.
*/
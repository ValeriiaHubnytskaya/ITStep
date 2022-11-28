<?php 
$path = explode( '?', $_SERVER[ 'REQUEST_URI' ] )[0] ;     // адрес запроса - начало маршрутизации
/* Создание диспетчера доступа приводит к тому, что запросы к файлам,
   которые раньше автоматически "отдавал" Apache, теперь приходят
   к нам 
*/
$local_path = '.' . $path ;
if( is_file( $local_path ) ) {   // запрос - существующий файл
    if(flush_file( $local_path ))      // наша функция отправки файла (см. ниже)
    exit ;                           // останавливаем дальнейшую работу
}

// echo "<pre>" ; print_r( $_SERVER ) ;

$path_parts = explode( '/', $path ) ;    // ~split - разбивает строку по разделителю
// echo "<pre>" ; print_r( $path_parts ) ;  // массив частей пути, [0] всегда пустой

// ~MiddleWare
include "dbms.php";
if(empty($connection)){
    echo"DB error";
    exit;
}
include "auth.php";

// ~View

include "_layout.php" ;
// include "registration.php";

function flush_file( $filename ) {
    ob_clean() ;                    // очищаем буферизацию
    $pos = strrpos($filename ,'.');            //последняя позиция точки      
    $ext = substr($filename, $pos + 1) ;     //расширение - часть строки от точки
   
    switch($ext){
        case 'css' :
        case 'html' :
             $content_type = "text/css";
              break; 
        case 'png' :
        case 'jpg' :
        case 'gif' :
            $content_type = "image/png";
            break;
        default:
            return false;    
    }   
    header("Content-Type: $content_type");
    readfile( $filename) ;        // копируем файл в ответ сервера
    return true;
}

// суперглобальные массивы - массивы, доступные из любой "точки" РНР
// (в ф-циях не нужно дописывать global)
// $_SERVER - основные данные от сервера
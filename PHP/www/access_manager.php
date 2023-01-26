<?php 
$_LOGGER_FILE = "logs/pv011_log.txt" ;
$_CONTEXT = []; //наши глобальные данные - контекст запроса
$path = explode( '?', urldecode($_SERVER[ 'REQUEST_URI' ] ))[0] ;     // адрес запроса - начало маршрутизации
$_CONTEXT['path'] = $path;
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
$_CONTEXT['path_parts'] = $path_parts;
$_CONTEXT['loger'] = make_logger();

// ~MiddleWare
include "dbms.php";
if(empty($connection)){
   header("Location: page500.html");
    exit;
}
$_CONTEXT['connection'] = $connection;

include "auth.php";

//~Controllers
$controller_file = "controllers/" .$path_parts[1]. "_controller.php";
if(is_file($controller_file)){
    include $controller_file;
}
else {
    //~View
    include "_layout.php";
}




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

//возвращает параметизированную функцию
function make_logger() {
    return function( $msg, $code = 500 ) {
        global $_LOGGER_FILE ;
        $f = fopen( $_LOGGER_FILE, "at" ) ;
        fwrite( $f, date( 'Y-m-d H:i:s ' ) . $code . ' ' . $msg . "\n" ) ;
        fclose( $f ) ;
    } ;
   
}

// суперглобальные массивы - массивы, доступные из любой "точки" РНР
// (в ф-циях не нужно дописывать global)
// $_SERVER - основные данные от сервера
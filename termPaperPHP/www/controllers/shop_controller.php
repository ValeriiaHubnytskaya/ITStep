<?php
    @session_start();
 // echo($_SERVER[ 'REQUEST_METHOD' ]);  exit;
if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if( $_POST[ 'form-name' ]  == 'product' ) {
        
        if( isset( $_FILES[ 'image' ] ) ) {
                if( $_FILES[ 'image' ][ 'error' ] == 0    // файл есть и загружен
                && $_FILES[ 'image' ][ 'size' ] > 0 ) {  // без ошибок
                // проверяем расширение файла на допустимые,
                // заменяем имя и переносим в папку загрузок "images"
                    $dot_position = strrpos( $_FILES['image']['name'], '.' ) ;  // strRpos ~ lastIndexOf
                    if( $dot_position == -1 ) {  // нет расширения у файла
                        $_SESSION[ 'add_error' ] = "File without type not supported" ;
                    }
                    else {
                        $extension = substr( $_FILES[ 'image' ][ 'name' ], $dot_position ) ;  // расширение файла (с точкой ".png")
                        if( ! array_search( $extension, [ '.jpg', '.png', '.jpeg', '.svg' ] ) ) {
                            $_SESSION[ 'add_error' ] = "File extension '{$extension}' not supported" ;
                        }
                        else {
                            $add_path = 'images/' ;
                            do {
                                $add_saved_name = bin2hex( random_bytes(8) ) . $extension ;
                            } while( file_exists( $add_path . $add_saved_name ) ) ;
                            if( ! move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $add_path . $add_saved_name ) ) {
                                $_SESSION[ 'add_error' ] = "File (image) uploading error" ;
                            }
                        }
                    }
                }
                else {   // файл не передан, или загружен с ошибкой
                    $_SESSION[ 'add_error' ] = "файл не передан, или загружен с ошибкой" ;
                }
            }
            else {   // на форме вообще нет файлового поля image
                $_SESSION[ 'add_error' ] = "на форме вообще нет файлового поля image" ;
            }
            // endregion

            // прием других данных формы
            if( empty( $_SESSION[ 'add_error' ] ) ) {            
            //var_dump($_POST); exit;
            
                if( empty( $_POST[ 'name' ] ) ) {
                    $_SESSION[ 'add_error' ] = "Введіть назву товару" ;
                }
                else if( empty( $_POST[ 'price' ] ) ) {
                    $_SESSION[ 'add_error' ] = "Введіть ціну товару" ;
                }
                $sql = "INSERT INTO womanflower( `id`, `name`,`descr`,  
                    `price`,`discount`,`image` ) VALUES( UUID(), ?, ?, ?, ?, ? ) " ;
                $params = [
                    $_POST[ 'name' ],
                    $_POST[ 'descr' ] ?? null,
                    $_POST[ 'price' ],
                    $_POST[ 'discount' ] ?? null,
                    $add_saved_name
                ] ;
                try {
                    $prep = $_CONTEXT[ 'connection' ]->prepare( $sql ) ;
                    $prep->execute( $params ) ;
                }
                catch( PDOException $ex ) {
                    $_CONTEXT['logger']( 'shop_controller ' . $ex->getMessage() . $sql . var_export( $params, true ) ) ;
                    $_SESSION[ 'add_error' ] = "Server error try later" ;
                }
            }
            if( empty( $_SESSION[ 'add_error' ] ) ) {
                $_SESSION[ 'add_ok' ] = "Додано успішно)" ;
            }

            header( "Location: /shop/index" ) ;
            exit ;
    }
    else if( isset($_POST[ 'product-del' ]) && $_POST[ 'product-del' ]  == 'del' ) {  
        unset($_SESSION['basket']);
        header( "Location: /shop/basket" ) ;
    }
    else if($_POST['form-name'] == "auth"){
        header("Location: /shop/_auth");
    }
    // else if($_POST['form-name'] == "register"){
    //     header("Location: /shop/register");
    // }
    
}

if( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
    
    $view_data = [] ;
    if(isset($_SESSION['auth_log'])||isset($_SESSION['auth_pass'])){
        @$view_data['auth_log'] = $_SESSION['auth_log'];
        @$view_data['auth_pass'] = $_SESSION['auth_pass'];
        unset($_SESSION['auth_log']);
        unset($_SESSION['auth_pass']);
        @$view_data['userlogin'] = $_SESSION['userlogin'];
        @$view_data['userpassw'] = $_SESSION['userpassw'];
    }

    if(isset($_SESSION['reg_log'])||isset($_SESSION['reg_name'])|| isset($_SESSION['reg_pass']) || isset($_SESSION['reg_conf'])|| isset($_SESSION['reg_email'])){
        @$view_data['reg_log'] = $_SESSION['reg_log'];
        @$view_data['reg_name'] = $_SESSION['reg_name'];
        @$view_data['reg_pass'] = $_SESSION['reg_pass'];
        @$view_data['reg_conf'] = $_SESSION['reg_conf'];
        @$view_data['reg_email'] = $_SESSION['reg_email'];
        unset($_SESSION['reg_log']);  
        unset($_SESSION['reg_name']);  
        unset($_SESSION['reg_pass']);  
        unset($_SESSION['reg_conf']);  
        unset($_SESSION['reg_email']);  
        @$view_data['login'] = $_SESSION['login'];
        @$view_data['email'] = $_SESSION['email'];
        @$view_data['name'] = $_SESSION['name'];
       
    }

    if(isset($_SESSION['reg_ok'])){
        $view_data['reg_ok'] = $_SESSION['reg_ok'];
        unset($_SESSION['reg_ok']);        
    }    

    if( isset( $_SESSION[ 'add_ok' ] ) ) {
        $view_data[ 'add_ok' ] = $_SESSION[ 'add_ok' ] ;
    }

    if( isset( $_SESSION[ 'add_error' ] ) ) 
    {
        //echo($_SESSION[ 'add_error' ]);
        $view_data[ 'add_error' ] = $_SESSION[ 'add_error' ] ;
        unset( $_SESSION[ 'add_error' ] ) ;
        // при ошибке сохраняются введенные данные - восстанавливаем
        $view_data['name']    = $_SESSION[ 'name' ] ;
        $view_data['descr']    = $_SESSION[ 'descr' ] ;
        $view_data['price'] = $_SESSION[ 'price' ] ;
        $view_data['discount'] = $_SESSION[ 'discount' ] ;
       
    }
    //перечень товаров
    if(@$_GET['sort']){
        
         $view_data['sort'] = $_GET['sort'];
        switch($view_data['sort']){
        
            case 2:
                $sql = "SELECT * FROM womanflower p ORDER BY p.price ASC ";
                try{
                    $view_data['products'] = $_CONTEXT['connection']->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                }
                catch( PDOException $ex ) {
                    $_CONTEXT['logger']( 'shop_controller ' . $ex->getMessage() . $sql  ) ;
                    $view_data[ 'add_error' ] = "Server error try later" ;
                }              
            include "_layout.php" ;
            break;
            case 3: 
                $sql = "SELECT * FROM womanflower p ORDER BY p.rating DESC ";
                try{
                    $view_data['products'] = $_CONTEXT['connection']->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                }
                catch( PDOException $ex ) {
                    $_CONTEXT['logger']( 'shop_controller ' . $ex->getMessage() . $sql  ) ;
                    $view_data[ 'add_error' ] = "Server error try later" ;
                }              
            include "_layout.php" ;
            break;
            default:
            $sql = "SELECT * FROM womanflower p ORDER BY p.add_dt ASC ";
            try{
                $view_data['products'] = $_CONTEXT['connection']->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            }
            catch( PDOException $ex ) {
                $_CONTEXT['logger']( 'shop_controller ' . $ex->getMessage() . $sql  ) ;
                $view_data[ 'add_error' ] = "Server error try later" ;
            }              
          
        }
    }
     
        else{
        $sql = "SELECT * FROM womanflower p ORDER BY p.add_dt DESC ";
        try{
            $view_data['products'] = $_CONTEXT['connection']->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch( PDOException $ex ) {
            $_CONTEXT['logger']( 'shop_controller ' . $ex->getMessage() . $sql  ) ;
            $view_data[ 'add_error' ] = "Server error try later" ;
        }              
       
    }
    include "_layout.php" ;
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post" class="cl_basket">
        <div class="zakaz_data">
            <label>Прізвище <br/>
                <input type="text">
            </label>
            <br/>
            <label>Ім'я <br/>
                <input type="text">
            </label>
            <br/>
            <label>По-батькові <br/>
                <input type="text">
            </label>
            <br/>
            <label>Номер телефону <br/>
                <input type="tel">
            </label>
            <br/>
            <label>Спосіб оплати<br/>
                <input type="checkbox" value="Оплата зараз" name = "value1"> Оплата зараз</input>
                <input type="checkbox" value="Оплата при отриманні" name = "value2"> Оплата при отриманні </input>
            </label>
            <br/>
            <label>Спосіб доставки<br/>
                <input type="checkbox" value="Нова Пошта" name = "np"> Нова Пошта</input>
                <input type="checkbox" value="Самовивіз" name = "sam"> Самовивіз</input>
            </label>
            <br/>
            <label>Залишити коментар<br/>
            <textarea rows="10" cols="45"></textarea>
            </label>
            <br/>
        </div>
        <div class="prod_data">
            <?php
                if( ! empty( $_REQUEST['product-id'] ) ) {                    
                    if( empty( $_SESSION['basket'] ) ) {
                        $_SESSION['basket'] = [ [ 
                            'id' => $_REQUEST['product-id'], 
                            'image' => $_REQUEST['product-image'], 
                            'name' => $_REQUEST['product-name'], 
                            'price' => $_REQUEST['product-price'],
                            'descr' => $_REQUEST['product-descr'] ] ] ;
                        }
                    else{
                    $_SESSION['basket'][] = [ 
                        'id' => $_REQUEST['product-id'], 
                        'image' => $_REQUEST['product-image'], 
                        'name' => $_REQUEST['product-name'], 
                        'price' => $_REQUEST['product-price'],
                        'descr' => $_REQUEST['product-descr'] ] ;
                    }
                }              
            ?>   
           <?php if(empty($_SESSION['basket'])):?>
            <div class="cont-basket">
                У кошику немає товару.
            </div>   
            <?php endif; ?>    
          <?php if(isset($_SESSION['basket'])) :?>
                <?php foreach ($_SESSION['basket'] as $product) :?>                            
                    <ul>
                        <li>                         
                            <img src="/images/<?= $product['image'] ?>" class="im-basket" /> 
                            <div class="cont-basket">                           
                                <b> <?= $product['name'] ?> </b>
                                <b> <?= $product['price'] ?> грн.</b>                            
                                </br>
                                <?= $product['descr'] ?>
                                </br>                            
                                <button class="del" value="del" name="product-del">Видалити</button>
                            </div>                                   
                        </li>
                    </ul>                       
                <?php endforeach; ?>   
                
            

                <p>Кількість товарів: <?= $count = count($_SESSION['basket'])?> шт.</p>     
                <?php if($count == '1') : ?>
                    <p>До сплати:
                    <?= $_SESSION['basket'][0]['price'] +  @$_SESSION['basket'][1]['price'] ?>
                    грн. </p>
                <?php endif ?>    
                <?php if ($count == '2') : ?>
                    <p>До сплати:
                    <?= $_SESSION['basket'][0]['price'] +  @$_SESSION['basket'][1]['price'] + @$_SESSION['basket'][2]['price'] ?>
                    грн. </p>
                <?php endif ?> 
                <?php if($count == '3') : ?>
                    <p>До сплати:
                    <?= $_SESSION['basket'][0]['price'] +  @$_SESSION['basket'][1]['price'] + @$_SESSION['basket'][2]['price'] + @$_SESSION['basket'][3]['price'] ?>
                    грн. </p>
                <?php endif ?> 
                <?php if($count == '4') : ?>
                    <p>До сплати:
                    <?= $_SESSION['basket'][0]['price'] +  @$_SESSION['basket'][1]['price'] + @$_SESSION['basket'][2]['price'] + @$_SESSION['basket'][3]['price'] + @$_SESSION['basket'][4]['price'] ?>
                    грн. </p>
                <?php endif ?>   
                <button class="order">Замовити</button>
            <?php endif; ?>         
        </div>
    </form>
   
</body>
</html>
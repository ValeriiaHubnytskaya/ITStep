
<?php if(isset($view_data['add_error'] )): ?>
    <div class ="reg-error"><?=  $view_data['add_error'] ?></div>
    <?php endif ?>


    <form action="">
    <select name="sort">
    <option value=1 <?= @$view_data[ 'sort' ] == 1 ? 'selected' : '' ?>>Новинка</option>
        <option value=2 <?= @$view_data[ 'sort' ] == 2 ? 'selected' : '' ?>>Ціна</option>
        <option value=3 <?= @$view_data[ 'sort' ] == 3 ? 'selected' : '' ?>>Рейтинг</option>
    </select>
    <button>Застосувати</button>
</form>


<?php foreach(@$view_data['products'] as $product) : ?>
    <div class="product" data-id="<?=$product['id']?>">
        <div class="img-container">
            <img src="/images/<?= $product['image'] ?>" />
        </div>
        <h4> <?= $product['name']?> </h4>
        <h5> <?= $product['descr']?> </h5>
        
        <b><?= $product['price']?></b> 
         <?php if(!empty($product['discount'])) : ?>
            (<i><?= $product['discount']?></i>)
            <?php endif ?>  
            <div class="rating-area">
                <span>(<?= $product['rating'] ?>)</span>
                <input type="radio" id="star-5<?=$product['id']?>" name="rating<?=$product['id']?>" value="5" <?= ($product['rating'] > 4) ? 'checked' : '' ?> />
                <label for="star-5<?=$product['id']?>" title="Grade «5»"></label>
                <input type="radio" id="star-4<?=$product['id']?>" name="rating<?=$product['id']?>" value="4" <?= ($product['rating'] > 3 && $product['rating'] <= 4) ? 'checked' : '' ?> />
                <label for="star-4<?=$product['id']?>" title="Grade «4»"></label>
                <input type="radio" id="star-3<?=$product['id']?>" name="rating<?=$product['id']?>" value="3" <?= ($product['rating'] > 2 && $product['rating'] <= 3) ? 'checked' : '' ?> />
                <label for="star-3<?=$product['id']?>" title="Grade «3»"></label>
                <input type="radio" id="star-2<?=$product['id']?>" name="rating<?=$product['id']?>" value="2" <?= ($product['rating'] > 1 && $product['rating'] <= 2) ? 'checked' : '' ?> />
                <label for="star-2<?=$product['id']?>" title="Grade «2»"></label>
                <input type="radio" id="star-1<?=$product['id']?>" name="rating<?=$product['id']?>" value="1" <?= ($product['rating'] <= 1) ? 'checked' : '' ?> />
                <label for="star-1<?=$product['id']?>" title="Grade «1»"></label>
            </div>  
            <u>Since <?= date( "d.m.y", strtotime( $product['add_dt'] ) ) ?></u> 
            <form action="/shop/basket" >
                <input type="hidden" value="<?=$product['id']?>" name="product-id" />
                <input type="hidden" value="<?=$product['image']?>" name="product-image" />
                <input type="hidden" value="<?=$product['name']?>" name="product-name" />
                <input type="hidden" value="<?=$product['price']?>" name="product-price" />
                <input type="hidden" value="<?=$product['descr']?>" name="product-descr" />
                <button class="order">Замовити</button>
            </form>
           
    </div>
<?php endforeach ?>



<form action="/shop_men" method="post" enctype="multipart/form-data" >
    <input type="text"   name="name"     placeholder="Назва" value='<?= (isset($view_data['name'])) ? $view_data['name'] : "" ?>'/><br/>
    <textarea            name="descr"    placeholder="Опис" ></textarea><br/>
    <input type="number" name="price"    placeholder="Ціна" /><br/>
    <input type="number" name="discount" placeholder="Знижка" /><br/>
    <input type="file"   name="image"  /><br/>
    <button>Додати</button>
</form>


   
<h2>Магазин</h2>
<pre><?php print_r($view_data['products']); ?>

<?php foreach($view_data['products'] as $product) : ?>

    
<?php endforeach ?>

<form method="post" enctype="multipart/form-data" >
    <input type="text"   name="name"     placeholder="Название" /><br/>
    <textarea            name="descr"    placeholder="Описание" ></textarea><br/>
    <input type="number" name="price"    placeholder="Цена" /><br/>
    <input type="number" name="discount" placeholder="Скидка" /><br/>
    <input type="file"   name="image"  /><br/>
    <button>Добавить</button>
</form>
<?=$view_data['add_error'] ?? '' ?>
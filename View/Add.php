<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/header.php'); ?>

<div id="main">
    <div id="add" class="clearfix">
        <h1>Добавьте продукт в базу данных</h1>
        <div class="main">
            <form id="addForm">
                <div class="field">
                    <label for="type">Тип продукта</label>
                    <select id="type" name="type">
                        <option value=""></option>
                        <?php foreach($arr as $value): ?>
                        <option><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="category">Категория</label>
                    <select id="category" name="category">
                        <option value=""></option>
                        <?php foreach($arrCat as $valueCat): ?>
                        <option><?php echo $valueCat; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="name">Наименование продукта</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="field">
                    <textarea id="description" name="description" rows="10" placeholder="Введите описание товара"></textarea>
                </div>
                <div class="field">
                    <input id="file" type="file" name="photo" multiple accept="image/*,image/jpeg">
                </div>
                <div class="field">
                    <button id="submit" name="submit">Добавить</button>
                </div>
               </form>
            </div>
            
        </div>
         <div id="res"></div>
    </div>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/footer.php'); ?>

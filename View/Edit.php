<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/header.php'); ?>
<div id="main">

    <div id="edit">
        <table id="tableEdit">
            <tr>
                <th>id</th>
                <th>Тип</th>
                <th>Категория</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Фото</th>
                <th>Ред./Удалить</th>
            </tr>
            <?php foreach($prod as $key=>$value): ?>
            <tr>
                <td>
                    <div class="valEditId"><?php echo $value['id'] ?></div>
                </td>
                <td>
                    <div id="<?php echo $value['id']; ?>type"><?php echo $value['type']; ?></div>
                    <select id="<?php echo $value['id']; ?>stype" class="editType">
                        <option>Выберите тип товара</option>
                        <?php foreach($arr as $t): ?>
                        <option><?php echo $t; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <div id="<?php echo $value['id']; ?>cat"><?php echo $value['category']; ?></div>
                    <select id="<?php echo $value['id']; ?>scat" class="editCategory">
                         <option>Выберите категорию</option>
                        <?php foreach($arrCat as $cat): ?>
                        <option><?php echo $cat; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input id="<?php echo $value['id']; ?>n" class="nameEdit" value="<?php echo $value['name'] ?>" type="text">
                </td>
                <td>
                    <input id="<?php echo $value['id']; ?>des" class="desEdit" value="<?php echo $value['description'] ?>" type="text">
                </td>
                <td>
                        <br /><a href="<?php echo $value['image'] ?>" target="_blank">Просмотреть</a></td>
                <td><span class="butEdit" id="<?php echo $value['id'] ?>ed">Ред.</span>&nbsp;&nbsp;<span class="remEdit" id="<?php echo $value['id'] ?>rem">Удалить</span></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/footer.php'); ?>
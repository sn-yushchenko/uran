<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/header.php'); ?>
<div id="main">
<div id="view">
    <table>
        <tr>
            <th>Тип</th>
            <th>Категория</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Фото</th>
        </tr>
        <?php foreach($prod as $key=>$value): ?>
        <tr>
            <td><?php echo $value['type']; ?></td>
            <td><?php echo $value['category']; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['description']; ?></td>
            <td><a class="showImage" href="<?php echo $value['image']; ?>">Просмотреть</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/uran/Layout/footer.php'); ?>
<?php include_once "menu.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>

<body>
    <div>
        <h2>Новости категории <?= $category ?></h2>
    </div>

    <?php foreach ($news as $item) : ?>
        <div style="border: 1px solid green">
            <h3><?= $item['category_id'] ?></h3>
            <h2><?= $item['title'] ?></h2>
            <p><?= $item['description'] ?></p>
            <div><strong><?= $item['author'] ?> (<?= $item['created_at'] ?>)</strong>
                <a href="<?= route('newsId', ['id' => $item['id']]) ?>">Подробнее...</a>
            </div>

        </div>
    <?php endforeach; ?>
</body>

</html>
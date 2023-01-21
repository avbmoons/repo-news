<?php include_once "menu.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News item</title>
</head>

<body>
    <div>
        <h2>News item <?= $news['id'] ?></h2>

        <div style="border: 1px solid green">
            <h3><?= $news['category_id'] ?></h3>
            <h2><?= $news['title'] ?></h2>
            <p><?= $news['description'] ?></p>
            <div><strong><?= $news['author'] ?> (<?= $news['created_at'] ?>)</strong>
                <a href="<?= route('news') ?>">Назад к списку</a>
            </div>

        </div>
    </div>
</body>

</html>
<?php include_once "menu.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Categories</title>
</head>

<body>
    <div>
        <h2>Категории новостей</h2>
    </div>

    <?php foreach ($categories as $category) : ?>
        <div style="border: 1px solid green">
            <h3><?= $category['id'] ?></h3>
            <a href="<?= route('category.show', $category['slug']) ?>">
                <h2><?= $category['title'] ?></h2>
            </a>
            <p><?= $category['slug'] ?></p>

        </div>
    <?php endforeach; ?>
</body>

</html>
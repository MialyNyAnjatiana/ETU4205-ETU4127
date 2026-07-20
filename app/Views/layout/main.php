<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mobile Money' ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <main>
        <?= $content ?>
    </main>

    <?= $this->include('layouts/footer') ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?= $this->web_description; ?>">
        <meta name="keywords" content="<?= $this->web_keywords; ?>">
        <meta name="author" content="<?= $this->web_author; ?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <!-- Favicon -->
        <link rel="icon" href="icon.png" type="image/png">
        <title><?= $this->web_title; ?></title>
        <base href="<?= $basePath; ?>">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/custom.css">
        <!-- Script -->
        <script src="js/custom.js"></script>
    </head>
    <?php require_once $viewPath; ?>
</html>

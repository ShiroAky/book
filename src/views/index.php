<?php use Shiro\Book\Controllers\UTILS_CONTROLLER; ?>
<?php use Shiro\Book\Controllers\URL_CONTROLLER; ?>
<?php $item = UTILS_CONTROLLER::get_db_content(); ?>
<?php $item = json_decode($item, true); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php URL_CONTROLLER::include_css('normalize'); ?>
    <?php URL_CONTROLLER::include_css('styles'); ?>
    <link rel="shortcut icon" href="https://images6.alphacoders.com/500/thumbbig-500777.webp" type="image/webp">
</head>

<body>

    <!-- Navbar -->
    <?php URL_CONTROLLER::module('nav'); ?>

    <main class="auto-grid">

        <?php foreach ($item as $key => $_book) { ?>

            <a href="./detalles/<?php echo $_book['token']; ?>" class="item">

                <div class="content_info">
                    <img src="<?php echo $_book['cover']; ?>" alt="<?php echo $_book['name']; ?>">
                    <h3><?php echo $_book['name']; ?></h3>
                </div>

            </a>

        <?php } ?>

    </main>

</body>

</html>
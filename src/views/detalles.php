<?php use Shiro\Book\Config\Config; ?>
<?php use Shiro\Book\Controllers\URL_CONTROLLER; ?>
<?php use Shiro\Book\App\Render; ?>
<?php $_book = Config::appConfig()['BOOK']; ?>

<?php $item = file_get_contents('./src/database/database.json', true); ?>
<?php $item = json_decode($item, true); ?>
<?php $id = array_search($_book, $item); ?>

<?php if ($id !== false) { ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_book['name']; ?></title>
    <?php URL_CONTROLLER::include_css('normalize'); ?>
    <?php URL_CONTROLLER::include_css('styles'); ?>
    <link rel="shortcut icon" href="<?php echo $item[$id]['cover']; ?>" type="image/webp">
</head>
<body>

    <!-- Navbar -->
    <?php URL_CONTROLLER::module('nav'); ?>

    <header class="header">

        <div class="header__cover">
            <img src="<?php echo $item[$id]['cover']; ?>" alt="<?php echo $_book['name']; ?>">
        </div>

        <div class="header__info">
            <h1 class="header__title"><?php echo $_book['name']; ?></h1>
            <p class="header__author"><b>Autor:</b> <?php echo $_book['author']; ?></p>
            <p class="header__description"><b>Descripción:</b> <?php echo $_book['description']; ?></p>
        </div>

    </header>

    <!-- Capitulos -->
    <div class="capitulos">

        <h2 class="capitulos__title">Capítulos:</h2>

        <!-- Capitulos -->
        <div class="chaper_list">

            <?php foreach ($item[$id]['capitulos'] as $chapter): ?>

                <a href="<?php echo URL_CONTROLLER::get_url() . $chapter['id']; ?>">
                    <div class="capitulos__item">
                        <div class="cover">
                            <img src="<?php echo $chapter['cover']; ?>" alt="<?php echo $chapter['name']; ?>">
                        </div>
                        <div class="chaper">
                            <h3 class="capitulos__item-title"><?php echo $chapter['name']; ?></h3>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</body>
</html>

<?php } else { Render::error(404); } ?>
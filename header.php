<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php wp_head(); ?>
</head>
<body>
<nav id="menu-main">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'main-menu',
        )
    ); ?>
</nav>



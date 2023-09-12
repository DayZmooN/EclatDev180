<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <title>ÉclatDev180</title>

    <?php
    wp_enqueue_style('style', get_stylesheet_uri());



    wp_head();
    ?>
</head>

<body>

    <header>
        <div class="header-row-limit-size">
            <a href="<?php echo home_url(); ?>">
                <h1 class="logo">ÉclatDev<span>180</span></h1>
            </a>
            <div class="nav-burger">
                <div class="menu-burger">
                    <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/burger.svg" alt="">
                </div>
                <nav id="nav" class="navbar horizontal-menu dropdown">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main_menu'
                    )) ?>
                    <!-- <ul>
                        <li class="item-home"><a href="./home.html">HOME</a></li>

                        <li class="category">
                            <a>categories</a>
                            <div class="container-category">
                                <a href="./category.html">Informatique</a>
                                <a href="">Developpeur web</a>
                                <a href="">Fornt-end</a>
                                <a href="">Back-end</a>
                                <a href="">outils</a>
                                <a href="">Astuces du Chef</a>
                            </div>
                        </li>
                        <li class="item-actualités"><a href="./actualités.html">Actualités</a></li>
                    </ul> -->


                </nav>
            </div>
        </div>



    </header>
    <main>
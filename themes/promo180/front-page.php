<?php get_header();
?>
<!--hero-->
<section class="hero-home">
    <div class="title-hero-picture">
        <div class="h1-title">
            <h1 class="title-h1">
                Bienvenue chez ÉclatDev180 découvrez nos talents, suivez nos actualités !
            </h1>
            <span class="title-span">OnlineFormaPro</span>
        </div>
        <div class="picture">
            <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/hero.svg" alt="hero">
        </div>
    </div>
</section>
<!-- student -->
<section class="student">
    <div class="container-card-student" id="pinContainer">
        <h2 class="h2-student">Nos stagiaires</h2>
        <?php
        $args = array(
            'post_type' => 'stagiaire',
            'posts_per_page' => -1,
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                $name = get_field('name');
                $profession = get_field('profession');
                $location = get_field('location');
                $date = get_field('date');



        ?>

                <div class="card">
                    <a class="card-link" href="<?php the_permalink(); ?>">
                        <div class="picture-profil-student">

                            <img class="image-student" src="<?php the_post_thumbnail_url('large'); ?>" alt="student image">
                            <div class="profil-student">
                                <div class="name-profesionel">
                                    <span><?php echo $name; ?></span>
                                    <span><?php echo $profession; ?></span>
                                </div>
                                <div class="student-address-date">
                                    <div class="picture-ecrivain">
                                        <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/ecrivain.svg" alt="picture ecrivain">
                                    </div>
                                    <div class="address-date">
                                        <div class="location-picto">
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/location.svg" alt="icon location">
                                            <div class="location-date">
                                                <span><?php echo ($location); ?></span>
                                                <span><?php echo ($date); ?></span>
                                            </div>
                                        </div>
                                        <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/arrow.svg" alt="arrow picto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-phrase-accroche">
                            <h5 class="phrase-student"><?php the_excerpt(); ?></h5>
                        </div>
                    </a>
                </div>

                <!-- Fin du lien -->
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo "<p>Pas d'articles à afficher pour le moment.</p>";
        endif;
        ?>
    </div>
</section>

<!-- Section actuality -->
<section class="actuality">
    <h2 class="h2-student">Nos actualités</h2>
    <div class="container-card-student">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $post_query = new WP_Query($args);

        if ($post_query->have_posts()) {
            while ($post_query->have_posts()) : $post_query->the_post();
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_array = wp_get_attachment_image_src($thumbnail_id, 'full');
                $thumbnail_url = $thumbnail_array ? $thumbnail_array[0] : '';
                $menbre = get_field('menbre');
                $menbre2 = get_field('menbre2');
                $menbre3 = get_field('menbre3');

        ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="card-actuality">
                        <div class="picture-teamworker">
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                            <div class="teamworker">
                                <div class="title-name">
                                    <span class="span-teamworker">Team worker</span>
                                    <span>Lead Dev: <?php echo ($menbre); ?></span>
                                    <span>Front-end: <?php echo ($menbre2); ?></span>
                                    <span>Back-end: <?php echo ($menbre3); ?></span>

                                </div>
                                <div class="picture">
                                    <?php
                                    $featured_image_id = get_post_thumbnail_id();
                                    $images = get_attached_media('image');

                                    foreach ($images as $image) {
                                        if ($image->ID !== $featured_image_id) {
                                            $image_url = wp_get_attachment_image_src($image->ID, 'thumbnail');
                                            $image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
                                    ?>
                                            <div class="name-img">
                                                <div class="img-actuality-dev">
                                                    <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                                </div>
                                                <!-- <span>Karim</span> -->
                                            </div>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                        <div class="container-text-project">
                            <h1>Project <?php the_title() ?></h1>
                            <div class="paragraphe-name-date-arrow">
                                <p class="pargraphe-actuality">“<?php the_excerpt(); ?>”</p>
                                <div class="name-date-arrow">
                                    <div class="name-date">
                                        <span><?php the_author(); ?></span>
                                        <span><?php the_date('d/m/y'); ?></span>
                                    </div>
                                    <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/arrow.svg" alt="arrow picto">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
        <?php
            endwhile;
        } else {
            echo "<p>pas d'article</p>";
        }
        ?>

    </div>

</section>
<?php get_footer();
?>
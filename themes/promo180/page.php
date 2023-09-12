<?php get_header();
?>


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
                $names = get_field('names');
                $portrait = get_field('portrait');
        ?>
                <!-- Début du lien -->

                <div class="card">
                    <a class="card-link" href="<?php the_permalink(); ?>">
                        <div class="picture-profil-student">

                            <img class="image-student" src="<?php the_post_thumbnail_url('full'); ?>" alt="student image">
                            <div class="profil-student">
                                <div class="name-profesionel">
                                    <!-- Modification : nom dynamique -->
                                    <span><?php echo $names; ?></span>
                                    <span>Développeur web</span>
                                </div>
                                <div class="student-address-date">
                                    <div class="picture-ecrivain">
                                        <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/ecrivain.svg" alt="picture ecrivain">
                                    </div>
                                    <div class="address-date">
                                        <div class="location-picto">
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/location.svg" alt="icon location">
                                            <div class="location-date">
                                                <span>Sault-brenaz</span>
                                                <span>21 décembre 2022</span>
                                            </div>
                                        </div>
                                        <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/arrow.svg" alt="arrow picto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-phrase-accroche">
                            <h5 class="phrase-student">Découvrez l'éclat des talents de notre promotion Développeur Web et Web</h5>
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


<?php get_footer();
?>
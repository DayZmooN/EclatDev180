<?php get_header();
?>


<section class="section_student">
    <div class="container-student">
        <div class="card-profil">
            <?php
            $portfolio_url = get_field('portfolio');

            $profession = get_field('profession');
            $location = get_field('location');
            $linkedin_url = get_field('linkedin');
            $github_url = get_field('github');
            // $language = get_field('language-point-positif');
            $languages = get_field('language-point-positif', get_the_ID());
            $languageMoyen = get_field('language-point-moyen', get_the_ID());
            // var_dump(get_field('language-point-positif', get_the_ID()));

            $date = get_field('date');
            $name = get_field('name');


            ?>

            <?php
            if (have_posts()) {
                while (have_posts()) : the_post();

            ?>
                    <div class="profil-student-one">
                        <img class="picture-student" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                        <div class=" name-location-social-portfolio">
                            <div class="name-profesionel">
                                <span><?php echo ($name); ?></span>
                                <span><?php echo get_post_meta(get_the_ID(), 'profession', true); ?></span>

                            </div>
                            <div class="student-address-date">

                                <div class="address-date">

                                    <div class="location-picto">
                                        <img src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/location.svg" alt="icon location">
                                        <div class="location-date">
                                            <span><?php echo ($location); ?></span>
                                            <span><?php echo ($date); ?></span>
                                        </div>
                                    </div>
                                    <div class="social-student">
                                        <a href="<?php echo esc_url($linkedin_url); ?>">
                                            <img class="linkdin-link" src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/linkdin.svg" alt="lien linkdin">
                                        </a>
                                        <a href="<?php echo esc_url($github_url); ?>">
                                            <img class="github-link" src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/github.svg" alt="lien github">
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <a href="<?php echo esc_url($portfolio_url); ?>">
                                <button class="button-portfolio">

                                    <div class="svg-wrapper-1">
                                        <div class="svg-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span>Portfolio</span>

                                </button> </a>
                        </div>
                    </div>
                    <div class="presentation-pointe">
                        <h1 class="h1-student"><?php the_excerpt(); ?>
                        </h1>
                        <div class="pointe">
                            <div class="heart-pointe">
                                <img class="heart" src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/heart_fully.svg" alt="heart full">
                                <div class="span-heart">
                                    <!-- <span class="php">PHP</span>
                                    <span class="html">HTML</span>
                                    <span class="scss">SCSS</span>
                                    <span class="js">JS</span> -->
                                    <?php
                                    // Vérifier si $languages contient des données et est un tableau
                                    // $languages = get_field('language-point-positif', get_the_ID());

                                    if ($languages && is_array($languages)) {
                                        foreach ($languages as $language) {
                                            echo '<span class="' . esc_attr(strtolower($language)) . '">' . esc_html($language) . '</span>';
                                        }
                                    }

                                    // $post_id = get_the_ID();
                                    // echo 'Post ID: ' . $post_id;

                                    // $languages = get_field('language-point-positif', $post_id);

                                    // var_dump($languages);

                                    ?>

                                </div>
                            </div>
                            <div class="heart-pointe">
                                <img class="heart" src="<?php echo get_template_directory_uri(); ?>/asset/picture/picto/heart_half.svg" alt="heart full">
                                <div class="span-heart">
                                    <?php
                                    if ($languageMoyen && is_array($languageMoyen)) {
                                        foreach ($languageMoyen as $languageMoyen) {
                                            echo '<span class="' . esc_attr(strtolower($languageMoyen)) . '">' . esc_html($languageMoyen) . '</span>';
                                            // var_dump($languageMoyen);
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
        </div>
<?php
                endwhile;
            } else {
                echo "<p>pas d'article</p>";
            }
?>
    </div>
    </div>
</section>



<!--coter carte boucle -->



<?php get_footer();
?>
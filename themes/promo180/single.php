<?php get_header();
?>
<section class="one-actuality">
    <?php
    if (have_posts()) {
        while (have_posts()) : the_post();
            $portfolio_url = get_field('portfolio');
            $menbre = get_field('menbre');
            $menbre2 = get_field('menbre2');
            $menbre3 = get_field('menbre3');
            $language = get_field('language', get_the_ID());
            $work = get_field('Environments', get_the_ID());


    ?>
            <h2 class="h2-student-one"><?php the_title(); ?></h2>
            <div class="container-card-student-one">
                <div class="card-actuality-one">
                    <div class="picture-teamworker-one">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                        <div class="teamworker-one">
                            <div class="title-name-one">
                                <span class="span-teamworker-one">Team worker</span>
                                <!-- Team member  -->
                                <span><?php echo ($menbre); ?></span>
                                <span> <?php echo ($menbre2); ?></span>
                                <span><?php echo ($menbre3); ?></span>

                            </div>
                            <div class="picture-one">
                                <?php
                                $featured_image_id = get_post_thumbnail_id();
                                $images = get_attached_media('image');

                                foreach ($images as $image) {
                                    if ($image->ID !== $featured_image_id) {
                                        $image_url = wp_get_attachment_image_src($image->ID, 'thumbnail');
                                        $image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
                                ?>
                                        <div class="name-img-one">
                                            <div class="img-actuality-dev-one">
                                                <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                            </div>
                                            <!-- <span>Member Name</span> -->



                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-text-project-one">
                        <h1>Project <?php the_title() ?></h1>
                        <div class="paragraphe-name-date-arrow-one">
                            <p class="pargraphe-actuality-one">“<?php the_excerpt(); ?> ”</p>
                        </div>
                        <div class="language-container ">
                            <span class="title-actuality">Language</span>
                            <div class="span-language">
                                <?php
                                if ($language && is_array($language)) {
                                    foreach ($language as $languages) {
                                        echo '<span class="' . esc_attr(strtolower($languages)) . '">' . esc_html($languages) . '</span>';
                                    }
                                }
                                ?>
                                <!-- <span>HTML</span>
                                <span>PHP</span>
                                <span>SCSS</span>
                                <span>JS</span>
                                <span>TWIG</span> -->
                            </div>
                            <span>Environments de travail</span>
                            <div class="span-Environments">
                                <?php
                                if ($work && is_array($work)) {
                                    foreach ($work as $single_work) {  // Utiliser un nom différent pour éviter la confusion
                                        echo '<span class="' . esc_attr(strtolower($single_work)) . '">' . esc_html($single_work) . '</span>';
                                    }
                                }
                                ?>
                                <!-- <span>VsCode</span>
                                <span>Figma</span>
                                <span>Github</span>
                                <span>Gitbash</span>
                                <span>Trello</span>
                                <span>Discord</span> -->
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
                                <span>GitesFinder</span>

                            </button> </a>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
    } else {
        echo "<p>Article introuvable</p>";
    }
    ?>
</section>

<?php get_footer();
?>
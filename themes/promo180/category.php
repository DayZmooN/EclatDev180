<?php get_header(); ?>

<section class="actuality">
    <h2 class="h2-student">Nos actualités</h2>
    <div class="categories-container">

        <div class="filter">
            <div class="filter-bar-container">
                <div class="btn-right">
                    <button class="arrow left">
                        &lt;
                    </button>
                </div>
                <div class="filter-bar" id="filter-bar">
                    <div class="categories">
                        <h3>Catégories :</h3>
                        <div class="scroll-cat">
                            <?php $categories = get_categories(); ?>
                            <?php if ($categories) : ?>
                                <ul>
                                    <?php foreach ($categories as $category) : ?>
                                        <li>
                                            <a href="<?php echo get_category_link($category->term_id); ?>">
                                                <?= esc_html($category->name) ?>
                                            </a>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p>Aucune catégorie trouvée.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="btn-left">
                    <button class="arrow right">
                        &gt;
                    </button>
                </div>
            </div>
        </div>
        <div class="container-card-student">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- Votre code pour afficher chaque article ici, sans avoir besoin d'une nouvelle WP_Query -->
                    <a href="<?php the_permalink(); ?>">
                        <div class="card-actuality">
                            <div class="picture-teamworker">
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                <div class="teamworker">
                                    <div class="title-name">
                                        <span class="span-teamworker">Team worker</span>
                                        <span>Lead Dev: Walesca</span>
                                        <span>Front-end: Karim</span>
                                        <span>Back-end: Dimitri</span>

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
                <?php endwhile; ?>
            <?php else : ?>
                <p>Pas d'articles dans cette catégorie.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
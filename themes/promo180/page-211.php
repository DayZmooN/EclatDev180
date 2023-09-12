<?php
get_header();

$current_url = $_SERVER['REQUEST_URI'];

// Récupérer l'ID de la catégorie depuis l'URL
$cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
?>

<section class="actuality">
    <h2 class="h2-student">Nos actualités</h2>
    <div class="categories-container">
        <h3>Catégories :</h3>
        <div class="categories">
            <div>
                <?php $categories = get_categories(); ?>
                <?php if ($categories) : ?>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="<?= esc_url($current_url) ?>?cat_id=<?= esc_attr($category->term_id) ?>">
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

        <div class="container-card-student">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
            );

            if ($cat_id > 0) {
                $args['cat'] = $cat_id;
            }

            $post_query = new WP_Query($args);

            if ($post_query->have_posts()) : ?>
                <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="card-actuality">
                            <!-- Votre code pour afficher le post ici... -->
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Pas d'articles</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
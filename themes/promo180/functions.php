<?php
if (!function_exists('montheme_option')) {

    function montheme_option()
    {
        // Support des miniatures et autres fonctionnalités du thème
        add_theme_support("post-thumbnails");
        add_image_size('stagiaire-size', 400, 300, true); // 400 pixels de large par 300 pixels de haut, rognage dur activé


        // Enregistrement des emplacements de menu
        register_nav_menus(array(
            'main_menu' => __('Menu Principal', 'text_domain'),
        ));
    }

    add_action('after_setup_theme', 'montheme_option', 0);
}
if (!function_exists('custom_post_type')) {
    function custom_post_type()
    {
        add_theme_support("post-thumbnails");

        add_theme_support("post-thumbnails");
        register_post_type(
            'stagiaire',
            array(
                'labels'      => array(
                    'name'          => __('Stagiaires', 'textdomain'),
                    'singular_name' => __('Stagiaire', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'menu_position' => 5,
                'menu_icon'   => 'dashicons-groups',
                'show_in_rest' => true,
                'supports'    => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                    'comments',
                    'revisions',
                    'author',
                    'page-attributes',
                    'post-formats',
                ),
            )
        );
    }
}
add_action('init', 'custom_post_type');




// Supprimer le filtre qui ajoute des balises <p> automatiques aux extraits
remove_filter('the_excerpt', 'wpautop');

// Enregistrement des fichiers JavaScript
function enqueue_my_scripts()
{
    wp_enqueue_script('modal_burger', get_template_directory_uri() . '/asset/js/modal_burger.js', array(), '1.0', true);
    wp_enqueue_script('scroll', get_template_directory_uri() . '/asset/js/scroll.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

// Ajout de l'attribut defer aux scripts
function add_defer_attribute($tag, $handle)
{
    if ('modal_burger' === $handle || 'scroll' === $handle) {
        return str_replace(' src', ' defer="defer" src', $tag);
    }
    return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function modifier_icone_type_de_publication()
{
?>
    <style>
        #menu-posts-mon_type_de_publication .wp-menu-image img {
            content: url('./asset/picture/picto/twiter.svg') !important;
        }
    </style>
<?php
}
add_action('admin_head', 'modifier_icone_type_de_publication');

//custome template for stagiaire 
function load_custom_single_template($template)
{
    global $post;

    if ($post->post_type === 'stagiaire') {
        return get_template_directory() . '/single-acme_stagiaire.php';
    }


    return $template;
}

add_filter('single_template', 'load_custom_single_template');
if (!function_exists('get_field')) {
    function get_field($selector, $post_id = false, $format_value = true)
    {
        // Votre implémentation personnalisée ici, si nécessaire
    }
}
// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);

if (!function_exists('widget_registration')) {
    function widget_registration()
    {
        register_sidebar(array(
            'name'          => 'Footer1',
            'id'            => 'footer1',
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-title">',
            'after_title'   => '</h3>',
        ));
    }
}

add_action('widgets_init', 'widget_registration');

//linecode
// function enqueue_line_icons_style()
// {
//     wp_enqueue_style('line-icons', 'https://cdn.lineicons.com/4.0/lineicons.css');
// }
// add_action('wp_enqueue_scripts', 'enqueue_line_icons_style');

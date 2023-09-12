</main>
<footer>
    <h1 class="logo">ÉclatDev<span>180</span></h1>
    <div class="footer-span">
        <?php dynamic_sidebar(('footer1')); ?>

    </div>

    <?php
    wp_footer();
    ?>
    <span>
        copyright by KrDev
    </span>


</footer>

<?php



wp_enqueue_script(
    'modal_burger',
    get_template_directory_uri() . '/asset/js/modal_burger.js',
    array(
        'strategy'  => 'defer',
    )
);
wp_enqueue_script(
    'scrool',
    get_template_directory_uri() . '/asset/js/scroll.js',
    array(
        'strategy'  => 'defer',
    )
); ?>
<?php wp_enqueue_script('main', get_template_directory_uri() . '/asset/js/main.js');
wp_enqueue_script('lineicons', 'https://cdn.lineicons.com/2.0/LineIcons.js', array(), null, true);

?>
</body>

</html>
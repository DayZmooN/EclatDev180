<?php
function page_gestion_reseaux_sociaux()
{
    if (isset($_POST['submit'])) {
        $nom_reseau_sociaux = sanitize_text_field($_POST['nom_reseau_sociaux']);
        $lien_reseau_sociaux = esc_url($_POST['lien_reseau_sociaux']);
        $icone_reseau_sociaux = sanitize_text_field($_POST['icone_reseau_sociaux']);;


        global $wpdb;
        $table_name = $wpdb->prefix . 'reseaux_sociaux';

        $wpdb->insert(
            $table_name,
            array(
                'nom_reseau_sociaux' => $nom_reseau_sociaux,
                'lien_reseau_sociaux' => $lien_reseau_sociaux,
                'icone_reseau_sociaux' => $icone_reseau_sociaux,
            )
        );
    }
?>
    <div class="wrap">
        <h2>Ajouter un Réseau Social</h2>

        <form method="post" action="" enctype="multipart/form-data">
            <label for="nom_reseau_sociaux">Nom du réseau :</label>
            <input type="text" name="nom_reseau_sociaux" id="name_socialMedia" required><br>

            <label for="lien_reseau_sociaux">Lien du réseau :</label>
            <input type="text" name="lien_reseau_sociaux" id="link_socialMedia" required><br>

            <label for="icone_reseau_sociaux">Icône du réseau :</label>
            <select name="icone_reseau_sociaux" id="icon_socialMedia" required>
                <option value="">Sélectionnez une icône</option>
                <option value="lni lni-facebook">Facebook</option>
                <option value="lni lni-twitter">Twitter</option>
                <option value="lni lni-instagram">Instagram</option>
                <option value="lni lni-tiktok">TikTok</option>
                <option value="lni lni-youtube">Youtube</option>
                <option value="lni lni-twitch">Twitch</option>
                <option value="lni lni-linkedin-original">Linkedin</option>
                <option value="lni lni-github-origina">Github</option>

            </select><br>

            <input type="submit" name="submit" value="Enregistrer">
        </form>
    </div>

<?php
}


// *-**-CREATE TABLE //
global $wpdb;
$table_name = $wpdb->prefix . 'reseaux_sociaux';

$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    nom_reseau_sociaux varchar(255) NOT NULL,
    lien_reseau_sociaux varchar(255) NOT NULL,
    icone_reseau_sociaux varchar(255) NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);


add_action('admin_menu', 'ajouter_menu_reseaux_sociaux');

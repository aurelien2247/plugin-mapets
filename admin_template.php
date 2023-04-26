<?php
/**
 * Plugin Name: Menu colier Pour animaux
 * Plugin URI:  https://www.aureilen.com
 * Description: Plugin gérant le menu wordpress dont la localisation d'un animal
 * Version:     1.0.1
 * Author:      Aurélien
 * Author URI:  https://www.aureilen.com
 * Text Domain: ada
 */

/** Include des pages */
include('includes/functions.php');
include('templates/localisation_page.php');
include('templates/localisation_administrator.php');

add_action('admin_menu', 'menu_administration');

add_filter('theme_page_templates','my_template_register',10,3);
add_filter('template_include','my_template_select', 99);
add_filter('theme_page_templates','my_template_register2',10,3);
add_filter('template_include','my_template_select2', 99);
add_filter('theme_page_templates','my_template_register3',10,3);
add_filter('template_include','my_template_select3', 99);

//add_action('admin_menu', 'membership_directory_admin');
//Hook edit le profil pour la validation de l'admin


?>

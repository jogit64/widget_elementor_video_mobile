<?php

/**
 * Plugin Name: Le Bon Univers Elementor Video/Mobile Widget
 * Description: Affichage de vidéos MP4 (muet) dans un cadre de téléphone mobile.
 * Version: 1.0
 * Author: Johannr/LeBonUnivers
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Inclut le widget Elementor lorsque les widgets d'Elementor sont enregistrés.
 */


add_action('elementor/elements/categories_registered', function ($elements_manager) {
    $elements_manager->add_category(
        'lebonunivers-elements',
        [
            'title' => 'Le Bon Univers Elements',
            'icon' => 'fa fa-plug', // Changer l'icône selon vos préférences
        ]
    );
});




add_action('elementor/widgets/widgets_registered', 'register_lebonunivers_elementor_widget');

function register_lebonunivers_elementor_widget()
{
    if (class_exists('\Elementor\Widget_Base')) {
        require_once 'includes/elementor-widget.php';
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \lebonunivers_Elementor_Video_Widget());
    }
}





function lebonunivers_elementor_widget_scripts()
{
    wp_enqueue_style('lebonunivers-elementor-style', plugins_url('/assets/style.css', __FILE__));
    wp_enqueue_script('lebonunivers-elementor-script', plugins_url('/assets/script.js', __FILE__), ['jquery']);
}
add_action('wp_enqueue_scripts', 'lebonunivers_elementor_widget_scripts');

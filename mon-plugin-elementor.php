<?php

/**
 * Plugin Name: Zenzones Elementor Video Widget
 * Description: Un widget personnalisé d'Elementor pour intégrer des vidéos MP4 sans son avec leur ratio original.
 * Version: 1.0
 * Author: Johannr
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Inclut le widget Elementor lorsque les widgets d'Elementor sont enregistrés.
 */
add_action('elementor/widgets/widgets_registered', 'register_zenzones_elementor_widget');

function register_zenzones_elementor_widget()
{
    if (class_exists('\Elementor\Widget_Base')) {
        require_once 'includes/elementor-widget.php';
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Zenzones_Elementor_Video_Widget());
    }
}


function zenzones_elementor_widget_scripts()
{
    wp_enqueue_style('zenzones-elementor-style', plugins_url('/assets/style.css', __FILE__));
    wp_enqueue_script('zenzones-elementor-script', plugins_url('/assets/script.js', __FILE__), ['jquery']);
}
add_action('wp_enqueue_scripts', 'zenzones_elementor_widget_scripts');

/*
* Ceci est un exemple de fichier source pour le projet Widget_elementor_video_mobile
*
* Copyright (c) 2024 johannr / lebonunivers
* Ce fichier est sous la Mozilla Public License, version 2.0.
* Si une copie de la MPL n'a pas été fournie avec ce fichier, vous pouvez l'obtenir à
* https://mozilla.org/MPL/2.0/.
*/


<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Classe lebonunivers_Elementor_Video_Widget pour le widget vidéo personnalisé.
 */
class lebonunivers_Elementor_Video_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lebonunivers_video_widget';
    }

    public function get_title()
    {
        return __('lebonunivers Video Widget', 'plugin-lebonunivers');
    }

    public function get_icon()
    {
        return 'eicon-video-camera';
    }

    public function get_categories()
    {
        return ['lebonunivers-elements'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Configuration', 'plugin-lebonunivers'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => __('Video Link', 'plugin-lebonunivers'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'video',
                'placeholder' => __('Enter your video link', 'plugin-lebonunivers'),
            ]
        );


        // $this->add_control(
        //     'coque_image',
        //     [
        //         'label' => __('Coque Image', 'plugin-lebonunivers'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //         'default' => [
        //             'url' => \Elementor\Utils::get_placeholder_image_src(),
        //         ],
        //     ]
        // );


        $this->add_control(
            'coque_image',
            [
                'label' => __('Coque Image', 'plugin-lebonunivers'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('../assets/default-phone.png', __FILE__),
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $video_link = $settings['video_link']['url'];
        $coque_image = $settings['coque_image']['url'];

        if ($video_link && $coque_image) {
            echo '<div class="lebonunivers-video-container">'; // Conteneur principal

            // Conteneur de la vidéo
            echo '<div class="lebonunivers-video-widget">';
            echo '<video class="lebonunivers-video" controls muted loop style="width: 100%; height: auto;">';
            echo '<source src="' . esc_url($video_link) . '" type="video/mp4">';
            echo '</video>';
            echo '</div>';

            // Image de la coque
            echo '<img src="' . esc_url($coque_image) . '" class="coque" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;">';

            echo '</div>'; // Fin du conteneur principal
        }
    }
}
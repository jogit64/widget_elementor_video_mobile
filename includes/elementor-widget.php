<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Classe zenzones_Elementor_Video_Widget pour le widget vidéo personnalisé.
 */
class Zenzones_Elementor_Video_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'zenzones_video_widget';
    }

    public function get_title()
    {
        return __('zenzones Video Widget', 'plugin-zenzones');
    }

    public function get_icon()
    {
        return 'eicon-video-camera';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Configuration', 'plugin-zenzones'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => __('Video Link', 'plugin-zenzones'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'video',
                'placeholder' => __('Enter your video link', 'plugin-zenzones'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'label' => __('Image Size', 'plugin-zenzones'),
                'default' => 'large',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $video_link = $settings['video_link']['url'];

        if ($video_link) {
            echo '<div class="zenzone-video-container">'; // Conteneur principal

            // Conteneur de la vidéo
            echo '<div class="zenzone-video-widget">';
            echo '<video class="zenzone-video" controls muted loop style="width: 100%; height: auto;">';
            echo '<source src="' . esc_url($video_link) . '" type="video/mp4">';
            echo '</video>';
            echo '</div>';

            // Élément de contrôle (coque)
            echo '<div class="coque" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;">';
            // Ici, vous pouvez ajouter du contenu supplémentaire pour l'élément de contrôle si nécessaire
            echo '</div>';

            echo '</div>'; // Fin du conteneur principal
        }
    }
}

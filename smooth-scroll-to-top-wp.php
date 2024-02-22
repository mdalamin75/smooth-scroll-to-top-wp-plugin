<?php
    /*
    * Plugin Name:          Smooth Scroll To Top WP
    * Plugin URI:           https://wordpress.org/plugins/smooth-scroll-to-top-wp/
    * Description:          Smooth Scroll to top plugin will help you to enable back to top your WordPress website smoothly.
    * Version:              1.0.0
    * Requires al least:    5.2
    * Requires PHP:         7.2
    * Author:               MD.AL-AMIN
    * Author URI:           https://mdalamin.vercel.app/
    * License:              GPLv2 or later
    * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
    * Update URI:           https://github.com/mdalamin75/smooth-scroll-to-top-wp-plugin
    * Text Domain:          ssttw
    */ 

    // Including CSS
    function ssttw_enqueue_style(){
        wp_enqueue_style('ssttw-style', plugins_url('css/ssttw-style.css', __FILE__));
    }
    add_action('wp_enqueue_scripts', 'ssttw_enqueue_style');

    // Including JavaScript
    function ssttw_enqueue_scripts(){
        wp_enqueue_script('jquery');
        wp_enqueue_script('ssttw-plugin-script', plugins_url('js/ssttw-plugin.js', __FILE__), array(), '1.0.0', 'true');
    }
    add_action('wp_enqueue_scripts', 'ssttw_enqueue_scripts');

    // jQuery Plugin Setting Activation
    function ssttw_scroll_script(){
        ?>
            <script>
                jQuery(document).ready(function () {
                    jQuery.scrollUp();
                })
            </script>
        <?php
    }
    add_action('wp_footer', 'ssttw_scroll_script');

    // Plugin Customization Settings
    add_action('customize_register','ssttw_scroll_to_top');
    function ssttw_scroll_to_top($wp_customize){
        $wp_customize-> add_section('ssttw_scroll_top_section', array(
            'title' => __('Scroll To Top', 'ssttw'),
            'description' => 'Smooth Scroll to top plugin will help you to enable back to top your WordPress website smoothly.'
        ));

        $wp_customize-> add_setting('ssttw_default_color', array(
            'default' => '#0000000',
        ));
        $wp_customize->add_control('ssttw_default_color', array(
            'label' => 'Background Color',
            'section' => 'ssttw_scroll_top_section',
            'type' => 'color',
        ));
        
        // Adding Rounded Corner
        $wp_customize-> add_setting('ssttw_rounded_corner', array(
            'default' => '5px',
            'description' => 'If you need fully rounded or circular then use 25px here',
        ));
        $wp_customize->add_control('ssttw_rounded_corner', array(
            'label' => 'Rounded Corner',
            'section' => 'ssttw_scroll_top_section',
            'type' => 'text',
        ));
    }

    // Theme CSS Customization
    function ssttw_plugin_color_cus(){
        ?>
            <style>
                #scrollUp{
                    background-color: <?php print get_theme_mod('ssttw_default_color');?>;
                    border-radius: <?php print get_theme_mod('ssttw_rounded_corner');?>;
                }
            </style>
        <?php
    }
    add_action('wp_head', 'ssttw_plugin_color_cus');
?>
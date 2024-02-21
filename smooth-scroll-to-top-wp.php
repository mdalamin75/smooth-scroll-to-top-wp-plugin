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
?>
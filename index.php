<?php

/** 
 *   Plugin Name: Are You paying attention
 *   Description: Give yout readers a multiple choise question
 *   Version: 1.0
 *   Author: Jusa
 *   Author URI: https://www.jusadev.com
 */

if (!defined('ABSPATH')) exit;

class AreYouPayingAttention
{

    function __construct()
    {
        add_action('init', array($this, 'adminAssets'));
    }

    function test()
    {
        return ("<h1>Hello</h1>");
    }

    function adminAssets()
    {
        wp_register_style('quizeditcss', plugin_dir_url(__FILE__) . "build/index.css");
        wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
        register_block_type('ourplugin/are-you-paying-attention', array(
            'editor_script' => 'ournewblocktype',
            'editor_style' => 'quizeditcss',
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes)
    {

        wp_enqueue_script("attentionFrontend", plugin_dir_url(__FILE__) . "build/frontend.js", array("wp-element", "wp-blocks"));
        wp_enqueue_style("attentionFrontendStyles", plugin_dir_url(__FILE__) . "build/frontend.css");

        ob_start(); ?>
        <div class="paying-attention-update-me">
            <pre style="display: none;"><?= wp_json_encode($attributes) ?></pre>
        </div>
<?php return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention();

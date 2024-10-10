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
        register_block_type(__DIR__, array(
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes)
    {
        ob_start(); ?>
        <div class="paying-attention-update-me">
            <pre style="display: none;"><?= wp_json_encode($attributes) ?></pre>
        </div>
<?php return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention();

<?php

/*
 * Plugin Name: لاگین شو
 * Plugin URI: https://afraa.shop
 * Description: action_hook
 * Author: Reza Moeini
 * Author URI: http://afraa.shop
 * Version: 1.1.0
 */


defined('ABSPATH') || exit;



    define('LS_PLUGIN_PATH' , plugin_dir_path(__FILE__));
    define('LS_PLUGIN_URL' , plugin_dir_url(__FILE__));


    define('LS_PLUGIN_INC' , LS_PLUGIN_PATH . 'inc/');
    // define('MP_PLUGIN_ASSETS' , MP_PLUGIN_PATH . 'assets/' );
    const LS_PLUGIN_ASSETS = LS_PLUGIN_PATH . 'assets/';
    const LS_PLUGIN_VIEWS = LS_PLUGIN_PATH . 'views/';
    const LS_Plugin_ADMIN = LS_PLUGIN_ASSETS . 'Admin/';
    include 'inc/Admin/menu.php';
    if (is_admin()) {
        # code... 
        include 'LS_PLUGIN_INC' . 'admin/menu.php';
        include 'widget.php';
        include 'setting.php';
        include 'custom-setting.php';
        include '1.php';
  
        include 'MetaBox.php'; 
        include 'test1.php';
    }else {
        # code...
        include 'LS_PLUGIN_INC' . 'front/list.php';
    }


    
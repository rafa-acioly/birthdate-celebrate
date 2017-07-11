<?php
/*
Plugin Name: Birthdate Celebrate
Plugin URI: https://github.com/rafa-acioly/birthdate-celebrate
Description: Show all user that are making birthday in the current month
Version: 1.0
Author: Rafael Acioly
Author URI: https://github.com/rafa-acioly
License: GPL
*/

if (!defined('ABSPATH')) {
  exit;
}

require 'bootstrap.php';

function add_scripts_to_plugin()
{
  wp_enqueue_script( 'birthdate_celebrate_js', dirname(__FILE__) . '/includes/assets/js/main.js', array( 'jquery' ));
}
add_action('wp_enqueue_scripts', 'add_scripts_to_plugin');


class Birthdate_celebrate
{

  /**
   * Add the menu option "Client"
   */
  public static function add_birthdate_to_menu() {

    add_menu_page(
      __('Clientes'), 
      __('Clientes'),
      'manage_options', 
      'birthday-celebrate',
      array(
        new static, 
        'birthdate_celebrate_page'
      ),
      'dashicons-megaphone', 6);
  }

  /**
   * Render the page plugin
   * 
   * @return mix
   */
  public function birthdate_celebrate_page() {

    $customers = Birthdate_Customer::all();

    $malesQuantity = array_filter($customers, function ($customer) {
      return $customer->get_meta('billing_sex') === 'Male';
    });

    $femaleQuantity = array_filter($customers, function ($customer) {
      return $customer->get_meta('billing_sex') === 'Female';
    });

    require Render::view('content');
  }
}

add_action('admin_menu', array('Birthdate_celebrate', 'add_birthdate_to_menu'));



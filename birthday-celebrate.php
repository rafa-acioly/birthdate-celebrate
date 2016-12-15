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
add_action('admin_menu', array('Birthdate_celebrate', 'add_birthdate_to_menu'));

class Birthdate_celebrate
{

    public static function add_birthdate_to_menu() {

        add_menu_page('Clientes', 'Clientes',
                      'manage_options', 'birthday-celebrate',
                      array(new static, 'birthday_celebrate_page'),
                      'dashicons-universal-access', 6);
    }

    public function birthdate_celebrate_page() {

        $customers    = Customer::all();

        $customerList = array_map(function($customer) {
            return $customer->billing_birthdate != null;
        }, $customers);

        $list = array_map(function($customer) {
            $customer->billing_birthdate = new Birthday($customer->billing_birthdate);
            return $customer;
        }, $customerList);

        require Render::view('table');
    }
}




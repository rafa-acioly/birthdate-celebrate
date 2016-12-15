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

class Birthdate_celebrate
{

    public static function add_birthdate_to_menu() {

        add_menu_page('Clientes', 'Clientes',
                      'manage_options', 'birthday-celebrate',
                      array(new static, 'birthdate_celebrate_page'),
                      'dashicons-universal-access', 6);
    }

    public function birthdate_celebrate_page() {

        $customers    = Customer::all();

        $customersFiltered = array_filter($customers, function($customer) {
           return $customer->billing_birthdate != null && date('m') == date('m', strtotime(str_replace('/', '-', $customer->billing_birthdate)));
        });

        $customers = array_map(function($customer) {
            $customer->billing_birthdate = new Birthday($customer->billing_birthdate);
            return $customer;
        }, $customersFiltered);

        require Render::view('content');
    }
}

add_action('admin_menu', array('Birthdate_celebrate', 'add_birthdate_to_menu'));



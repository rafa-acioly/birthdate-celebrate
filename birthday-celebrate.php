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
require_once "Dependency.php";
require_once "Birthday.php";
add_action('admin_menu', 'add_birthday_to_menu');

function add_birthday_to_menu()
{
	add_menu_page('Clientes',
            'Clientes',
            'manage_options',
            'birthday-celebrate',
            'birthday_celebrate_page',
            'dashicons-universal-access', 
            6);
}

function starts_html()
{
	return "<table class=\"wp-list-table widefat fixed striped\">
		<thead>
			<td class=\"manage-column column-name\">Nome do cliente</td>
			<td class=\"manage-column\">Usuario</td>
			<td class=\"manage-column \">Data de aniversario</td>
			<td class=\"manage-column column-email\">Email</td>
		</thead>
		<tbody>";
}

function finish_html()
{
	return "</tbody></table><br>";
}

function birthday_celebrate_page()
{
    $clients = get_users('orderby=nicename');

    echo __("<h3>Aniversariantes do mês</h3>");

	echo starts_html();

  	foreach ($clients as $client) {
  		$birthday = new Birthday($client->billing_birthdate);

  		if (!strtotime($birthday->get_date())) {
  			continue; // If client has no birth date skip to next one.
  		}

  		if ($birthday->get_month() == $birthday->get_current_month()) {
  			echo "<tr>
					<td>{$client->customer_name}</td>
					<td>{$client->user_nicename}</td>
					<td>{$birthday->get_date()}</td>
					<td>{$client->user_email}</td>
				</tr>";
  		}
  	}

	echo finish_html();
}






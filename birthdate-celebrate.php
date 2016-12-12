<?php
/**
* Plugin Name: Birth Date Celebrate
* Plugin URI:
* Description: Order clients by brithdate
* Version: 0.1.0
* Author: Rafael Acioly
* Author URI: https://github.com/rafa-acioly
*/
require_once "Brithdate.php";
add_action('admin_menu', 'add_bc_to_menu');


function add_bc_to_menu()
{
	add_menu_page('Clientes',
            'Clientes',
            'manage_options',
            'birthdate-celebrate',
            'brithdate_celebrate_page',
            'dashicons-universal-access', 
            6);
}

function starts_html()
{
	return "<table class=\"wp-list-table widefat fixed striped\">
		<thead>
			<td class=\"manage-column\">Nome do cliente</td>
			<td class=\"manage-column\">Usuario</td>
			<td class=\"manage-column\">Data de aniversario</td>
			<td class=\"manage-column\">Email</td>
		</thead>";
}

function finish_html()
{
	return "</table> <br>";
}


function get_all_clients_by($field)
{
	return get_users("orderby={$field}");
}


function brithdate_celebrate_page()
{
  $clients = get_all_clients_by('nicename');
  $birthdateController = new Brithdate();

  echo __("<h3>Aniversariantes do mês</h3>");

	starts_html();

  	foreach ($clients as $client) {
  		$date = $birthdateController->normalize_date($client->billing_birthdate);

  		if (!strtotime($date)) {
  			continue; // If client has no birth date skip to next one.
  		}

  		$clientMonth = $birthdateController->get_month($date);

  		$birthdate = new DateTime($date);

  		if ($clientMonth == $birthdateController->get_current_month()) {

  			if (!$client->customer_name) {
  				$client->customer_name = "-"; // If client has no name use "-" instead.
  			}

  			echo "<tbody>
					<tr>
					<td>{$client->customer_name}</td>
					<td>{$client->user_nicename}</td>
					<td>{$birthdate}</td>
					<td>{$client->user_email}</td>
					</tr>
				 </tbody>";
  		}
  	}

	finish_html();
}






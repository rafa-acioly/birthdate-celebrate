<?php

class Dependency
{
	/**
	 * Store all the dependencies name that are missing.
	 * @var Array
	 */
	public $dependencies_missing = [];

	/**
	 * Declare all dependencies
	 * @var Array
	 */
	private $dependecies = [
		'Extra_Checkout_Fields_For_Brazil',
	];

	/**
	 * Create the alert message on admin panel.
	 * @return html
	 */
	public function show_missing_dependencies()
	{
		echo "<div class=\"error\"><ul>";
		foreach ($this->dependencies_missing as $dependency => $value) {
				$plugin = preg_replace('/[^a-zA-Z]/', ' ', $dependency);
				echo "<li>";
					_e("BirthDay Celebrate requires $plugin. Please install it.", 'wpse');
				echo "</li>";
		}
		echo "</ul></div>";
	}

	/**
	 * Check every dependency and add to array $dependencies_missing if missing
	 * 
	 * @return void
	 */
	public function check_dependencies()
	{
		foreach ($this->dependecies as $dependency) {
			if ( ! class_exists( $dependency ) ) {
				array_push($this->dependencies_missing, $dependency);
			}
		}

		if (!empty($this->dependencies_missing)) {
			add_action('admin_notices', array($this, 'show_missing_dependencies'));
		}

	}
}
add_action('plugins_loaded', array(new Dependency(), 'check_dependencies'));

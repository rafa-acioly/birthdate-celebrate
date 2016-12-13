<?php
/**
 * Verify is plugin Extra Checkout Fields for Brazil are installed
 */
/**
* 
*/
class Dependency
{
	public $dependencies_missing = [];
	private $dependecies = [
		'Extra_Checkout_Fields_For_Brazil',
	];

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

	public function check_dependencies()
	{
		foreach ($this->dependecies as $dependency) {
			if ( ! class_exists( $dependency ) ) {
				$this->dependencies_missing[$dependency] = true;
			}
		}

		if (!empty($this->dependencies_missing)) {
			add_action('admin_notices', array($this, 'show_missing_dependencies'));
		}

	}
}
$dependency = new Dependency();
add_action('plugins_loaded', array($dependency, 'check_dependencies'));

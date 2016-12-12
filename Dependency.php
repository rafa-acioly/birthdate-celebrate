<?php
/**
 * Verify is plugin Extra Checkout Fields for Brazil are installed
 */
function check_extra_fields_plugin_install()
{
   if ( ! class_exists('Extra_Checkout_Fields_For_Brazil')) {
       add_action('admin_notices', 'birthday_dp_err');
       return;
   }
}
add_action('plugins_loaded', 'check_extra_fields_plugin_install');

/**
 * Show error message asking to install plugin needed
 */
function birthday_dp_err()
{?>
    <div class="error"><p>
        <?php _e('BirthDay Celebrate requires Extra Checkout Fields for Brazil. Please install it.', 'wpse'); ?>
    </p></div>
<?php
}
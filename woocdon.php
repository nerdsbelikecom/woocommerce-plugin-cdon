<?php
/*
    Plugin Name: woocdon
    Plugin URI: https://github.com/nerdsbelikecom/woocommerce-plugin-cdon
    Description: Free CDON Plugin
    Author: Juan Soto
    Author URI: https://www.linkedin.com/in/juan-soto-83bb8765
    Version: 1.0.0
*/


// it inserts the entry in the admin settings menu
function plugin_register_settings() {
   add_option( 'APIforCDON' );
   register_setting( 'plugin_options_group', 'APIforCDON', 'plugin_callback' );
}
add_action( 'admin_init', 'plugin_register_settings' );

// function triggered
function plugin_register_options_page() {
  add_options_page('Page Title', 'WooCDON', 'manage_options', 'WooCDON', 'plugin_options_page');
}
add_action('admin_menu', 'plugin_register_options_page');

// plugin content
function plugin_options_page()
{
?>
  <div>
  <?php screen_icon(); ?>
  <h2>WooCDON</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'plugin_options_group' ); ?>
  <h3>Add Your Credentials For Your CDON Store</h3>
  <table>
  <tr valign="top">
  <th scope="row"><label for="Merchant ID">Merchant ID</label></th>
  <td><input type="text" id="Merchant ID" name="Merchant ID" value="<?php echo get_option('Merchant ID'); ?>" /></td>
  </tr>
  <tr valign="top">
  <th scope="row"><label for="SourceId">Source ID</label></th>
  <td><input type="text" id="Source Id" name="Source Id" value="<?php echo get_option('Source Id'); ?>" /></td>
  </tr>
  <tr valign="top">
  <th scope="row"><label for="APIforCDON">API</label></th>
  <td><input type="text" id="APIforCDON" name="APIforCDON" value="<?php echo get_option('APIforCDON'); ?>" /></td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
}

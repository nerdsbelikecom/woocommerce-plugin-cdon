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
   add_option( 'option_name', 'the coffee');
   register_setting( 'plugin_options_group', 'option_name', 'plugin_callback' );
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
  <h3>make me coffee</h3>
  <p>??? ok? SUDO! make me coffee</p>
  <table>
  <tr valign="top">
  <th scope="row"><label for="option_name">Label</label></th>
  <td><input type="text" id="option_name" name="option_name" value="<?php echo get_option('option_name'); ?>" /></td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
}
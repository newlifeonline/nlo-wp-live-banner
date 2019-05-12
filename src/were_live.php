<?php
   /*
   Plugin Name: We're Live
   Plugin URI: https://newlifexn.com
   description: shows were live banner
   Version: 0.1
   Author: Casey Collins
   Author URI: https://www.cacodev.com
   License: MIT
   */
   
class LiveBanner {
	public function __construct()
    {
        add_shortcode('LiveBanner', array($this, 'shortcode'));
    }
    
    public function shortcode()
    {
        if ($this->check_go_live())
        {
            echo $this->get_go_live_banner();
        }
    }

	public function check_go_live() 
	{
        return date('w') == 0 ||
                date('w') == 6 ||
                date('w') == 7;
	}

	public function get_go_live_banner() 
	{
		return
		'<header>
			<div class="w-100" id="alert">
				<a class="alert-text" href="http://facebook.com/newlifexn">Click To Watch Services Live Sat 6:30 or Sun 8:30a, 10a, or 11:30a</a>
			</div>
		</header>';
	}
}

$wpLiveBanner = new LiveBanner();

function nlo_wl_register_settings()
{
    add_option( 'nlo_wl_option_name', 'Were live options');
    register_setting( 'nlo_wl_options_group', 'nlo_wl_option_name', 'nlo_wl_callback' );

    add_settings_section("section", "Section", null, "demo");
    add_settings_field("demo-checkbox", "Demo Checkbox", "demo_checkbox_display", "demo", "section");  
    register_setting("section", "demo-checkbox");
}

function demo_checkbox_display()
{
   ?>
        <!-- Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string. -->
        <input type="checkbox" name="demo-checkbox" value="1" <?php checked(1, get_option('demo-checkbox'), true); ?> /> 
   <?php
}
add_action( 'admin_init', 'nlo_wl_register_settings' );

function nlo_wl_register_options_page()
{
     add_options_page('NLO - Were Live', 'NLO - Were Live', 'manage_options', 'nlo_wl', 'nlo_wl_options_page');
}
add_action('admin_menu', 'nlo_wl_register_options_page');

function nlo_wl_options_page()
{
?>
  <div>
  <?php screen_icon(); ?>
  <h2>NLO - Were Live</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'nlo_wl_options_group' ); ?>
  <h3>This is my option</h3>
  <p>Some text here.</p>
  <table>
  <tr valign="top">
  <th scope="row"><label for="nlo_wl_option_name">Label</label></th>
  <td><input type="text" id="nlo_wl_option_name" name="nlo_wl_option_name" value="<?php echo get_option('nlo_wl_option_name'); ?>" /></td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
}
?>
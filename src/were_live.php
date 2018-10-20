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
		return date('w') > 0 && date('w') < 7;
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
?>
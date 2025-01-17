<?

	/*
	Plugin Name: RJW | Thinglink
	Plugin URI: http://ryanjwilke.com/
	Description: A simple way to add the Thinglink script to your whole website.
	Version: 1.0.1
	Author: Ryan J Wilke, Freelance Interaction Designer
	Author URI: http://ryanjwilke.com/
	*/


	class RJW_Thinglink {
		
		const PLUGIN_NAME = "RJW | Thinglink";
		const PLUGIN_VERSION = "1.0";
		const PLUGIN_CONFIG_HOOK = "rjw-thinglink-config";
		const PLUGIN_CONFIG_URL = "/rjw-thinglink/rjw-thinglink-config.php";

		/* --------------------------------------------------
		Template Functions
		-------------------------------------------------- */
		function add_thinklink_to_footer(){
			$thinglink_id = get_option('thinglink_id');
			echo "
				<!-- Thinglink: Code added by the RJW | Thinglink plugin -->
				<script type=\"text/javascript\">
				   __tlid = '{$thinglink_id}';
				</script>
				<script type=\"text/javascript\" src=\"http://www.thinglink.com/jse/embed.js\"></script>
			";
		}
	
		/* --------------------------------------------------
		Settings & Config
		-------------------------------------------------- */
		function admin_init(){
			register_setting('rjw-thinglink-group', 'thinglink_id');
		}
	
		function admin_menu(){
			add_submenu_page('plugins.php', self::PLUGIN_NAME, self::PLUGIN_NAME, 'manage_options', self::PLUGIN_CONFIG_HOOK, array(&$this, 'admin_menu_options'));
		}
	
		function admin_menu_options() {
			$plugin_name = self::PLUGIN_NAME;
			include(WP_PLUGIN_DIR . self::PLUGIN_CONFIG_URL);
		}
	
		function plugin_action_links($links, $file) {
			if ($file == "rjw-thinglink/rjw-thinglink.php") {
				$href = admin_url("plugins.php?page=" . self::PLUGIN_CONFIG_HOOK);
				$text = __('Settings');
				array_unshift($links, "<a href=\"{$href}\">{$text}</a>");
			}
			return $links;
		}
		
	}
	
	/* --------------------------------------------------
	Initialize
	-------------------------------------------------- */
	$rjw_thinglink = new RJW_Thinglink();
	
	/* --------------------------------------------------
	WordPress Hooks
	-------------------------------------------------- */
	add_action('wp_footer', array($rjw_thinglink, 'add_thinklink_to_footer'));
	add_action('admin_init', array($rjw_thinglink, 'admin_init'));
	add_action('admin_menu', array($rjw_thinglink, 'admin_menu'));
	add_filter('plugin_action_links', array($rjw_thinglink, 'plugin_action_links'), 10, 2);

?>
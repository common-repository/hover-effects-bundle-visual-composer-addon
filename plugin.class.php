<?php
/**
* Main Class
*/
class UI_Elements_Hover_Effects
{
	
	function __construct()
	{
		add_action( 'vc_before_init', array($this, 'vc_settings_init' ));
		add_action( 'init', array( $this, 'check_if_vc_is_install' ) );
	}

	function vc_settings_init(){
		include VCADDONS_PATH.'/inc/image-hover-effects.php';
	}

	function check_if_vc_is_install(){
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }			
	}

    function showVcVersionNotice() {
        $plugin_name = 'Hover Effects Bundle - Visual Composer Addon';
        echo '
        <div class="updated">
          <p>'.sprintf('<strong>%s</strong> requires <strong><a href="http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=WebCodingPlace" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', $plugin_name).'</p>
        </div>';
    }	
}
?>
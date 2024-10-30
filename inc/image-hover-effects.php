<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_wcp_image_hover extends WPBakeryShortCode {

	protected function content( $attrs, $content = null ) {
		extract( shortcode_atts( array(
            'style'         => '1',
            'css'           => '',
            'title'           => '',
            'icon'          => '',
            'title2'           => '',
            'description'           => '',
            'title_color'           => '',
            'title2_color'           => '',
            'desc_color'           => '',
            'image_id'           => '',
            'link'           => 'javascript:void(0);',
			'link_target'           => '',

		), $attrs ) );
        if ($image_id != '') {
            $image_url = wp_get_attachment_url( $image_id );
        }        
        wp_enqueue_style( 'font-awesome' );
        wp_enqueue_style('vc-product-boxes', VCADDONS_URL.'/assets/css/image-hover-effects.css');

		$box_id = rand(5,1500);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ));
		ob_start(); ?>

		<div class="<?php echo $css_class; ?>">
			<?php include VCADDONS_PATH.'/templates/image-hover-effects/style'.$style.'.php'; ?>
		</div>
		<?php return ob_get_clean();
	}
}

$hover_styles = array();
for ($i=1; $i <= 50; $i++) { 
    $hover_styles[__( 'Style ', 'wcp-addons-vc' ).$i] = $i;
}

vc_map( array(
	'base' => 'wcp_image_hover',
	'name' => __( 'Hover Effects', 'wcp-addons-vc' ),
	'description' => __( 'Interactive hover effects for images', 'wcp-addons-vc' ),
	'category' => __( 'UI Elements Addons', 'wcp-addons-vc' ),
	'params' => array(
 		array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => __("Style", "wcp-addons-vc"),
            "description" => __("Choose product box style here", "wcp-addons-vc"),
            "value" => $hover_styles,
        ),
        array(
            "type" => "attach_image",
            "param_name" => "image_id",
            "heading" => __("Image", "wcp-addons-vc"),
            "description" => __("Choose image here", "wcp-addons-vc"),
        ),
        array(
            "type" => "textfield",
            "param_name" => "title",
            "heading" => __("Title", "wcp-addons-vc"),
            "description" => __("Provide title text here", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value' => array('1','2','3','4','5','6','7','8','9','10','12','14','16','18','19','20','21','22','23','25','26','28','30','32','33','34','35','38','39','40','42','43','44','47','48','49','50'),
             ),
        ),
        array(
            "type" => "iconpicker",
            "param_name" => "icon",
            "heading" => __("Icon", "wcp-addons-vc"),
            "description" => __("Choose Icon", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value' => array('10','11','12','13','17','18','24','26','27','29','33','35','36','37','43','45','46','50'),
             ),            
            
            
        ),
       
        array(
            "type" => "textfield",
            "param_name" => "title2",
            "heading" => __("Title 2", "wcp-addons-vc"),
            "description" => __("Provide 2nd title text here", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value' => array('3','16', '39' ,'47'),
             ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "description",
            "heading" => __("Description", "wcp-addons-vc"),
            "description" => __("Provide description text here", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value_not_equal_to' => array('7', '8', '9', '10', '11', '13', '15', '17', '18', '19', '20', '23', '24', '26', '27', '29', '31', '34', '35', '36', '37', '41', '44', '45', '46'),
             ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "link",
            "heading" => __("Link To", "wcp-addons-vc"),
            "description" => __("Provide link for navigation", "wcp-addons-vc"),
        ),
        array(
            'type'          => 'dropdown',
            'param_name'    => 'link_target',
            'heading'       => __('Link Target', 'wcp-rem'),
            'description'   => __('How you want to open link', 'wcp-addons-vc'),
            'value' => array(
                __('Same Tab', 'wcp-rem') => '_self',
                __('New Tab', 'wcp-rem') => '_blank',
            ),
        ),        
        array(
            "type" => "colorpicker",
            "param_name" => "title_color",
            "heading" => __("Title Color", "wcp-addons-vc"),
            "description" => __("Choose title text color here", "wcp-addons-vc"),
            "group" => __("Colors", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value' => array('1','2','3','4','5','6','7','8','9','10','12','14','16','18','19','20','21','22','23','25','26','28','30','32','33','34','35','38','39','40','42','43','44','47','48','49','50'),
             ),            
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "title2_color",
            "heading" => __("2nd Title Color", "wcp-addons-vc"),
            "description" => __("Choose title text color here", "wcp-addons-vc"),
            "group" => __("Colors", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value' => array('3','16', '39' ,'47'),
             ),
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "desc_color",
            "heading" => __("Description Color", "wcp-addons-vc"),
            "description" => __("Choose description text color here", "wcp-addons-vc"),
            "group" => __("Colors", "wcp-addons-vc"),
            'dependency' => array(
                 'element' => 'style',
                 'value_not_equal_to' => array('7', '8', '9', '10', '11', '13', '15', '17', '18', '19', '20', '23', '24', '26', '27', '29', '31', '34', '35', '36', '37', '41', '44', '45', '46' ),
             ),
        ),

		array(
			'type' => 'css_editor',
			'heading' => __( 'Custom Design', 'wcp-addons-vc' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'wcp-addons-vc' ),
		),        
	),
) );
<?php
if(!defined('ABSPATH')) return;

if(!class_exists('Bzotech_Inc')){
    class Bzotech_Inc{
        
        /**
         * 
         * Require theme file
         *
         * @return void
         * 
         */
        static function _init(){
        	require_once( trailingslashit( get_template_directory() ). '/inc/functions.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/config.php' );
            
            if ( is_admin() ) {
                require_once( trailingslashit( get_template_directory() ). '/inc/class/class-tgm-plugin-activation.php' );
				require_once( trailingslashit( get_template_directory() ). '/inc/class/require-plugin.php' );
            }
           
			require_once( trailingslashit( get_template_directory() ). '/inc/class/asset.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/class/importer.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/class/mega_menu.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/class/order-comment-field.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/class/template.php' );

			require_once( trailingslashit( get_template_directory() ). '/inc/controler/base-control.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/customize-control.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/walker-megamenu.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/multi-language-control.php' );
            require_once( trailingslashit( get_template_directory() ). '/inc/controler/header-control.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/footer-control.php' );
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/megaItem-control.php' );
			if(class_exists('woocommerce')){
				require_once( trailingslashit( get_template_directory() ). '/inc/controler/woocommerce-control.php' );
				require_once( trailingslashit( get_template_directory() ). '/inc/controler/woocommerce-variable.php' );
            }
			if(class_exists('Elementor\Core\Admin\Admin')) 
				require_once( trailingslashit( get_template_directory() ). '/inc/controler/elementor-control.php' );
			if(class_exists('Redux'))
				require_once( trailingslashit( get_template_directory() ). '/inc/controler/redux-config.php' );
			
			require_once( trailingslashit( get_template_directory() ). '/inc/controler/metabox-control.php' );
            
            //Load widgets auto
            if(function_exists('bzotech_load_lib')){
				bzotech_load_lib('widget');
			}
        }
    }
    Bzotech_Inc::_init();
}
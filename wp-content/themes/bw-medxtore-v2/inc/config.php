<?php
/**
 * Created by Sublime Text 3.
 * User: MBach90
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('bzotech_set_theme_config')){
    function bzotech_set_theme_config(){
        global $bzotech_dir,$bzotech_config,$redux_option,$bzotech_number_demo,$bzotech_elementor_page;
        /**************************************** BEGIN ****************************************/
        $bzotech_number_demo = 17;
        $bzotech_dir = get_template_directory_uri() . '/inc';
        $redux_option = true;
        $bzotech_config = array();
        $bzotech_elementor_page = array();
        $bzotech_elementor_page['tab']='11111';
        $bzotech_config['dir'] = $bzotech_dir;
        $bzotech_config['css_url'] = $bzotech_dir . '/assets/css/';
        $bzotech_config['js_url'] = $bzotech_dir . '/assets/js/';
        $bzotech_config['bootstrap_ver'] = '3';
        $theme_version = wp_get_theme()->get( 'Version' );
        $bzotech_config['theme_version'] = is_string( $theme_version ) ? $theme_version : false;


        $bzotech_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'bw-medxtore-v2' ),
        );
        $bzotech_config['mega_menu'] = '1';
        $bzotech_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'bw-medxtore-v2' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'bw-medxtore-v2'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        if(class_exists("woocommerce")){
            $bzotech_config['sidebars'][] = array(
                'name'              => esc_html__( 'WooCommerce Sidebar', 'bw-medxtore-v2' ),
                'id'                => 'woocommerce-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all woocommerce page.', 'bw-medxtore-v2'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            );
        }
        $bzotech_config['import_config'] = [
             '13' =>  array(
                'demo_url'                  => 'https://bw-medxtore-importer.bzotech.com/',
                'homepage_default'          => 'Home 13',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'main menu',
                'menu_locations'            => array("main menu" => "primary"),
                'set_woocommerce_page'      => 1
            ),
            '14' =>  array(
                'demo_url'                  => 'https://bw-medxtore-importer.bzotech.com/',
                'homepage_default'          => 'Home 14',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'main menu',
                'menu_locations'            => array("main menu" => "primary"),
                'set_woocommerce_page'      => 1
            ),
            '15' =>  array(
                'demo_url'                  => 'https://bw-medxtore-importer.bzotech.com/',
                'homepage_default'          => 'Home 15',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'main menu',
                'menu_locations'            => array("main menu" => "primary"),
                'set_woocommerce_page'      => 1
            ),
            '16' =>  array(
                'demo_url'                  => 'https://bw-medxtore-importer.bzotech.com/',
                'homepage_default'          => 'Home 16',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'main menu',
                'menu_locations'            => array("main menu" => "primary"),
                'set_woocommerce_page'      => 1
            ),
            '17' =>  array(
                'demo_url'                  => 'https://bw-medxtore-importer.bzotech.com/',
                'homepage_default'          => 'Home 17',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'main menu',
                'menu_locations'            => array("main menu" => "primary"),
                'set_woocommerce_page'      => 1
            ),
            
        ];

        $bzotech_config['import_theme_option'] =[
            '13'=>'{"last_tab":"20","bzotech_header_page":"12195","bzotech_footer_page":"12204","bzotech_show_breadrumb":"1","bzotech_bg_breadcrumb":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/bg-breadcrumb.png","id":"3610","height":"398","width":"1920","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/\/bg-breadcrumb-150x150.png"},"breadcrumb_page":"7748","bzotech_404_page":"","bzotech_404_page_style":"","show_preload":"0","preload_bg":{"color":"","alpha":"1","rgba":""},"preload_style":"style4","preload_image":{"url":"","id":"","height":"","width":"","thumbnail":""},"show_scroll_top":"2","show_wishlist_notification":"","show_too_panel":"0","tool_panel_page":"8186","after_append_footer":"11393","body_bg":{"color":"","alpha":"1","rgba":""},"body_typo":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"","line-height":"","color":""},"title_typo":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","color":""},"main_color":{"color":"","alpha":"","rgba":""},"main_color2":{"color":"","alpha":"","rgba":""},"bzotech_thumbnail_default":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder.png","id":"14357","height":"1200","width":"1200","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder-150x150.png"},"bzotech_page_style":"","container_width":"","post_single_share":{"post":"1","page":"","product":"1"},"post_single_share_list":[{"title":" Facebook","social":"facebook","number":"0"},{"title":" Twitter","social":"twitter","number":"0"},{"title":" Pinterest","social":"pinterest","number":"0"},{"title":" Email","social":"envelope","number":"0"}],"session_page":"0","ajax_security":"0","bzotech_sidebar_position_page":"no","bzotech_sidebar_page":"","bzotech_sidebar_style_page":"default","bzotech_sidebar_position_page_archive":"right","bzotech_sidebar_page_archive":"blog-sidebar","bzotech_sidebar_style_archive":"default","bzotech_sidebar_position_page_search":"","bzotech_sidebar_page_search":"","bzotech_sidebar_style_search":"default","bzotech_add_sidebar":[{"title":"","widget_title_heading":"h3"}],"bzotech_sidebar_position_woo":"left","bzotech_sidebar_woo":"woocommerce-sidebar","bzotech_sidebar_style_woo":"style2","shop_default_style":"grid","shop_gap_product":"","woo_shop_number":"12","sv_set_time_woo":"176","shop_style":"","shop_ajax":"0","shop_thumb_animation":"rotate-thumb","shop_number_filter":"0","shop_number_filter_list":[{"number":""}],"shop_type_filter":"1","shop_order_filter":"1","shop_attribute_color":"","show_quick_view":"1","quick_view_style":"","shop_list_size":"","shop_list_item_style":"","shop_grid_column":"3","shop_grid_size":"","shop_grid_item_style":"style6","item_thumbnail":"","item_quickview":"","item_title":"","item_rate":"","item_button":"","item_label":"","item_countdown":"yes","item_brand":"","item_gallery_hover":"","item_flash_sale":"yes","shop_grid_type":"","cart_page_style":"style2","checkout_page_style":"style2","bzotech_header_page_woo":"","bzotech_footer_page_woo":"","before_append_woo":"7748","after_append_woo":"","brand_woo":"1","sv_style_woo_single":"style-gallery-horizontal","sv_sidebar_position_woo_single":"no","sv_sidebar_woo_single":"","bzotech_sidebar_style_woo_single":"default","product_image_zoom":"zoom-style2","product_tab_detail":"tab-product-horizontal","show_excerpt":"1","share_whatsapp":"1","show_latest":"0","show_upsell":"0","show_related":"1","bzotech_product_sticky_addcart":"1","show_single_number":"8","show_single_size":"","show_single_itemres":"0:2,480:2,768:3,1200:4","show_single_item_style":"style6","before_append_woo_single":"7748","before_append_tab":"","after_append_tab":"","after_append_woo_single":"","append_content_summary":"9215","content_summary_pos":"60","before_append_post":"7748","after_append_post":"","bzotech_sidebar_position_blog":"right","bzotech_sidebar_blog":"","bzotech_sidebar_style_blog":"","blog_default_style":"grid","blog_style":"","blog_number_filter":"0","blog_number_filter_list":[{"title":"9","number":"9"},{"title":" 12","number":" 12"},{"title":" 15","number":" 15"}],"blog_type_filter":"0","blog_order_filter":"0","post_list_item_style":"","item_thumbnail_post_list":"","post_list_size":"","item_title_post_list":"","item_meta_post_list":"","item_excerpt_post_list":"","post_list_excerpt":"999","item_button_post_list":"","post_grid_column":"2","post_grid_item_style":"","post_grid_type":"","item_thumbnail_post":"","post_grid_size":"","item_title_post":"","item_meta_post":"","item_excerpt_post":"","post_grid_excerpt":"999","item_button_post":"","bzotech_style_post_detail":"","bzotech_sidebar_position_post":"right","bzotech_sidebar_post":"blog-sidebar","bzotech_sidebar_style_post":"default","before_append_post_detail":"7748","after_append_post_detail":"","post_single_thumbnail":"1","post_single_size":"","post_single_meta":"","post_single_author":"0","post_single_navigation":"0","post_single_related":"0","post_single_related_title":"Related posts","post_single_related_number":"6","post_single_related_item":"0:1,991:2,1366:3","post_single_related_item_style":"","redux-backup":1}',
            '14'=>'{"last_tab":"20","bzotech_header_page":"12196","bzotech_footer_page":"12206","bzotech_show_breadrumb":"1","bzotech_bg_breadcrumb":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/bg-breadcrumb.png","id":"3610","height":"398","width":"1920","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/\/bg-breadcrumb-150x150.png"},"breadcrumb_page":"7748","bzotech_404_page":"","bzotech_404_page_style":"","show_preload":"0","preload_bg":{"color":"","alpha":"1","rgba":""},"preload_style":"style4","preload_image":{"url":"","id":"","height":"","width":"","thumbnail":""},"show_scroll_top":"2","show_wishlist_notification":"","show_too_panel":"0","tool_panel_page":"8186","after_append_footer":"11393","body_bg":{"color":"","alpha":"1","rgba":""},"body_typo":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"","line-height":"","color":""},"title_typo":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","color":""},"main_color":{"color":"","alpha":"","rgba":""},"main_color2":{"color":"","alpha":"","rgba":""},"bzotech_thumbnail_default":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder.png","id":"14357","height":"1200","width":"1200","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder-150x150.png"},"bzotech_page_style":"","container_width":"","post_single_share":{"post":"1","page":"","product":"1"},"post_single_share_list":[{"title":" Facebook","social":"facebook","number":"0"},{"title":" Twitter","social":"twitter","number":"0"},{"title":" Pinterest","social":"pinterest","number":"0"},{"title":" Email","social":"envelope","number":"0"}],"session_page":"0","ajax_security":"0","bzotech_sidebar_position_page":"no","bzotech_sidebar_page":"","bzotech_sidebar_style_page":"default","bzotech_sidebar_position_page_archive":"right","bzotech_sidebar_page_archive":"blog-sidebar","bzotech_sidebar_style_archive":"default","bzotech_sidebar_position_page_search":"","bzotech_sidebar_page_search":"","bzotech_sidebar_style_search":"default","bzotech_add_sidebar":[{"title":"","widget_title_heading":"h3"}],"bzotech_sidebar_position_woo":"left","bzotech_sidebar_woo":"woocommerce-sidebar","bzotech_sidebar_style_woo":"style2","shop_default_style":"grid","shop_gap_product":"","woo_shop_number":"12","sv_set_time_woo":"176","shop_style":"","shop_ajax":"0","shop_thumb_animation":"rotate-thumb","shop_number_filter":"0","shop_number_filter_list":[{"number":""}],"shop_type_filter":"1","shop_order_filter":"1","shop_attribute_color":"","show_quick_view":"1","quick_view_style":"","shop_list_size":"","shop_list_item_style":"","shop_grid_column":"3","shop_grid_size":"","shop_grid_item_style":"style6","item_thumbnail":"","item_quickview":"","item_title":"","item_rate":"","item_button":"","item_label":"","item_countdown":"yes","item_brand":"","item_gallery_hover":"","item_flash_sale":"yes","shop_grid_type":"","cart_page_style":"style2","checkout_page_style":"style2","bzotech_header_page_woo":"","bzotech_footer_page_woo":"","before_append_woo":"7748","after_append_woo":"","brand_woo":"1","sv_style_woo_single":"style-gallery-horizontal","sv_sidebar_position_woo_single":"no","sv_sidebar_woo_single":"","bzotech_sidebar_style_woo_single":"default","product_image_zoom":"zoom-style2","product_tab_detail":"tab-product-horizontal","show_excerpt":"1","share_whatsapp":"1","show_latest":"0","show_upsell":"0","show_related":"1","bzotech_product_sticky_addcart":"1","show_single_number":"8","show_single_size":"","show_single_itemres":"0:2,480:2,768:3,1200:4","show_single_item_style":"style6","before_append_woo_single":"7748","before_append_tab":"","after_append_tab":"","after_append_woo_single":"","append_content_summary":"9215","content_summary_pos":"60","before_append_post":"7748","after_append_post":"","bzotech_sidebar_position_blog":"right","bzotech_sidebar_blog":"","bzotech_sidebar_style_blog":"","blog_default_style":"grid","blog_style":"","blog_number_filter":"0","blog_number_filter_list":[{"title":"9","number":"9"},{"title":" 12","number":" 12"},{"title":" 15","number":" 15"}],"blog_type_filter":"0","blog_order_filter":"0","post_list_item_style":"","item_thumbnail_post_list":"","post_list_size":"","item_title_post_list":"","item_meta_post_list":"","item_excerpt_post_list":"","post_list_excerpt":"999","item_button_post_list":"","post_grid_column":"2","post_grid_item_style":"","post_grid_type":"","item_thumbnail_post":"","post_grid_size":"","item_title_post":"","item_meta_post":"","item_excerpt_post":"","post_grid_excerpt":"999","item_button_post":"","bzotech_style_post_detail":"","bzotech_sidebar_position_post":"right","bzotech_sidebar_post":"blog-sidebar","bzotech_sidebar_style_post":"default","before_append_post_detail":"7748","after_append_post_detail":"","post_single_thumbnail":"1","post_single_size":"","post_single_meta":"","post_single_author":"0","post_single_navigation":"0","post_single_related":"0","post_single_related_title":"Related posts","post_single_related_number":"6","post_single_related_item":"0:1,991:2,1366:3","post_single_related_item_style":"","redux-backup":1}',
            '15'=>'{"last_tab":"","bzotech_header_page":"20705","bzotech_footer_page":"20709","bzotech_show_breadrumb":"0","bzotech_bg_breadcrumb":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/bg-breadcrumb.png","id":"3610","height":"398","width":"1920","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/\/bg-breadcrumb-150x150.png"},"breadcrumb_page":"7748","bzotech_404_page":"","bzotech_404_page_style":"","show_preload":"0","preload_bg":{"color":"","alpha":"1","rgba":""},"preload_style":"style4","preload_image":{"url":"","id":"","height":"","width":"","thumbnail":""},"show_scroll_top":"2","show_wishlist_notification":"","show_too_panel":"0","tool_panel_page":"8186","after_append_footer":"11393","body_bg":{"color":"","alpha":"1","rgba":""},"body_typo":{"font-family":"Poppins","font-options":"","google":"true","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"14px","line-height":"24px","color":""},"title_typo":{"font-family":"Roboto Slab","font-options":"","google":"true","font-weight":"","font-style":"","color":""},"main_color":{"color":"#f05400","alpha":"1","rgba":"rgba(240,84,0,1)"},"main_color2":{"color":"#f05400","alpha":"1","rgba":"rgba(240,84,0,1)"},"bzotech_thumbnail_default":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder.png","id":"14357","height":"1200","width":"1200","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder-150x150.png"},"bzotech_page_style":"","container_width":"","post_single_share":{"post":"1","page":"","product":"1"},"post_single_share_list":[{"title":" Facebook","social":"facebook","number":"0"},{"title":" Twitter","social":"twitter","number":"0"},{"title":" Pinterest","social":"pinterest","number":"0"},{"title":" Email","social":"envelope","number":"0"}],"session_page":"0","ajax_security":"0","bzotech_sidebar_position_page":"no","bzotech_sidebar_page":"","bzotech_sidebar_style_page":"default","bzotech_sidebar_position_page_archive":"right","bzotech_sidebar_page_archive":"blog-sidebar","bzotech_sidebar_style_archive":"default","bzotech_sidebar_position_page_search":"","bzotech_sidebar_page_search":"","bzotech_sidebar_style_search":"default","bzotech_add_sidebar":[{"title":"","widget_title_heading":"h3"}],"bzotech_sidebar_position_woo":"left","bzotech_sidebar_woo":"woocommerce-sidebar","bzotech_sidebar_style_woo":"style2","shop_default_style":"grid","shop_gap_product":"","woo_shop_number":"12","sv_set_time_woo":"176","shop_style":"","shop_ajax":"0","shop_thumb_animation":"rotate-thumb","shop_number_filter":"0","shop_number_filter_list":[{"number":""}],"shop_type_filter":"1","shop_order_filter":"1","shop_attribute_color":"","show_quick_view":"1","quick_view_style":"","shop_list_size":"","shop_list_item_style":"","shop_grid_column":"3","shop_grid_size":"","shop_grid_item_style":"style13","item_thumbnail":"","item_quickview":"","item_title":"","item_rate":"","item_button":"","item_label":"","item_countdown":"yes","item_brand":"","item_gallery_hover":"","item_flash_sale":"yes","shop_grid_type":"","cart_page_style":"style2","checkout_page_style":"style2","bzotech_header_page_woo":"","bzotech_footer_page_woo":"","before_append_woo":"7748","after_append_woo":"","brand_woo":"1","sv_style_woo_single":"style-gallery-horizontal","sv_sidebar_position_woo_single":"no","sv_sidebar_woo_single":"","bzotech_sidebar_style_woo_single":"default","product_image_zoom":"zoom-style2","product_tab_detail":"tab-product-horizontal","show_excerpt":"1","share_whatsapp":"1","show_latest":"0","show_upsell":"0","show_related":"1","bzotech_product_sticky_addcart":"1","show_single_number":"8","show_single_size":"","show_single_itemres":"0:2,480:2,768:3,1200:4","show_single_item_style":"style13","before_append_woo_single":"7748","before_append_tab":"","after_append_tab":"","after_append_woo_single":"","append_content_summary":"9215","content_summary_pos":"60","before_append_post":"7748","after_append_post":"","bzotech_sidebar_position_blog":"right","bzotech_sidebar_blog":"","bzotech_sidebar_style_blog":"","blog_default_style":"grid","blog_style":"","blog_number_filter":"0","blog_number_filter_list":[{"title":"9","number":"9"},{"title":" 12","number":" 12"},{"title":" 15","number":" 15"}],"blog_type_filter":"0","blog_order_filter":"0","post_list_item_style":"","item_thumbnail_post_list":"","post_list_size":"","item_title_post_list":"","item_meta_post_list":"","item_excerpt_post_list":"","post_list_excerpt":"999","item_button_post_list":"","post_grid_column":"2","post_grid_item_style":"","post_grid_type":"","item_thumbnail_post":"","post_grid_size":"","item_title_post":"","item_meta_post":"","item_excerpt_post":"","post_grid_excerpt":"999","item_button_post":"","bzotech_style_post_detail":"","bzotech_sidebar_position_post":"right","bzotech_sidebar_post":"blog-sidebar","bzotech_sidebar_style_post":"default","before_append_post_detail":"7748","after_append_post_detail":"","post_single_thumbnail":"1","post_single_size":"","post_single_meta":"","post_single_author":"0","post_single_navigation":"0","post_single_related":"0","post_single_related_title":"Related posts","post_single_related_number":"6","post_single_related_item":"0:1,991:2,1366:3","post_single_related_item_style":"","redux-backup":1}',
            '16'=>'{"last_tab":"1","bzotech_header_page":"20776","bzotech_footer_page":"20782","bzotech_show_breadrumb":"0","bzotech_bg_breadcrumb":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/bg-breadcrumb.png","id":"3610","height":"398","width":"1920","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/\/bg-breadcrumb-150x150.png"},"breadcrumb_page":"7748","bzotech_404_page":"","bzotech_404_page_style":"","show_preload":"0","preload_bg":{"color":"","alpha":"1","rgba":""},"preload_style":"style4","preload_image":{"url":"","id":"","height":"","width":"","thumbnail":""},"show_scroll_top":"2","show_wishlist_notification":"","show_too_panel":"0","tool_panel_page":"8186","after_append_footer":"11393","body_bg":{"color":"","alpha":"1","rgba":""},"body_typo":{"font-family":"Urbanist","font-options":"","google":"true","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"","line-height":"","color":""},"title_typo":{"font-family":"Urbanist","font-options":"","google":"true","font-weight":"","font-style":"","color":"#262626"},"main_color":{"color":"#034b4c","alpha":"1","rgba":"rgba(3,75,76,1)"},"main_color2":{"color":"#f08000","alpha":"1","rgba":"rgba(240,128,0,1)"},"bzotech_thumbnail_default":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder.png","id":"14357","height":"1200","width":"1200","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder-150x150.png"},"bzotech_page_style":"","container_width":"","post_single_share":{"post":"1","page":"","product":"1"},"post_single_share_list":[{"title":" Facebook","social":"facebook","number":"0"},{"title":" Twitter","social":"twitter","number":"0"},{"title":" Pinterest","social":"pinterest","number":"0"},{"title":" Email","social":"envelope","number":"0"}],"session_page":"0","ajax_security":"0","bzotech_sidebar_position_page":"no","bzotech_sidebar_page":"","bzotech_sidebar_style_page":"default","bzotech_sidebar_position_page_archive":"right","bzotech_sidebar_page_archive":"blog-sidebar","bzotech_sidebar_style_archive":"default","bzotech_sidebar_position_page_search":"","bzotech_sidebar_page_search":"","bzotech_sidebar_style_search":"default","bzotech_add_sidebar":[{"title":"","widget_title_heading":"h3"}],"bzotech_sidebar_position_woo":"left","bzotech_sidebar_woo":"woocommerce-sidebar","bzotech_sidebar_style_woo":"style2","shop_default_style":"grid","shop_gap_product":"","woo_shop_number":"12","sv_set_time_woo":"176","shop_style":"","shop_ajax":"0","shop_thumb_animation":"rotate-thumb","shop_number_filter":"0","shop_number_filter_list":[{"number":""}],"shop_type_filter":"1","shop_order_filter":"1","shop_attribute_color":"","show_quick_view":"1","quick_view_style":"","shop_list_size":"","shop_list_item_style":"","shop_grid_column":"3","shop_grid_size":"","shop_grid_item_style":"style14","item_thumbnail":"","item_quickview":"","item_title":"","item_rate":"","item_button":"","item_label":"","item_countdown":"yes","item_brand":"","item_gallery_hover":"","item_flash_sale":"yes","shop_grid_type":"","cart_page_style":"style2","checkout_page_style":"style2","bzotech_header_page_woo":"","bzotech_footer_page_woo":"","before_append_woo":"7748","after_append_woo":"","brand_woo":"1","sv_style_woo_single":"style-gallery-horizontal","sv_sidebar_position_woo_single":"no","sv_sidebar_woo_single":"","bzotech_sidebar_style_woo_single":"default","product_image_zoom":"zoom-style2","product_gallery_size":"","product_tab_detail":"tab-product-horizontal","show_excerpt":"1","share_whatsapp":"1","show_latest":"0","show_upsell":"0","show_related":"1","bzotech_product_sticky_addcart":"1","show_single_number":"8","show_single_size":"","show_single_itemres":"0:2,480:2,768:3,1200:4","show_single_item_style":"style6","before_append_woo_single":"7748","before_append_tab":"","after_append_tab":"","after_append_woo_single":"","append_content_summary":"9215","content_summary_pos":"60","before_append_post":"7748","after_append_post":"","bzotech_sidebar_position_blog":"right","bzotech_sidebar_blog":"","bzotech_sidebar_style_blog":"","blog_default_style":"grid","blog_style":"","blog_number_filter":"0","blog_number_filter_list":[{"title":"9","number":"9"},{"title":" 12","number":" 12"},{"title":" 15","number":" 15"}],"blog_type_filter":"0","blog_order_filter":"0","post_list_item_style":"","item_thumbnail_post_list":"","post_list_size":"","item_title_post_list":"","item_meta_post_list":"","item_excerpt_post_list":"","post_list_excerpt":"999","item_button_post_list":"","post_grid_column":"2","post_grid_item_style":"","post_grid_type":"","item_thumbnail_post":"","post_grid_size":"","item_title_post":"","item_meta_post":"","item_excerpt_post":"","post_grid_excerpt":"999","item_button_post":"","bzotech_style_post_detail":"","bzotech_sidebar_position_post":"right","bzotech_sidebar_post":"blog-sidebar","bzotech_sidebar_style_post":"default","before_append_post_detail":"7748","after_append_post_detail":"","post_single_thumbnail":"1","post_single_size":"","post_single_meta":"","post_single_author":"0","post_single_navigation":"0","post_single_related":"0","post_single_related_title":"Related posts","post_single_related_number":"6","post_single_related_item":"0:1,991:2,1366:3","post_single_related_item_style":"","redux-backup":1}',

            '17'=>'{"last_tab":"1","bzotech_header_page":"21050","bzotech_footer_page":"21052","bzotech_show_breadrumb":"0","bzotech_bg_breadcrumb":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/bg-breadcrumb.png","id":"3610","height":"398","width":"1920","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/2023\/02\/\/bg-breadcrumb-150x150.png"},"breadcrumb_page":"7748","bzotech_404_page":"","bzotech_404_page_style":"","show_preload":"0","preload_bg":{"color":"","alpha":"1","rgba":""},"preload_style":"style4","preload_image":{"url":"","id":"","height":"","width":"","thumbnail":""},"show_scroll_top":"2","show_wishlist_notification":"","show_too_panel":"0","tool_panel_page":"8186","after_append_footer":"11393","body_bg":{"color":"","alpha":"1","rgba":""},"body_typo":{"font-family":"Urbanist","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"","line-height":"","color":""},"title_typo":{"font-family":"Urbanist","font-options":"","google":"1","font-weight":"","font-style":"","color":"#262626"},"main_color":{"color":"#f8af2d","alpha":"1","rgba":"rgba(248,175,45,1)"},"main_color2":{"color":"#f8af2d","alpha":"1","rgba":"rgba(248,175,45,1)"},"bzotech_thumbnail_default":{"url":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder.png","id":"14357","height":"1200","width":"1200","thumbnail":"https:\/\/bw-medxtore-demo14.bzotech.com\/wp-content\/uploads\/woocommerce-placeholder-150x150.png"},"bzotech_page_style":"","container_width":"","post_single_share":{"post":"1","page":"","product":"1"},"post_single_share_list":[{"title":" Facebook","social":"facebook","number":"0"},{"title":" Twitter","social":"twitter","number":"0"},{"title":" Pinterest","social":"pinterest","number":"0"},{"title":" Email","social":"envelope","number":"0"}],"session_page":"0","ajax_security":"0","bzotech_sidebar_position_page":"no","bzotech_sidebar_page":"","bzotech_sidebar_style_page":"default","bzotech_sidebar_position_page_archive":"right","bzotech_sidebar_page_archive":"blog-sidebar","bzotech_sidebar_style_archive":"default","bzotech_sidebar_position_page_search":"","bzotech_sidebar_page_search":"","bzotech_sidebar_style_search":"default","bzotech_add_sidebar":[{"title":"","widget_title_heading":"h3"}],"bzotech_sidebar_position_woo":"left","bzotech_sidebar_woo":"woocommerce-sidebar","bzotech_sidebar_style_woo":"style2","shop_default_style":"grid","shop_gap_product":"","woo_shop_number":"12","sv_set_time_woo":"176","shop_style":"","shop_ajax":"0","shop_thumb_animation":"translate-thumb","shop_number_filter":"0","shop_number_filter_list":[{"number":""}],"shop_type_filter":"1","shop_order_filter":"1","shop_attribute_color":"","show_quick_view":"1","quick_view_style":"","shop_list_size":"","shop_list_item_style":"","shop_grid_column":"3","shop_grid_size":"","shop_grid_item_style":"style15","item_thumbnail":"","item_quickview":"","item_title":"","item_rate":"","item_button":"","item_label":"","item_countdown":"yes","item_brand":"","item_gallery_hover":"","item_flash_sale":"yes","shop_grid_type":"","cart_page_style":"style2","checkout_page_style":"style2","bzotech_header_page_woo":"","bzotech_footer_page_woo":"","before_append_woo":"7748","after_append_woo":"","brand_woo":"1","sv_style_woo_single":"style-gallery-horizontal","sv_sidebar_position_woo_single":"no","sv_sidebar_woo_single":"","bzotech_sidebar_style_woo_single":"default","product_image_zoom":"zoom-style4","product_gallery_size":"","product_tab_detail":"tab-product-horizontal","show_excerpt":"1","share_whatsapp":"1","show_latest":"0","show_upsell":"0","show_related":"1","bzotech_product_sticky_addcart":"1","show_single_number":"8","show_single_size":"","show_single_itemres":"0:2,480:2,768:3,1200:4","show_single_item_style":"style15","before_append_woo_single":"7748","before_append_tab":"","after_append_tab":"","after_append_woo_single":"","append_content_summary":"9215","content_summary_pos":"60","before_append_post":"7748","after_append_post":"","bzotech_sidebar_position_blog":"right","bzotech_sidebar_blog":"","bzotech_sidebar_style_blog":"","blog_default_style":"grid","blog_style":"","blog_number_filter":"0","blog_number_filter_list":[{"title":"9","number":"9"},{"title":" 12","number":" 12"},{"title":" 15","number":" 15"}],"blog_type_filter":"0","blog_order_filter":"0","post_list_item_style":"","item_thumbnail_post_list":"","post_list_size":"","item_title_post_list":"","item_meta_post_list":"","item_excerpt_post_list":"","post_list_excerpt":"999","item_button_post_list":"","post_grid_column":"2","post_grid_item_style":"","post_grid_type":"","item_thumbnail_post":"","post_grid_size":"","item_title_post":"","item_meta_post":"","item_excerpt_post":"","post_grid_excerpt":"999","item_button_post":"","bzotech_style_post_detail":"","bzotech_sidebar_position_post":"right","bzotech_sidebar_post":"blog-sidebar","bzotech_sidebar_style_post":"default","before_append_post_detail":"7748","after_append_post_detail":"","post_single_thumbnail":"1","post_single_size":"","post_single_meta":"","post_single_author":"0","post_single_navigation":"0","post_single_related":"0","post_single_related_title":"Related posts","post_single_related_number":"6","post_single_related_item":"0:1,991:2,1366:3","post_single_related_item_style":"","redux-backup":1}',

        ];
        $bzotech_config['import_widget'] = '{"blog-sidebar":{"categories-2":{"title":"Categories","count":0,"hierarchical":0,"dropdown":0},"bzotech_bloglistpostswidget-5":{"title":"NEW POSTS","posts_per_page":"4","style":"default","category":"0","order":"desc","order_by":"ID","image_size":"","number_row":"4"},"tag_cloud-2":{"title":"Tags","count":0,"taxonomy":"post_tag"}},"woocommerce-sidebar":{"bzotech_category_fillter-4":{"title":"CATEGORIES","category":["category-demo-01","category-demo-02","category-demo-03","category-demo-04","category-demo-05","category-demo-06","category-demo-07"]},"woocommerce_price_filter-3":{"title":"PRICE"},"bzotech_attribute_filter-7":{"title":"Color","attribute":"color"},"bzotech_attribute_filter-8":{"title":"SIZE","attribute":"size"},"bzotech_widget_product_slider-4":{"title":"TOP RATED PRODUCTS","number_post":"8","product_type":"toprate","title_category":"","bzotech_cart_blender":0,"bzotech_cart_cookwares":0,"bzotech_cart_egg-beater":0,"bzotech_cart_kitchenware":0,"bzotech_cart_pot":0,"bzotech_cart_rice-cooker":0,"bzotech_cart_toaster":0,"order_by":"none","order":"DESC","number_row":"4","image_size":""}}}';
        
        $bzotech_config['import_category'] = [
            '1'=>'',
        ];

        /**************************************** PLUGINS ****************************************/

        $bzotech_config['require-plugin-begin'] = array(
            array(
                'name'      => esc_html__( 'BZOTech Core', 'bw-medxtore-v2'),
                'slug'      => 'bzotech-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/bzotech-core.zip',
                'version'   => '1.8',
            ),
        );

        $bzotech_config['require-plugin'] = array(
            array(
                'name'      => esc_html__( 'BZOTech Core', 'bw-medxtore-v2'),
                'slug'      => 'bzotech-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/bzotech-core.zip',
                'version'   => '1.8',
            ),
            array(
                'name'      => esc_html__( 'BZOTech Elementor', 'bw-medxtore-v2'),
                'slug'      => 'bzotech-elementor',
                'required'  => true,
                'version'   => '1.8',
                'source'    =>get_template_directory().'/plugins/bzotech-elementor.zip',
            ),  
            array(
                'name'      => esc_html__( 'Revolution Slider', 'bw-medxtore-v2'),
                'slug'      => 'revslider',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/revslider.zip',
            ),            
            array(
                'name'      => esc_html__( 'elementor', 'bw-medxtore-v2'),
                'slug'      => 'elementor',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'Redux Framework', 'bw-medxtore-v2'),
                'slug'      => 'redux-framework',
                'required'  => true,
            ),
             array(
                'name'      => esc_html__( 'WooCommerce', 'bw-medxtore-v2'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'FOX – Currency Switcher Professional for WooCommerce', 'bw-medxtore-v2'),
                'slug'      => 'woocommerce-currency-switcher',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'bw-medxtore-v2'),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('MailChimp for WordPress Lite','bw-medxtore-v2'),
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),
            array(

                'name'      => esc_html__('Yith Woocommerce Compare','bw-medxtore-v2'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => false,
                'source'    =>get_template_directory().'/plugins/yith-woocommerce-compare.zip',
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','bw-medxtore-v2'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => false,
            ),
        );

    /**************************************** PLUGINS ****************************************/
        
        
    }
}
bzotech_set_theme_config();
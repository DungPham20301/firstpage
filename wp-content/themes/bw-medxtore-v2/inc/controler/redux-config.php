<?php
    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // Redux help function    
    if(!function_exists('bzotech_switch_redux_option')){
        function bzotech_switch_redux_option(){
            $bzotech_option_name = bzotech_get_option_name();
            // Basic Settings
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Basic Settings', 'bw-medxtore-v2' ),
                'id'               => 'basic',
                'icon'             => 'el el-home'
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'General', 'bw-medxtore-v2' ),
                'id'               => 'basic-general',
                'subsection'       => true,
                'fields'           => array(
                    
                    array(
                        'id'       => 'bzotech_header_page',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Header Page', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Select the header style. To edit/create header content, go to "Header Page" in Admin Dashboard. Note: this setting is applied for all pages; for single page setting, please go to each page to config.', 'bw-medxtore-v2' ),
                        //Must provide key => value pairs for select options
                        'options'  => bzotech_list_post_type('bzotech_header'),
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'bzotech_footer_page',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Footer Page', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Select the footer style. To edit/create footer content, go to "Footer Page" in Admin Dashboard. Note: this setting is applied for all pages; for single page setting, please go to each page to config."', 'bw-medxtore-v2' ),
                        //Must provide key => value pairs for select options
                        'options'  => bzotech_list_post_type('bzotech_footer'),
                        'default'  => ''
                    ),
                    array(
                        'id'       => 'bzotech_show_breadrumb',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Breadcrumb', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the breadcrumb.', 'bw-medxtore-v2' ),
                        'default'  => false,
                    ),
                    array(
                        'id'          => 'bzotech_bg_breadcrumb',
                        'type'        => 'media',
                        'title'       => esc_html__('Breadcrumb background image','bw-medxtore-v2'),
                        'desc'        => 'Select image.',
                        'url'          => false,
                        'required'   =>  array(
                            array('bzotech_show_breadrumb','=','1'),
                            array('breadcrumb_page','=',''),
                        ), 
                    ),

                    array(
                        'id'       => 'breadcrumb_page',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Custom breadcrumb page', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Select the custom breadcrumb page.', 'bw-medxtore-v2' ),
                        //Must provide key => value pairs for select options
                        'options'  => bzotech_list_post_type('bzotech_mega_item'),
                        'default'  => '',
                        'required'   =>  array('bzotech_show_breadrumb','=','1'),
                    ),

                    array(
                        'id'       => 'bzotech_404_page',
                        'type'     => 'select',
                        'title'    => esc_html__( '404 Page', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Select Mega Page inserts to the 404 page.', 'bw-medxtore-v2' ),
                        //Must provide key => value pairs for select options
                        'options'  => bzotech_list_post_type('bzotech_mega_item'),
                        'default'  => ''
                    ),
                    array( 
                        'id'       => 'bzotech_404_page_style',
                        'type'     => 'select',
                        'title'    => esc_html__( '404 Style', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Choose a style to display.', 'bw-medxtore-v2' ),
                        //Must provide key => value pairs for select options
                        'options'  => array(
                            ''           => esc_html__('Default','bw-medxtore-v2'),
                            'full-width' => esc_html__('FullWidth','bw-medxtore-v2'),
                        ),
                        'default'  => '',
                        'required' => array('bzotech_404_page','not','')
                    ),

                )
            ) );
            
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Preload', 'bw-medxtore-v2' ),
                'id'               => 'preload-general',
                'subsection'       => true,
                'fields'           => array(
                    array(
                        'id'       => 'show_preload',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Preload', 'bw-medxtore-v2' ),
                        'desc'     => esc_html__( 'Turn on or off the preload option.', 'bw-medxtore-v2' ),
                        'default'  => false,
                    ),
                    array(
                        'id'          => 'preload_bg',
                        'type'        => 'color_rgba',
                        'title'       => esc_html__('Background color','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Select the default preload background color.', 'bw-medxtore-v2' ),
                        'required'    => array('show_preload','=',true),
                    ),
                    array(
                        'id'          => 'preload_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Preload style','bw-medxtore-v2'),
                        'default'     => 'style2',
                        'options'     => array(
                            '' =>  esc_html__('Style 1','bw-medxtore-v2'),
                            'style2' =>  esc_html__('Style 2','bw-medxtore-v2'),
                            'style3' =>  esc_html__('Style 3','bw-medxtore-v2'),
                            'style4' =>  esc_html__('Style 4','bw-medxtore-v2'),
                            'style5' =>  esc_html__('Style 5','bw-medxtore-v2'),
                            'style6' =>  esc_html__('Style 6','bw-medxtore-v2'),
                            'style7' =>  esc_html__('Style 7','bw-medxtore-v2'),
                            'custom-image' =>  esc_html__('Custom image','bw-medxtore-v2'),
                        ),
                        'desc'        => esc_html__( 'Select the preload style.', 'bw-medxtore-v2' ),
                        'required'    => array('show_preload','=',true),
                    ),
                    array(
                        'id'          => 'preload_image',
                        'type'        => 'media',
                        'title'       => esc_html__('Preload image','bw-medxtore-v2'),
                        'desc'        => 'Select image.',
                        'url'          => false,
                        'required'   =>  array('preload_style','=','custom-image'),
                    ),
                )
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Other', 'bw-medxtore-v2' ),
                'id'               => 'other-general',
                'subsection'       => true,
                'fields'           => array(
                    array(
                        'id'        => 'show_scroll_top',
                        'type'        => 'select',
                        'options'     => array(
                            '' =>  esc_html__('Off','bw-medxtore-v2'),
                            '1' =>  esc_html__('Style 1','bw-medxtore-v2'),
                            '2' =>  esc_html__('Style 2','bw-medxtore-v2'),
                        ),
                        'title'     => esc_html__('Scroll to Top button', 'bw-medxtore-v2'),
                        'desc'      => esc_html__('Show or hide scroll to top button.', 'bw-medxtore-v2'),
                        'default'   => ''
                    ),
                    array(
                        'id'        => 'show_wishlist_notification',
                        'type'      => 'switch',
                        'title'     => esc_html__('Wislist notififcation', 'bw-medxtore-v2'),
                        'desc'      => esc_html__('Show or hide notification after adding product to wishlist.', 'bw-medxtore-v2'),
                        'default'   => false
                    ),
                    array(
                        'id'        => 'show_too_panel',
                        'type'      => 'switch',
                        'title'     => esc_html__('Tool panel', 'bw-medxtore-v2'),
                        'desc'      => esc_html__('Show or hide sidebar tool panels.', 'bw-medxtore-v2'),
                        'default'   => false
                    ),
                    array(
                        'id'          => 'tool_panel_page',
                        'type'        => 'select',
                        'title'       => esc_html__( 'Choose tool panel page', 'bw-medxtore-v2' ),
                        'desc'        => esc_html__( 'Choose a mega page to display.', 'bw-medxtore-v2' ),
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                        'required'   =>  array('show_too_panel','=',true),
                    ),
                    array(
                        'id'          => 'after_append_footer',
                        'type'        => 'select',
                        'title'       => esc_html__( 'Append content after footer', 'bw-medxtore-v2' ),
                        'desc'        => esc_html__( 'Choose a mega page content append to after main content of footer', 'bw-medxtore-v2' ),
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                    ),
                    array(
                        'id'          => 'body_bg',
                        'type'        => 'color_rgba',
                        'title'       => esc_html__('Body background color','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Change the default body background color.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'body_typo',
                        'type'        => 'typography',
                        'title'       => esc_html__('Body typography','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Custom the body font.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'title_typo',
                        'type'        => 'typography',
                        'title'       => esc_html__('Title typography','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Custom font in Title.', 'bw-medxtore-v2' ),
                        'font-weight'=>false,
                        'font-size'=>false,
                        'color'=>true,
                        'line-height'=>false,
                        'text-align'=>false,
                        'subsets'=>false,
                    ),
                    array(
                        'id'          => 'main_color',
                        'type'        => 'color_rgba',
                        'title'       => esc_html__('Main color','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Change the website main color.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'main_color2',
                        'type'        => 'color_rgba',
                        'title'       => esc_html__('Main color 2','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Change main color 2 of your site.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'bzotech_thumbnail_default',
                        'type'        => 'media',
                        'title'       => esc_html__('Thumbnail default','bw-medxtore-v2'),
                        'desc'        => 'Select image default.',
                        'url'          => false,
                    ),
                    array(
                        'id'          => 'bzotech_page_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Page Style','bw-medxtore-v2'),
                        'default'     => '',
                        'options'     => array(
                            'page-content-df' =>  esc_html__('Default','bw-medxtore-v2'),
                            'page-content-box' =>  esc_html__('Page boxed','bw-medxtore-v2'),
                        ),
                        'desc'        => esc_html__( 'Select the default style for pages.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'container_width',
                        'type'        => 'text',
                        'title'       => esc_html__('Custom container width (px)','bw-medxtore-v2'),
                        'desc'        => esc_html__( 'Set width for the website container. Default is 1650px.', 'bw-medxtore-v2' ),
                    ),
                     array(
                        'id'          => 'post_single_share',
                        'title'       => esc_html__('Show social share box','bw-medxtore-v2'),
                        'type'        => 'checkbox',
                        'options'  => array(
                            'post' => esc_html__('Post','bw-medxtore-v2'),
                            'page' => esc_html__('Page','bw-medxtore-v2'),
                            'product' => esc_html__('Product','bw-medxtore-v2'),
                        ),
                        'desc'        => esc_html__( 'Select to show social share box for post, page or product pages.', 'bw-medxtore-v2' ),
                    ),
                    array(
                        'id'          => 'post_single_share_list',
                        'title'       => esc_html__('Custom social share box','bw-medxtore-v2'),
                        'type'        => 'repeater',
                        'fields'    => array( 
                            array(
                                'id'       => 'title',
                                'type'     => 'text',
                                'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                            ),
                            array(
                                'id'          => 'social',
                                'title'       => esc_html__('Social','bw-medxtore-v2'),
                                'type'        => 'select',
                                'options'     => array(
                                    'total'    => esc_html__('Total share','bw-medxtore-v2'),
                                    'facebook'  => esc_html__('Facebook','bw-medxtore-v2'),
                                    'twitter' => esc_html__('Twitter','bw-medxtore-v2'),
                                    'pinterest' => esc_html__('Pinterest','bw-medxtore-v2'),
                                    'linkedin' => esc_html__('Linkedin','bw-medxtore-v2'),
                                    'tumblr' => esc_html__('Tumblr','bw-medxtore-v2'),
                                    'envelope' => esc_html__('Mail','bw-medxtore-v2'),
                                ),
                                
                            ),
                            array(
                                'id'          => 'number',
                                'title'       => esc_html__('Show number','bw-medxtore-v2'),
                                'type'        => 'switch',
                                'default'         => '0',
                            ),
                        ),
                    ),
                    
                    array(
                        'id'        => 'session_page',
                        'type'      => 'switch',
                        'title'     => esc_html__('Session option', 'bw-medxtore-v2'),
                        'default'   => false
                    ),
                    array(
                        'id'        => 'ajax_security',
                        'type'      => 'switch',
                        'title'     => esc_html__('Ajax security', 'bw-medxtore-v2'),
                        'default'   => true,
                        'desc'        => esc_html__( 'Check ajax referer for security. If you are using caching, enabling this function may cause ajax to not work', 'bw-medxtore-v2' ),
                    ),
                )
            ) );
            // End Basic Settings
            // Layout Settings
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Layout Settings', 'bw-medxtore-v2' ),
                'id'               => 'layout',
                'icon'             => 'el el-indent-left',
                'fields'           => array(
                    array(
                        'id'          => 'bzotech_sidebar_position_page',
                        'type'        => 'select',
                        'title'       => esc_html__('Page sidebar position','bw-medxtore-v2'),
                        'desc'        => esc_html__('Set the sidebar position for the website  pages.','bw-medxtore-v2'),
                        'options'     => array(
                            'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                            'left'  => esc_html__('Left','bw-medxtore-v2'),
                            'right' => esc_html__('Right','bw-medxtore-v2'),
                        ),
                        'default'     => ''
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_page',
                        'type'        => 'select',
                        'title'       => esc_html__('Select Sidebar','bw-medxtore-v2'),
                        'data'        => 'sidebars',
                        'required'    => array(
                            array('bzotech_sidebar_position_page','not','no'),
                            array('bzotech_sidebar_position_page','not',''),
                        ),
                        'desc'        => esc_html__('Select the sidebar to display for the website page.','bw-medxtore-v2'),
                        'default'     => ''
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_style_page',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar style for the website page.','bw-medxtore-v2'),
                        'options'     => array(
                            'default'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                        ),
                        'required'    => array(
                            array('bzotech_sidebar_position_page','not','no'),
                            array('bzotech_sidebar_position_page','not',''),
                        ), 
                        'default'     => 'default'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_position_page_archive',
                        'type'        => 'select',
                        'title'       => esc_html__('Select archives page sidebar','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar to display for the archives page.','bw-medxtore-v2'),
                        'options'     => array(
                            'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                            'left'  => esc_html__('Left','bw-medxtore-v2'),
                            'right' => esc_html__('Right','bw-medxtore-v2'),
                        ),
                        'default'     => 'right'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_page_archive',
                        'type'        => 'select',
                        'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                        'data'        => 'sidebars',
                        'required'    => array(
                            array('bzotech_sidebar_position_page_archive','not','no'),
                            array('bzotech_sidebar_position_page_archive','not',''),
                        ),
                        'desc'        => esc_html__('Select the sidebar to display for the archive page.','bw-medxtore-v2'),
                        'default'     => 'blog-sidebar'
                    ),
                     array(
                        'id'          => 'bzotech_sidebar_style_archive',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar style for the archive page.','bw-medxtore-v2'),
                        'options'     => array(
                            'default'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                        ),
                        'required'    => array(
                            array('bzotech_sidebar_position_page_archive','not','no'),
                            array('bzotech_sidebar_position_page_archive','not',''),
                        ), 
                        'default'     => 'default'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_position_page_search',
                        'type'        => 'select',
                        'title'       => esc_html__('Search page sidebar position','bw-medxtore-v2'),
                        'desc'        => esc_html__('Set the sidebar position for the search page.','bw-medxtore-v2'),
                        'options'     => array(
                            'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                            'left'  => esc_html__('Left','bw-medxtore-v2'),
                            'right' => esc_html__('Right','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_page_search',
                        'type'        => 'select',
                        'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                        'data'        => 'sidebars',
                        'required'    => array(
                            array('bzotech_sidebar_position_page_search','not','no'),
                            array('bzotech_sidebar_position_page_search','not',''),
                        ),
                        'desc'        => esc_html__('Select the sidebar to display for the search page.','bw-medxtore-v2'),
                    ),    
                    array(
                        'id'          => 'bzotech_sidebar_style_search',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar style for the search page','bw-medxtore-v2'),
                        'options'     => array(
                            'default'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                        ),
                        'required'    => array(
                            array('bzotech_sidebar_position_page_search','not','no'),
                            array('bzotech_sidebar_position_page_search','not',''),
                        ), 
                        'default'     => 'default'
                    ),          
                    array(
                        'id'          => 'bzotech_add_sidebar',
                        'title'       => esc_html__('Add SideBar','bw-medxtore-v2'),
                        'type'        => 'repeater',
                        'default'     => '',
                        'fields'    => array( 
                            array(
                                'id'       => 'title',
                                'type'     => 'text',
                                'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                            ),
                            array(
                                'id'          => 'widget_title_heading',
                                'type'        => 'select',
                                'title'       => esc_html__('Set widget heading style','bw-medxtore-v2'),
                                'default'     => 'h3',
                                'options'     => array(
                                    'h1' => esc_html__('H1','bw-medxtore-v2'),
                                    'h2' => esc_html__('H2','bw-medxtore-v2'),
                                    'h3' => esc_html__('H3','bw-medxtore-v2'),
                                    'h4' => esc_html__('H4','bw-medxtore-v2'),
                                    'h5' => esc_html__('H5','bw-medxtore-v2'),
                                    'h6' => esc_html__('H6','bw-medxtore-v2'),
                                )
                            )
                            
                        ),
                    ),
                )
            ) );
            // End Layout Settings
 
         
            if(class_exists("woocommerce")){
                // Shop
                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Shop', 'bw-medxtore-v2' ),
                    'id'               => 'shop',
                    'icon'             => 'el el-shopping-cart'
                ) );
                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'General', 'bw-medxtore-v2' ),
                    'id'               => 'general-shop',
                    'subsection'       => true,
                    'fields'           => array(
                       
                        array(
                            'id'          => 'bzotech_sidebar_position_woo',
                            'type'        => 'select',
                            'title'       => esc_html__('Sidebar position','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the sidebar position for the WooCommerce pages (Shop, Checkout, Cart, My Account, Product category/tag/taxonomy page...). Left, Right, or No sidebar.','bw-medxtore-v2'),
                            'options'     => array(
                                'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                                'left'  => esc_html__('Left','bw-medxtore-v2'),
                                'right' => esc_html__('Right','bw-medxtore-v2'),
                            ),
                            'default'  => 'right'
                        ),
                        array(
                            'id'          => 'bzotech_sidebar_woo',
                            'type'        => 'select',
                            'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                            'data'        => 'sidebars',
                            'required'    => array(
                                array('bzotech_sidebar_position_woo','not','no'),
                                array('bzotech_sidebar_position_woo','not',''),
                            ),
                            'desc'        => esc_html__('Select the sidebar to display for WooCommerce pages','bw-medxtore-v2'),
                            'default'  => 'blog-sidebar'
                        ),
                        array(
                            'id'          => 'bzotech_sidebar_style_woo',
                            'type'        => 'select',
                            'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the sidebar style for the shop page','bw-medxtore-v2'),
                            'options'     => array(
                                'default'    => esc_html__('Default','bw-medxtore-v2'),
                                'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                            ),
                            'required'    => array(
                                array('bzotech_sidebar_position_woo','not','no'),
                                array('bzotech_sidebar_position_woo','not',''),
                            ), 
                            'default'     => 'default'
                        ),   
                        array(
                            'id'          => 'shop_default_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Default style','bw-medxtore-v2'),
                            'desc'=>esc_html__('Set the default style for the shop page: list view or grid view.','bw-medxtore-v2'),
                            'options'     => array(                        
                                'grid'  => esc_html__('Grid','bw-medxtore-v2'),
                                'list'  => esc_html__('List','bw-medxtore-v2'),
                            ),
                            'default'  => 'grid'
                        ),
                        array(
                            'id'          => 'shop_gap_product',
                            'type'        => 'select',
                            'title'       => esc_html__('Gap products','bw-medxtore-v2'),
                            'desc'=>esc_html__('Set the space between the items on the shop page.','bw-medxtore-v2'),
                            'options'     => array(                        
                                ''          => esc_html__('Default','bw-medxtore-v2'),
                                'gap-0'     => esc_html__('0','bw-medxtore-v2'),
                                'gap-5'     => esc_html__('5px','bw-medxtore-v2'),
                                'gap-10'    => esc_html__('10px','bw-medxtore-v2'),
                                'gap-15'    => esc_html__('15px','bw-medxtore-v2'),
                                'gap-20'    => esc_html__('20px','bw-medxtore-v2'),
                                'gap-30'    => esc_html__('30px','bw-medxtore-v2'),
                                'gap-40'    => esc_html__('40px','bw-medxtore-v2'),
                                'gap-50'    => esc_html__('50px','bw-medxtore-v2'),
                            ),
                        ),
                        array(
                            'id'          => 'woo_shop_number',
                            'type'        => 'slider',
                            'title'       => esc_html__('Product number','bw-medxtore-v2'),
                            'min'         => 0,
                            'max'         => 999,
                            'step'        => 1,
                            'default'     => 12,
                            'desc'        => esc_html__('Set the number of product to display per page. Default is 12.','bw-medxtore-v2')
                        ),
                        array(
                            'id'          => 'sv_set_time_woo',
                            'type'        => 'slider',
                            'title'       => esc_html__('New product','bw-medxtore-v2'),
                            'min'         => 0,
                            'max'         => 999,
                            'step'        => 1,
                            'default'     => 0,
                            'desc'        => esc_html__('Set time for new products. Unit is day. Default is 0.','bw-medxtore-v2')
                        ),
                        array(
                            'id'          => 'shop_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Shop pagination','bw-medxtore-v2'),
                            'desc'=>esc_html__('Select the pagination style for the shop page.','bw-medxtore-v2'),
                            'options'     => array(
                                ''          => esc_html__('Default','bw-medxtore-v2'),
                                'load-more' => esc_html__('Load more','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'shop_ajax',
                            'type'        => 'switch',
                            'title'       => esc_html__('Shop ajax','bw-medxtore-v2'),
                            'default'     => false,
                            'desc'        => esc_html__('Enable or disable ajax process for the shop page.','bw-medxtore-v2'),
                            'default'     => false
                        ),
                        array(
                            'id'          => 'shop_thumb_animation',
                            'type'        => 'select',
                            'title'       => esc_html__('Thumbnail animation','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the animation for product thumnail.','bw-medxtore-v2'),
                            'options'     => bzotech_get_product_thumb_animation()
                        ),
                        array(
                            'id'          => 'shop_number_filter',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show number filter','bw-medxtore-v2'),
                            'desc'        => esc_html__('Show or hide number filter on shop page.','bw-medxtore-v2'),
                            'default'     => false,
                        ),
                        array(
                            'id'          => 'shop_number_filter_list',
                            'type'        => 'repeater',
                            'title'       => esc_html__('Add number list for filter','bw-medxtore-v2'),
                            'desc'        => esc_html__('Add the number list to filter on the shop page.','bw-medxtore-v2'),
                            'fields'      => array(
                                array(
                                    'id'          => 'number',
                                    'type'        => 'text',
                                    'title'       => esc_html__('Number','bw-medxtore-v2'),
                                ),
                            ),
                            'required'   => array('shop_number_filter','not',false),
                            'default'  => ''
                        ),
                        array(
                            'id'          => 'shop_type_filter',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show type filter','bw-medxtore-v2'),
                            'desc'        => esc_html__('Show or hide type filter (list/grid) on the shop page.','bw-medxtore-v2'),
                            'default'     => false,
                        ),
                        array(
                            'id'          => 'shop_order_filter',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show order filter','bw-medxtore-v2'),
                            'desc'        => esc_html__('Show or hide order filter on the shop page.','bw-medxtore-v2'),
                            'default'     => false,
                        ),

                        array(
                            'id'          => 'shop_attribute_color',
                            'title'       => esc_html__('Show color attribute','bw-medxtore-v2'),
                            'desc'        => esc_html__('Show or hide color attribute on the product list.','bw-medxtore-v2'),
                            'type'        => 'switch',
                            'section'     => 'option_woo',
                            'default'     => false,
                        ),
                        array(
                            'id'          => 'show_quick_view',
                            'title'       => esc_html__('Quick view button','bw-medxtore-v2'),
                            'type'        => 'switch',
                            'section'     => 'option_woo',
                            'default'     => false,
                        ),
                        array(
                            'id'          => 'quick_view_style',
                            'title'       => esc_html__('Quick view style','bw-medxtore-v2'),
                            'type'        => 'select',
                            'section'     => 'option_woo',
                            'desc'        => esc_html__('Select the style for quickview.','bw-medxtore-v2'),
                            'default'         => '',
                            'condition'   => 'show_quick_view:is(1)',
                            'options'     => array(
                                ''          => esc_html__('Default','bw-medxtore-v2'),
                                'load-more' => esc_html__('Style 1 (default)','bw-medxtore-v2'),
                            )
                        ),
                    )
                ) );
                
                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'List View Settings', 'bw-medxtore-v2' ),
                    'id'               => 'list-shop',
                    'subsection'       => true,
                    'fields'           => array(
                        array(
                            'id'          => 'shop_list_size',
                            'type'        => 'text',
                            'title'       => esc_html__('Custom thumbnail size','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the thumbnail size to crop in px. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2')
                        ),
                        array(
                            'id'          => 'shop_list_item_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Item style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the item style.','bw-medxtore-v2'),
                            'options'     => bzotech_get_product_list_style()
                        ),
                    )
                ) );

                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Grid View Settings', 'bw-medxtore-v2' ),
                    'id'               => 'grid-shop',
                    'subsection'       => true,
                    'fields'           => array(
                        array(
                            'id'          => 'shop_grid_column',
                            'type'        => 'select',
                            'title'       => esc_html__('Grid column','bw-medxtore-v2'),
                            'default'     => '3',
                            'desc'        => esc_html__('Select the number of column to show.','bw-medxtore-v2'),
                            'options'     => array(
                                '2'     => esc_html__('2 column','bw-medxtore-v2'),
                                '3'     => esc_html__('3 column','bw-medxtore-v2'),
                                '4'     => esc_html__('4 column','bw-medxtore-v2'),
                                '5'     => esc_html__('5 column','bw-medxtore-v2'),
                                '6'     => esc_html__('6 column','bw-medxtore-v2'),
                                '7'     => esc_html__('7 column','bw-medxtore-v2'),
                                '8'     => esc_html__('8 column','bw-medxtore-v2'),
                                '9'     => esc_html__('9 column','bw-medxtore-v2'),
                                '10'    => esc_html__('10 column','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'shop_grid_size',
                            'type'        => 'text',
                            'title'       => esc_html__('Custom thumbnail size','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the thumbnail size to crop in px. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2')
                        ),
                        array(
                            'id'          => 'shop_grid_item_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Item style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the item style.','bw-medxtore-v2'),
                            'options'     => bzotech_get_product_style()
                        ),
                        array(
                            'id'       => 'item_thumbnail',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Thumbnail', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the thumbnail.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_quickview',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Quickview', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the quickview.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_title',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the title.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_rate',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Rate', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the rate.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_button',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Button add to cart', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the button add to cart .', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_label',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Label', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the label (Label sale, label new...).', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_countdown',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Countdown price', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the countdown by reduced price.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_brand',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Show Brand', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the Brand.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_gallery_hover',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Show Gallery Images', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the Gallery Images.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'       => 'item_flash_sale',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Flash Sale', 'bw-medxtore-v2' ),
                            'desc' => esc_html__( 'Show or hide the Flash Sale bar.', 'bw-medxtore-v2' ),
                            'default'  => '',
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'yes'  => esc_html__('Show','bw-medxtore-v2'),
                                'no'  => esc_html__('Hide','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'shop_grid_type',
                            'type'        => 'select',
                            'title'       => esc_html__('Grid display','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the grid style.','bw-medxtore-v2'),
                            'options'     => array(
                                ''              => esc_html__('Default','bw-medxtore-v2'),
                                'grid-masonry'  => esc_html__('Masonry','bw-medxtore-v2'),
                            )
                        ),
                    )
                ) );

                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Advanced', 'bw-medxtore-v2' ),
                    'id'               => 'advanced-shop',
                    'subsection'       => true,
                    'fields'           => array(
                        array(
                            'id'          => 'cart_page_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Cart display','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the cart style.','bw-medxtore-v2'),
                            'options'     => array(
                                ''          => esc_html__('Default','bw-medxtore-v2'),
                                'style2'    => esc_html__('Style 2','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'checkout_page_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Checkout display','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the checkout style.','bw-medxtore-v2'),
                            'options'     => array(
                                ''          => esc_html__('Default','bw-medxtore-v2'),
                                'style2'    => esc_html__('Style 2','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'bzotech_header_page_woo',
                            'type'        => 'select',
                            'title'       => esc_html__( 'WooCommerce page header', 'bw-medxtore-v2' ),
                            'desc'        => esc_html__( 'Select the header style. To edit/create header content, go to Header Page in Admin Dashboard.
Note: this setting is applied for all pages; for single page setting, please go to each page to config.', 'bw-medxtore-v2' ),
                            'options'     => bzotech_list_post_type('bzotech_header')
                        ),
                        array(
                            'id'          => 'bzotech_footer_page_woo',
                            'type'        => 'select',
                            'title'       => esc_html__( 'WooCommerce page footer', 'bw-medxtore-v2' ),
                            'desc'        => esc_html__( 'Select the footer style. To edit/create footer content, go to Footer Page in Admin Dashboard.
Note: this setting is applied for all pages; for single page setting, please go to each page to config.', 'bw-medxtore-v2' ),
                            'options'     => bzotech_list_post_type('bzotech_footer')
                        ),
                        array(
                            'id'          => 'before_append_woo',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content before WooCommerce page','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'after_append_woo',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content after WooCommerce page','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'brand_woo',
                            'type'        => 'switch',
                            'title'       => esc_html__('Shop brand','bw-medxtore-v2'),
                            'desc'        => esc_html__('Enable or disable brand function.','bw-medxtore-v2'),
                            'default'     => 'false'
                        ),
                    )
                ) );
                // End Shop

                // Product
                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Product', 'bw-medxtore-v2' ),
                    'id'               => 'product',
                    'icon'             => 'el el-briefcase'
                ) );
                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'General', 'bw-medxtore-v2' ),
                    'id'               => 'general-product',
                    'subsection'       => true,
                    'fields'           => array(
                    array(
                        'id'          => 'sv_style_woo_single',
                        'title'       => esc_html__('Product detail style','bw-medxtore-v2'),
                        'type'        => 'select',
                        'section'     => 'option_product',
                        'default'         => 'style-gallery-horizontal',
                        'desc'        => esc_html__('Select style for the product detail.','bw-medxtore-v2'),
                        'options'     => array(
                                'style-gallery-horizontal'=> esc_html__('Style 1 (Gallery horizontal )','bw-medxtore-v2'),
                                'style-gallery-vertical' => esc_html__('Style 2 (Gallery vertical)','bw-medxtore-v2'),
                                'sticky-style1' => esc_html__('Style 3 (Gallery sticky)','bw-medxtore-v2'),
                                'sticky-style2' => esc_html__('Style 4 (Gallery sticky)','bw-medxtore-v2'),
                                'sticky-style3' => esc_html__('Style 5 (Gallery sticky)','bw-medxtore-v2'),
                                'style-gallery-horizontal2' => esc_html__('Style 6 (Gallery horizontal 2)','bw-medxtore-v2'),
                                'style-gallery-vertical2' => esc_html__('Style 7 (Gallery vertical 2)','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'sv_sidebar_position_woo_single',
                            'type'        => 'select',
                            'title'       => esc_html__('Sidebar position','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the sidebar position for the single product page.','bw-medxtore-v2'),
                            'default'         => 'no',
                            'options'     => array(
                                'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                                'left'  => esc_html__('Left','bw-medxtore-v2'),
                                'right' => esc_html__('Right','bw-medxtore-v2'),
                            ),
                        ),
                        array(
                            'id'          => 'sv_sidebar_woo_single',
                            'type'        => 'select',
                            'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                            'data'        => 'sidebars',
                            'required'    => array(
                                array('sv_sidebar_position_woo_single','not','no'),
                                array('sv_sidebar_position_woo_single','not',''),
                            ),
                            'desc'        => esc_html__('Select the sidebar for single product page.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'bzotech_sidebar_style_woo_single',
                            'type'        => 'select',
                            'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the sidebar style for the single product page.','bw-medxtore-v2'),
                            'options'     => array(
                                'default'    => esc_html__('Default','bw-medxtore-v2'),
                                'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                            ),
                            'required'    => array(
                                array('sv_sidebar_position_woo_single','not','no'),
                                array('sv_sidebar_position_woo_single','not',''),
                            ), 
                            'default'     => 'default'
                        ),  
                        array(
                            'id'          => 'product_image_zoom',
                            'type'        => 'select',
                            'title'       => esc_html__('Image zoom','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the image zoom style.','bw-medxtore-v2'),
                            'options'     => array(
                                ''              => esc_html__('None','bw-medxtore-v2'),
                                'zoom-style1'   => esc_html__('Zoom 1','bw-medxtore-v2'),
                                'zoom-style2'   => esc_html__('Zoom 2','bw-medxtore-v2'),
                                'zoom-style3'   => esc_html__('Zoom 3','bw-medxtore-v2'),
                                'zoom-style4'   => esc_html__('Zoom 4','bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'product_gallery_size',
                            'type'        => 'text',
                            'title'       => esc_html__('Custom gallery size','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the gallery size to crop in px. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2')
                        ),
                        array(
                            'id'          => 'product_tab_detail',
                            'type'        => 'select',
                            'title'       => esc_html__('Product tab style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the product tab style.','bw-medxtore-v2'),
                            'default'         => 'tab-product-accordion',
                            'options'     => array(
                                'tab-product-horizontal'=> esc_html__("Tab style horizontal", 'bw-medxtore-v2'),
                                'tab-product-vertical'=> esc_html__("Tab style vertical", 'bw-medxtore-v2'),
                                'tab-product-accordion'=> esc_html__("Tab style accordion", 'bw-medxtore-v2'),
                            )
                        ),
                        array(
                            'id'          => 'show_excerpt',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show excerpt','bw-medxtore-v2'),
                            'default'     => true
                        ),
                    )
                ) );

                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Extra Display', 'bw-medxtore-v2' ),
                    'id'               => 'display-product',
                    'subsection'       => true,
                    'fields'           => array(
                       array(
                            'id'          => 'share_whatsapp',
                            'type'        => 'switch',
                            'title'       => esc_html__('Button share on WhatsApp','bw-medxtore-v2'),
                            'default'     => false
                        ),
                       array(
                            'id'          => 'show_latest',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show latest products','bw-medxtore-v2'),
                            'default'     => false
                        ),
                        array(
                            'id'          => 'show_upsell',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show upsell products','bw-medxtore-v2'),
                            'default'     => false
                        ),
                        array(
                            'id'          => 'show_related',
                            'type'        => 'switch',
                            'title'       => esc_html__('Show related products','bw-medxtore-v2'),
                            'section'     => 'option_product',
                            'default'     => false
                        ),
                        array(
                            'id'          => 'bzotech_product_sticky_addcart',
                            'type'        => 'switch',
                            'title'       => esc_html__('Sticky add to cart','bw-medxtore-v2'),
                            'section'     => 'option_product',
                            'default'     => false
                        ),
                        array(
                            'id'          => 'show_single_number',
                            'type'        => 'slider',
                            'title'       => esc_html__('Show single number','bw-medxtore-v2'),
                            'min'         => '1',
                            'max'         => '100',
                            'step'        => '1',
                            'default'     => '6'
                        ),
                        array(
                            'id'          => 'show_single_size',
                            'type'        => 'text',
                            'title'       => esc_html__('Show single size','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the size for related, upsell products thumbnail. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'show_single_itemres',
                            'type'        => 'text',
                            'title'       => esc_html__('Custom item devices','bw-medxtore-v2'),
                            'desc'        => esc_html__('Set the number of related, upsell products for different screen size in px. Format is width:value and separate by ",". Example is 0:2,600:3,1000:4. Default is auto.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'show_single_item_style',
                            'type'        => 'select',
                            'title'       => esc_html__('Single item style','bw-medxtore-v2'),
                            'desc'        => esc_html__('Select the item style.','bw-medxtore-v2'),
                            'options'     => bzotech_get_product_style()
                        ),
                    )
                ) );

                Redux::setSection( $bzotech_option_name, array(
                    'title'            => esc_html__( 'Advanced', 'bw-medxtore-v2' ),
                    'id'               => 'advanced-product',
                    'subsection'       => true,
                    'fields'           => array(
                       array(
                            'id'          => 'before_append_woo_single',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content before product page','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'before_append_tab',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content before product tab','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to before product tab.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'after_append_tab',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content after product tab','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to before product tab.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'after_append_woo_single',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content after product page','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','bw-medxtore-v2'),
                        ),
                        array(
                            'id'          => 'append_content_summary',
                            'type'        => 'select',
                            'title'       => esc_html__('Append content in summary','bw-medxtore-v2'),
                            'options'     => bzotech_list_post_type('bzotech_mega_item'),
                            'desc'        => esc_html__('Choose a mega page content append to after main content of product summary.','bw-medxtore-v2'),
                        ),

                        array(
                            'id'          => 'content_summary_pos',
                            'type'        => 'slider',
                            'desc'        => esc_html__('Set a position for the content to be added to the product summary','bw-medxtore-v2'),
                            'title'       => esc_html__('Set a position for the content to be added','bw-medxtore-v2'),
                            'min'         => '1',
                            'max'         => '100',
                            'step'        => '1',
                            'default'     => '60',
                            'required'    => array(
                                array('append_content_summary','not','')
                            ), 
                        ),
                    )
                ) );
                // End Product
            };
            // Blog & Post
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Blog & Post', 'bw-medxtore-v2' ),
                'id'               => 'blog-post',
                'icon'             => 'el el-website'
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'General', 'bw-medxtore-v2' ),
                'id'               => 'blog-general',
                'subsection'       => true,
                'fields'           => array(
                                 
                    array(
                        'id'          => 'before_append_post',
                        'type'        => 'select',
                        'title'       => esc_html__('Append content before post/blog/archive page','bw-medxtore-v2'),
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                        'desc'        => esc_html__('Choose a mega page content append to before main content of post/blog/archive page.','bw-medxtore-v2'),
                    ),
                    array(
                        'id'          => 'after_append_post',
                        'type'        => 'select',
                        'title'       => esc_html__('Append content after post/blog/archive page','bw-medxtore-v2'),
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                        'desc'        => esc_html__('Choose a mega page content append to after main content of post/blog/archive page.','bw-medxtore-v2'),
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_position_blog',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar position','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar position for the blog page.','bw-medxtore-v2'),
                        'options'     => array(
                            'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                            'left'  => esc_html__('Left','bw-medxtore-v2'),
                            'right' => esc_html__('Right','bw-medxtore-v2'),
                        ),
                        'default'     => 'right'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_blog',
                        'type'        => 'select',
                        'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                        'data'        => 'sidebars',
                        'required'    => array(
                            array('bzotech_sidebar_position_blog','not','no'),
                            array('bzotech_sidebar_position_blog','not',''),
                        ), 
                        'desc'        => esc_html__('Select the sidebar to display for the blog pages.','bw-medxtore-v2'),
                    ),
                     array(
                        'id'          => 'bzotech_sidebar_style_blog',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar style for the blog page.','bw-medxtore-v2'),
                        'options'     => array(
                            'default'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                        ),
                        'required'    => array(
                            array('bzotech_sidebar_position_blog','not','no'),
                            array('bzotech_sidebar_position_blog','not',''),
                        ), 
                        'default'     => 'default'
                    ),
                    array(
                        'id'          => 'blog_default_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Default blog view style','bw-medxtore-v2'),
                        'desc'        =>esc_html__('Select the default blog view style: list view or grid view.','bw-medxtore-v2'),
                        'options'     => array(
                            'list'  => esc_html__('List','bw-medxtore-v2'),
                            'grid'  => esc_html__('Grid','bw-medxtore-v2'),
                        ),
                        'default'     => 'list',
                    ),
                    array(
                        'id'          => 'blog_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Pagination','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the blog pagination style.','bw-medxtore-v2'),
                        'options'     => array(
                            ''          => esc_html__('Default','bw-medxtore-v2'),
                            'load-more' =>esc_html__('Load more','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'blog_number_filter',
                        'type'        => 'switch',
                        'title'       => esc_html__('Show number filter','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show/hide number filter on blog page.','bw-medxtore-v2'),
                        'default'     => false,
                    ),
                    array(
                        'id'          => 'blog_number_filter_list',
                        'title'       => esc_html__('Add list number filter','bw-medxtore-v2'),
                        'type'        => 'repeater',
                        'desc'        => esc_html__('Add custom list number to filter on the blog page.','bw-medxtore-v2'),
                        'fields'    => array( 
                            array(
                                'id'       => 'title',
                                'type'     => 'text',
                                'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                            ),
                            array(
                                'id'          => 'number',
                                'type'        => 'text',
                                'title'       => esc_html__('Number','bw-medxtore-v2'),
                            ),
                        ),
                        'required'   => array('blog_number_filter','not', false),
                    ),
                    array(
                        'id'          => 'blog_type_filter',
                        'type'        => 'switch',
                        'title'       => esc_html__('Show type filter','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide type filter (list/grid) on blog page.','bw-medxtore-v2'),
                        'default'     => false,
                    ),
                    array(
                        'id'          => 'blog_order_filter',
                        'type'        => 'switch',
                        'title'       => esc_html__('Show order filter','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide order filter on blog page.','bw-medxtore-v2'),
                        'default'     => false,
                    ),
                    

                )
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'List View Settings', 'bw-medxtore-v2' ),
                'id'               => 'blog-list',
                'subsection'       => true,
                'fields'           => array(
                    
                   
                    array(
                        'id'          => 'post_list_item_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Item style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the item style (Default: Style 1).','bw-medxtore-v2'),
                        'options'     => bzotech_get_post_list_style()
                    ),



                    array(
                        'id'       => 'item_thumbnail_post_list',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Thumbnail', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the thumbnail. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'post_list_size',
                        'type'        => 'text',
                        'title'       => esc_html__('Custom list thumbnail size','bw-medxtore-v2'),
                        'desc'        => esc_html__('Set the thumbnail size to crop in px. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2'),
                        'required'    => array('item_thumbnail_post_list','!=','no'),
                    ),
                    array(
                        'id'       => 'item_title_post_list',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the title. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'item_meta_post_list',
                        'type'        => 'select',
                        'options'     => array(
                           ''     => esc_html__( 'Default', 'bw-medxtore-v2' ),
                            'yes'      => esc_html__( 'yes', 'bw-medxtore-v2' ),
                            'no'      => esc_html__( 'No', 'bw-medxtore-v2' ),
                        ),
                        'title'       => esc_html__('Show meta data','bw-medxtore-v2'),
                        'desc'        => esc_html__('Add meta post. (Default: by Item style)','bw-medxtore-v2'),
                        'default'     => '',
                    ),
                    array(
                        'id'          => 'item_meta_select_post_list',
                        'type'        => 'select',
                        'multi'=>  true,
                        'title'       => esc_html__('Meta list','bw-medxtore-v2'),
                        'options'     => array(
                           'author'     => esc_html__( 'Author', 'bw-medxtore-v2' ),
                            'date'      => esc_html__( 'Date', 'bw-medxtore-v2' ),
                            'cats'      => esc_html__( 'Categories', 'bw-medxtore-v2' ),
                            'tags'      => esc_html__( 'Tags', 'bw-medxtore-v2' ),
                            'comments'  => esc_html__( 'Comments', 'bw-medxtore-v2' ),
                            'views'     => esc_html__( 'Total views', 'bw-medxtore-v2' ),
                        ),
                        'desc'        => esc_html__('Show or hide meta data (author, date, comments, categories, tags) on blog page.','bw-medxtore-v2'),
                        'required'    => array('item_meta_post_list','!=','no'),
                    ),
                    
                    array(
                        'id'       => 'item_excerpt_post_list',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Excerpt', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the excerpt. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'post_list_excerpt',
                        'type'        => 'slider',
                        'title'       => esc_html__('Substring excerpt','bw-medxtore-v2'),
                        'min'         => 0,
                        'max'         => 999,
                        'step'        => 1,
                        'default'     => 999,
                        'desc'        => esc_html__('Set the number of character to get from excerpt content. Default is 999. Note: This value only applies on items that supports to show excerpt.','bw-medxtore-v2'),
                        'required'    => array('item_excerpt_post_list','!=','no'),
                    ),
                    array(
                        'id'       => 'item_button_post_list',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Button', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the button. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                )
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Grid View Settings', 'bw-medxtore-v2' ),
                'id'               => 'blog-grid',
                'subsection'       => true,
                'fields'           => array(
                    array(
                        'id'          => 'post_grid_column',
                        'type'        => 'select',
                        'title'       => esc_html__('Grid column','bw-medxtore-v2'),
                        'default'     => '3',
                        'desc'=>esc_html__('Choose a style to active display','bw-medxtore-v2'),
                        'options'     => array(
                            '2' => esc_html__('2 column','bw-medxtore-v2'),
                            '3' =>esc_html__('3 column','bw-medxtore-v2'),
                            '4' =>esc_html__('4 column','bw-medxtore-v2'),
                            '5' =>esc_html__('5 column','bw-medxtore-v2'),
                            '6' =>esc_html__('6 column','bw-medxtore-v2'),
                        )
                    ),
                   
                    
                    array(
                        'id'          => 'post_grid_item_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Item style','bw-medxtore-v2'),
                        'desc'        =>esc_html__('Select the item style.','bw-medxtore-v2'),
                        'options'     => bzotech_get_post_style()
                    ),
                    array(
                        'id'          => 'post_grid_type',
                        'type'        => 'select',
                        'title'       => esc_html__('Display style','bw-medxtore-v2'),
                        'desc'        =>esc_html__('Select the grid display style.','bw-medxtore-v2'),
                        'options'     => array(
                            ''  => esc_html__('Default','bw-medxtore-v2'),
                            'grid-masonry'  => esc_html__('Masonry','bw-medxtore-v2'),
                            )
                    ),
                    array(
                        'id'       => 'item_thumbnail_post',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Thumbnail', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the thumbnail. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'post_grid_size',
                        'type'        => 'text',
                        'title'       => esc_html__('Custom thumbnail size','bw-medxtore-v2'),
                        'desc'        => esc_html__('Set the thumbnail size to crop in px. Format: [width]x[height]. For example 300x300.','bw-medxtore-v2'),
                        'required'    => array('item_thumbnail_post','!=','no'),
                    ),
                    array(
                        'id'       => 'item_title_post',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Title', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the title. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'item_meta_post',
                        'type'        => 'select',
                        'options'     => array(
                           ''     => esc_html__( 'Default', 'bw-medxtore-v2' ),
                            'yes'      => esc_html__( 'yes', 'bw-medxtore-v2' ),
                            'no'      => esc_html__( 'No', 'bw-medxtore-v2' ),
                        ),
                        'title'       => esc_html__('Show meta data','bw-medxtore-v2'),
                        'desc'        => esc_html__('Add meta post. (Default: by Item style)','bw-medxtore-v2'),
                        'default'     => '',
                    ),
                    array(
                        'id'          => 'item_meta_select_post',
                        'type'        => 'select',
                        'multi'=>  true,
                        'title'       => esc_html__('Meta list','bw-medxtore-v2'),
                        'options'     => array(
                           'author'     => esc_html__( 'Author', 'bw-medxtore-v2' ),
                            'date'      => esc_html__( 'Date', 'bw-medxtore-v2' ),
                            'cats'      => esc_html__( 'Categories', 'bw-medxtore-v2' ),
                            'tags'      => esc_html__( 'Tags', 'bw-medxtore-v2' ),
                            'comments'  => esc_html__( 'Comments', 'bw-medxtore-v2' ),
                            'views'     => esc_html__( 'Total views', 'bw-medxtore-v2' ),
                        ),
                        'desc'        => esc_html__('Show or hide meta data (author, date, comments, categories, tags) on blog page.','bw-medxtore-v2'),
                        'required'    => array('item_meta_post','!=','no'),
                    ),
                    
                    array(
                        'id'       => 'item_excerpt_post',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Excerpt', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the excerpt. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                    array(
                        'id'          => 'post_grid_excerpt',
                        'type'        => 'slider',
                        'title'       => esc_html__('Substring excerpt','bw-medxtore-v2'),
                        'min'         => 0,
                        'max'         => 999,
                        'step'        => 1,
                        'default'     => 999,
                        'desc'        => esc_html__('Set the number of character to get from excerpt content. Default is 999. Note: This value only applies on items that supports to show excerpt.','bw-medxtore-v2')
                    ),
                    array(
                        'id'       => 'item_button_post',
                        'type'     => 'select',
                        'title'    => esc_html__( 'Button', 'bw-medxtore-v2' ),
                        'desc' => esc_html__( 'Show or hide the button. (Default: by Item style)', 'bw-medxtore-v2' ),
                        'default'  => '',
                        'options'     => array(
                            ''              => esc_html__('Default','bw-medxtore-v2'),
                            'yes'  => esc_html__('Show','bw-medxtore-v2'),
                            'no'  => esc_html__('Hide','bw-medxtore-v2'),
                        )
                    ),
                )
            ) );
            Redux::setSection( $bzotech_option_name, array(
                'title'            => esc_html__( 'Post Detail Settings', 'bw-medxtore-v2' ),
                'id'               => 'blog-post-detail',
                'subsection'       => true,
                'fields'           => array(                    
                    array(
                        'id'          => 'bzotech_style_post_detail',
                        'type'        => 'select',
                        'title'       => esc_html__('Single post style','bw-medxtore-v2'),
                        'options'     => array(
                            'style1'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'    => esc_html__('Style 2','bw-medxtore-v2'),
                        ),
                        'default'  => 'style1'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_position_post',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar position','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar position for the single post page.','bw-medxtore-v2'),
                        'options'     => array(
                            'no'    => esc_html__('No Sidebar','bw-medxtore-v2'),
                            'left'  => esc_html__('Left','bw-medxtore-v2'),
                            'right' => esc_html__('Right','bw-medxtore-v2'),
                        ),
                        'default'  => 'right'
                    ),
                    array(
                        'id'          => 'bzotech_sidebar_post',
                        'type'        => 'select',
                        'title'       => esc_html__('Select sidebar','bw-medxtore-v2'),
                        'data'        => 'sidebars',
                        'required'    => array(
                            array('bzotech_sidebar_position_post','not','no'),
                            array('bzotech_sidebar_position_post','not',''),
                        ),                   
                        'desc'        => esc_html__('Select the sidebar to display for the single post page.','bw-medxtore-v2'),
                        'default'     => 'blog-sidebar'
                    ),

                    array(
                        'id'          => 'bzotech_sidebar_style_post',
                        'type'        => 'select',
                        'title'       => esc_html__('Sidebar style','bw-medxtore-v2'),
                        'desc'        => esc_html__('Select the sidebar style for the post page.','bw-medxtore-v2'),
                        'options'     => array(
                            'default'    => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  => esc_html__('Style2','bw-medxtore-v2'),
                        ),
                        'required'    => array(
                            array('bzotech_sidebar_position_post','not','no'),
                            array('bzotech_sidebar_position_post','not',''),
                        ), 
                        'default'     => 'default'
                    ),
                    array(
                        'id'          => 'before_append_post_detail',
                        'title'       => esc_html__('Append content before post detail','bw-medxtore-v2'),
                        'type'        => 'select',
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                        'desc'        => esc_html__('Choose a mega page content append to before main content of post detail.','bw-medxtore-v2'),
                    ),
                    array(
                        'id'          => 'after_append_post_detail',
                        'title'       => esc_html__('Append content after post detail','bw-medxtore-v2'),
                        'type'        => 'select',
                        'options'     => bzotech_list_post_type('bzotech_mega_item'),
                        'desc'        => esc_html__('Choose a mega page content append to after main content of post detail.','bw-medxtore-v2'),
                    ),
                    array(
                        'id'          => 'post_single_thumbnail',
                        'type'        => 'switch',
                        'title'       => esc_html__('Show thumbnail/media','bw-medxtore-v2'),
                        'desc'        => 'Show/hide thumbnail image, gallery, media on post detail.',
                        'default'     => true,
                    ),                
                    array(
                        'id'          => 'post_single_size',
                        'title'       => esc_html__('Custom single image size','bw-medxtore-v2'),
                        'type'        => 'text',
                        'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','bw-medxtore-v2'),
                        'required'    => array('post_single_thumbnail','=',true),
                    ),
                    array(
                        'id'          => 'post_single_meta',
                        'type'        => 'select',
                        'options'     => array(
                           ''     => esc_html__( 'Default', 'bw-medxtore-v2' ),
                            'yes'      => esc_html__( 'yes', 'bw-medxtore-v2' ),
                            'no'      => esc_html__( 'No', 'bw-medxtore-v2' ),
                        ),
                        'title'       => esc_html__('Show meta data','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide meta data (author, date, comments, categories, tags) on post detail.','bw-medxtore-v2'),
                        'default'     => '',

                    ),
                     array(
                        'id'          => 'single_item_meta_select',
                        'type'        => 'select',
                        'multi'=>  true,
                        'title'       => esc_html__('Meta list','bw-medxtore-v2'),
                        'options'     => array(
                           'author'     => esc_html__( 'Author', 'bw-medxtore-v2' ),
                            'date'      => esc_html__( 'Date', 'bw-medxtore-v2' ),
                            'cats'      => esc_html__( 'Categories', 'bw-medxtore-v2' ),
                            'tags'      => esc_html__( 'Tags', 'bw-medxtore-v2' ),
                            'comments'  => esc_html__( 'Comments', 'bw-medxtore-v2' ),
                            'views'     => esc_html__( 'Total views', 'bw-medxtore-v2' ),
                        ),
                        'required'    => array('post_single_meta','=','yes'),
                    ),
                    array(
                        'id'          => 'post_single_author',
                        'type'        => 'switch',
                        'title'       => esc_html__('Author','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide author information in the post detail.','bw-medxtore-v2' ),
                        'default'     => false,
                    ),
                    array(
                        'id'          => 'post_single_navigation',
                        'type'        => 'switch',
                        'title'       => esc_html__('Post navigation','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide navigation to next or previous post in the post detail.','bw-medxtore-v2' ),
                        'default'     => false,
                    ),
                    // Related section
                    array(
                        'id'          => 'post_single_related',
                        'type'        => 'switch',
                        'title'       => esc_html__('Related post','bw-medxtore-v2'),
                        'desc'        => esc_html__('Show or hide related post in the post detail.','bw-medxtore-v2' ),
                        'default'     => false,
                    ),
                    array(
                        'id'          => 'post_single_related_title',
                        'type'        => 'text',
                        'title'       => esc_html__('Related title','bw-medxtore-v2'),
                        'desc'        => esc_html__('Enter title of related section.','bw-medxtore-v2'),
                        'required'    => array('post_single_related','=',true),
                    ),
                    array(
                        'id'          => 'post_single_related_number',
                        'type'        => 'text',
                        'title'       => esc_html__('Related number post','bw-medxtore-v2'),
                        'desc'        => esc_html__('Enter number of related post to display.','bw-medxtore-v2'),
                        'required'    => array('post_single_related','=',true),
                    ),
                    array(
                        'id'          => 'post_single_related_item',
                        'type'        => 'text',
                        'title'       => esc_html__('Related custom number item responsive','bw-medxtore-v2'),
                        'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','bw-medxtore-v2'),
                        'required'    => array('post_single_related','=',true),
                    ),
                    array(
                        'id'          => 'post_single_related_item_style',
                        'type'        => 'select',
                        'title'       => esc_html__('Related item style','bw-medxtore-v2'),
                        'desc'        =>esc_html__('Choose a style to active display','bw-medxtore-v2'),
                        'options'     => bzotech_get_post_style(),
                        'required'    => array('post_single_related','=',true),
                    ),
                )
            ) );
            // Blog & Post

            

           
        }
    }
    // End Redux help function
    // This is your option name where all the Redux data is stored.

    $bzotech_option_name = bzotech_get_option_name();

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $bzotech_option_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'bw-medxtore-v2' ),
        'page_title'           => esc_html__( 'Theme Options', 'bw-medxtore-v2' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyBFxhycc63fWy_uk126zW8KPtkD3Bay0jI',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        

        // OPTIONAL -> Give you extra features
        'page_priority'        => 59,//29
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        'menu_icon'            => get_template_directory_uri().'/assets/admin/image/logo.png',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_options_object' => false,
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

      

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/BZOTech',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/BzoTech',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.youtube.com/@bzotech9150',
        'title' => 'Find us on Youtube',
        'icon'  => 'el el-youtube'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.linkedin.com/in/bzotech/',
        'title' => 'Follow us on Linkedin',
        'icon'  => 'el el-linkedin'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.pinterest.com/Bzo_Tech',
        'title' => 'Follow us on Pinterest',
        'icon'  => 'el el-pinterest'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.instagram.com/bzotech/',
        'title' => 'Follow us on Instagram',
        'icon'  => 'el el-instagram'
    );
    Redux::setArgs( $bzotech_option_name, $args );

    /*
     * ---> END ARGUMENTS
     */    
    
    bzotech_switch_redux_option();



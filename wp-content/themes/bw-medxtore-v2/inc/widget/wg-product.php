<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2016
 * Time: 9:18 SA
 */
if ( !class_exists('WC_Product') ) {
    return;
}

if(!class_exists('Bzotech_Widget_Product_Slider')) {
    class Bzotech_Widget_Product_Slider extends WC_Widget
    {
        static function _init()
        {
            add_action('widgets_init', array(__CLASS__, '_add_widget'));
        }

        static function _add_widget()
        {
            if(function_exists('bzotech_reg_widget')) bzotech_reg_widget( 'Bzotech_Widget_Product_Slider' );

        }

        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->widget_cssclass = 'woocommerce widget widget-product-slider poroduct-type';
            $this->widget_description = esc_html__('Display a list of your products on your site.', 'bw-medxtore-v2');
            $this->widget_id = 'Bzotech_Widget_Product_Slider';
            $this->widget_name = esc_html__('BZOTECH Products slider', 'bw-medxtore-v2');

            parent::__construct();
        }

        /**
         * Updates a particular instance of a widget.
         *
         * @see WP_Widget->update
         *
         * @param array $new_instance
         * @param array $old_instance
         *
         * @return array
         */
        public function update($new_instance, $old_instance)
        {
            $this->init_settings();

            return parent::update($new_instance, $old_instance);
        }

        public function form($instance)
        {
            $this->init_settings();

            parent::form($instance);
        }

        /**
         * Init settings after post types are registered.
         */
        public function init_settings()
        {

            $category_array = array();
            $tags = get_terms('product_cat');
            if(is_array($tags) && !empty($tags)){
                foreach ($tags as $tag) {
                    $category_array['bzotech_cart_'.$tag->slug]=array(
                        'type' => 'checkbox',
                        'std' => $tag->slug,
                        'label' => $tag->name,
                        'class' => 'bzotech_cat_admin',
                    );
                }
            }
            $this->settings = array_merge(
                array(
                    'title'  => array(
                        'type'  => 'text',
                        'std'   => esc_html__( 'Products list', 'bw-medxtore-v2' ),
                        'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
                    ),
                    'style_item' => array(
                        'type'  => 'select',
                        'std'   => '',
                        'label' => esc_html__( 'Style item', 'bw-medxtore-v2' ),
                        'options' => array(
                            '' => esc_html__('Default','bw-medxtore-v2'),
                            'style2'  =>  esc_html__('Style 2','bw-medxtore-v2'),
                        ),
                    ),
                    'number_post'  => array(
                        'type'  => 'text',
                        'std'   => '8',
                        'label' => esc_html__( 'Number post (Default: 8)', 'bw-medxtore-v2' ),
                    ),
                    'product_type' => array(
                        'type'  => 'select',
                        'std'   => '',
                        'label' => esc_html__( 'Product type', 'bw-medxtore-v2' ),
                        'options' => array(
                            '' => esc_html__('Default','bw-medxtore-v2'),
                            'trending'  =>  esc_html__('Trending','bw-medxtore-v2'),
                            'featured'  =>  esc_html__('Featured Products','bw-medxtore-v2'),
                            'bestsell'  =>  esc_html__('Best Sellers','bw-medxtore-v2'),
                            'onsale'  =>  esc_html__('On Sale','bw-medxtore-v2'),
                            'toprate'  =>  esc_html__('Top rate','bw-medxtore-v2'),
                            'mostview'  =>  esc_html__('Most view','bw-medxtore-v2'),
                        ),
                    ),
                    'title_category' => array(
                        'type'  => 'text',
                        'std'   => '',
                        'class' => 'bzotech_title_filter_category_admin',
                        'label' => esc_html__( 'Filter by category (Default get all)', 'bw-medxtore-v2' ),
                    ),

                ),
                $category_array,
                array(
                    'order_by' => array(
                        'type'  => 'select',
                        'std'   => '',
                        'class' => 'bzotech_order_by_admin',
                        'label' => esc_html__( 'Order by', 'bw-medxtore-v2' ),
                        'options' => array(
                            'none'   => esc_html__('None','bw-medxtore-v2'),
                            'ID'  => esc_html__('Post ID','bw-medxtore-v2'),
                            'author' => esc_html__('Author','bw-medxtore-v2'),
                            'title' => esc_html__('Post Title','bw-medxtore-v2'),
                            'name' => esc_html__('Post Name','bw-medxtore-v2'),
                            'date' => esc_html__('Post Date','bw-medxtore-v2'),
                            'modified' => esc_html__('Last Modified Date','bw-medxtore-v2'),
                            'parent' => esc_html__('Post Parent','bw-medxtore-v2'),
                            'rand' => esc_html__('Random','bw-medxtore-v2'),
                            'comment_count' => esc_html__('Comment Count','bw-medxtore-v2'),
                            'post_views' => esc_html__('View Post','bw-medxtore-v2'),
                            'rating' => esc_html__('Rating Product','bw-medxtore-v2'),
                            'price' => esc_html__('Sort by price','bw-medxtore-v2'),
                        ),
                    ),
                    'order' => array(
                        'type'  => 'select',
                        'std'   => 'DESC',
                        'label' => esc_html__( 'Order', 'bw-medxtore-v2' ),
                        'options' => array(
                            'DESC' => esc_html__( 'Descending', 'bw-medxtore-v2' ),
                            'ASC'  => esc_html__( 'Ascending', 'bw-medxtore-v2' ),
                        ),
                    ),

                    'number_row' => array(
                        'type'  => 'text',
                        'std'   => '4',
                        'label' => esc_html__( 'Number product in item silder (Default: 4)', 'bw-medxtore-v2' ),
                    ),
                    'image_size' => array(
                        'type'  => 'text',
                        'std'   => '',
                        'label' => esc_html__( 'Custom image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme. Alternatively enter size in pixels : 200x100 (Width x Height))', 'bw-medxtore-v2' ),
                    ),
                )
            );
        }

        /**
         * Output widget.
         *
         * @see WP_Widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget($args, $instance)
        {
            echo wp_kses_post($args['before_widget']);
            if ( ! empty( $instance['title'] ) ) {
                echo wp_kses_post($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }
            $number_post  = (isset( $instance['number_post']) and  $instance['number_post'] !== 0)  ? $instance['number_post'] : 8;
            $style_item  = (isset( $instance['style_item']))  ? $instance['style_item'] : $this->settings['style_item']['std'];
            $product_type = isset( $instance['product_type'] ) ? $instance['product_type'] : $this->settings['product_type']['std'];
            $order_by = isset( $instance['order_by'] ) ? $instance['order_by'] : $this->settings['order_by']['std'];
            $order = isset( $instance['order'] ) ? $instance['order'] : $this->settings['order']['std'];
            $number_row = (isset( $instance['number_row'] )and  $instance['number_row'] !== 0) ? $instance['number_row'] : 4;
            $image_size = isset( $instance['image_size'] ) ? $instance['image_size'] : $this->settings['image_size']['std'];
            $terms_cart = get_terms('product_cat');
            $product_category = array();
            $i=0;
            if(!empty($terms_cart) and is_array($terms_cart)){
                foreach ($terms_cart as $key=>$value){
                    if(isset($instance['bzotech_cart_'.$value->slug]) and $instance['bzotech_cart_'.$value->slug]==1){
                        $product_category[$i] =  $value->slug;
                        $i = $i+1;
                    }
                }
            }
            $args_product=array(
                'post_type'         => 'product',
                'posts_per_page'    => (int)$number_post,
                'orderby'           => $order_by,
                'order' => $order,
                'post_status'    => 'publish',
            );
            if($product_type == 'trending'){
                $args_product['meta_query'][] = array(
                    'key'     => 'trending_product',
                    'value'   => '1',
                    'compare' => '=',
                );
            }
            if($product_type == 'toprate'){
                $args_product['meta_key'] = '_wc_average_rating';
                $args_product['orderby'] = 'meta_value_num';
                $args_product['meta_query'] = WC()->query->get_meta_query();
                $args_product['tax_query'][] = WC()->query->get_tax_query();
            }
            if($product_type == 'mostview'){
                $args_product['meta_key'] = 'post_views';
                $args_product['orderby'] = 'meta_value_num';
            }
            if($product_type == 'bestsell'){
                $args_product['meta_key'] = 'total_sales';
                $args_product['orderby'] = 'meta_value_num';
            }
            if($product_type=='onsale'){
                $args_product['meta_query']['relation']= 'OR';
                $args_product['meta_query'][]=array(
                    'key'   => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type'          => 'numeric'
                );
                $args_product['meta_query'][]=array(
                    'key'   => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type'          => 'numeric'
                );
            }
            if($product_type == 'featured'){
                $args_product['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
            }
            if (!empty($product_category)) {
                if ($product_category[0] != '') {
                    $args_product['tax_query'][] = array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $product_category,
                    );
                }
            }
            if($order_by == 'rating'){
                $args_product['meta_key'] = '_wc_average_rating';
                $args_product['meta_query'] = WC()->query->get_meta_query();
                $args_product['tax_query'] = WC()->query->get_tax_query();
                $args_product['no_found_rows'] = 1;
                $args_product['orderby'] = 'meta_value_num';
                $args_product['order'] =  $order;
            }
            if($order_by == 'price'){
                $args_product['orderby']  = "meta_value_num ID";
                $args_product['order']    = $order;
                $args_product['meta_key'] = '_price';
            }

            $query = new WP_Query($args_product);
            $count_post= $query->post_count;            
            $image_size = bzotech_get_size_image('full',$image_size); 
            echo bzotech_get_template_widget('product',false,array(
                'query'=>$query,
                'count_post'=>$count_post,
                'image_size'=>$image_size,
                'number_row'=>$number_row,
                'style_item'=>$style_item,
            ));
            echo wp_kses_post($args['after_widget']);
        }
    }
    Bzotech_Widget_Product_Slider::_init();
}
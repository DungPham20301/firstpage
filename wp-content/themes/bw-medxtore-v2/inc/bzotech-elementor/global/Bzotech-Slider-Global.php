<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Bzotech_Slider_Global extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bzotech-slider_global';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slider (Global)', 'bw-medxtore-v2' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'aqb-htelement-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'hello-world' ];
	}

	public function get_style_depends() {
		return [ 'bzotech-el-slider' ];
	}
	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$slider_items_widescreen =$slider_items_laptop = $slider_items_tablet = $slider_items_tablet_extra =$slider_items_mobile_extra =$slider_items_mobile =$slider_space_widescreen =$slider_space_laptop =$slider_space_tablet_extra =$slider_space_tablet =$slider_space_mobile_extra= $slider_space_mobile ='';
		$settings = $this->get_settings();
		extract($settings);

		$this->add_render_attribute( 'elbzotech-wrapper', 'class', 'elbzotech-wrapper-slider-global elbzotech-wrapper-slider-global-'.$style.' display-swiper-navi-'.$slider_navigation.' display-swiper-pagination-'.$slider_pagination.' display-swiper-scrollbar-'.$slider_scrollbar.' auto-show-scrollbar-'.$auto_show_scrollbar.' slider-type-'.$slider_type);
		if(!empty($slider_cursor_image['url'])){
			$this->add_render_attribute( 'elbzotech-wrapper', 'class', 'cursor-active');
			$this->add_render_attribute( 'elbzotech-wrapper', 'style', '
cursor: url("'.$slider_cursor_image['url'].'"), url("'.$slider_cursor_image['url'].'"), move;');
		}
		
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'class', 'elbzotech-swiper-slider '.$slider_bg_style.'  swiper-container slider-wrap popup-gallery');
		
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-custom', $slider_items_custom );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items', $slider_items );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-widescreen', $slider_items_widescreen );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-laptop', $slider_items_laptop );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-tablet-extra', $slider_items_tablet_extra);
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-tablet', $slider_items_tablet);
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-mobile-extra', $slider_items_mobile_extra);
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-items-mobile', $slider_items_mobile );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space', $slider_space );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-widescreen', $slider_space_widescreen );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-laptop', $slider_space_laptop );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-tablet-extra', $slider_space_tablet_extra );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-tablet', $slider_space_tablet );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-mobile-extra', $slider_space_mobile_extra );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-space-mobile', $slider_space_mobile );

		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-column', $slider_column );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-auto', $slider_auto );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-center', $slider_center );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-loop', $slider_loop );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-speed', $slider_speed );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-navigation', $slider_navigation );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-pagination', $slider_pagination );
		$this->add_render_attribute( 'elbzotech-wrapper-slider', 'data-slidertype', $slider_type );
		$this->add_render_attribute( 'elbzotech-inner', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'elbzotech-item', 'class', 'swiper-slide' );
		
		$attr = array(
			'wdata'		=> $this,
			'settings'	=> $settings,
		);
		echo bzotech_get_template_elementor_global('slider/slider',$settings['style'],$attr);
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		
	}
/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''		=> esc_html__( 'Default', 'bw-medxtore-v2' ),
					'category'		=> esc_html__( 'Category', 'bw-medxtore-v2' ),
					'category2'		=> esc_html__( 'Category (Home 2)', 'bw-medxtore-v2' ),
					'testimonial'		=> esc_html__( 'Testimonial', 'bw-medxtore-v2' ),
					'testimonial2'		=> esc_html__( 'Testimonial 2', 'bw-medxtore-v2' ),
					'testimonial3'		=> esc_html__( 'Testimonial 3', 'bw-medxtore-v2' ),
					'testimonial4'		=> esc_html__( 'Testimonial 4', 'bw-medxtore-v2' ),
					'brands'		=> esc_html__( 'Product Brands', 'bw-medxtore-v2' ),
				],
			]
		);

/* 1, $key : type string 2, $condition : 
$category=$image=$title=$desc=$content=$button=$link=$image_action=$star=$button2=$countdown_number = $countdown_after_number =$countdown_title =$countdown_number2 =$countdown_after_number2 =$countdown_title2 = false
*/
		$this->get_list_item_slider('list_sliders',array('style'=>''),array('image'=>true,'content'=>true,'link'=>true,'image_action'=>'true'));

		$this->get_list_item_slider('list_categories2',array('style'=>'category'),array('title'=>true,'image'=>true,'link'=>true,'category'=>'product_cat'));
		
		$this->get_list_item_slider('list_categories3',array('style'=>'category2'),array('title'=>true,'image'=>true,'image_hover'=>true,'link'=>true,'category'=>'product_cat'));

		$this->get_list_item_slider('list_testimonial',array('style'=>'testimonial'),array('title'=>true, 'desc'=>true, 'content'=>true,'image'=>true,'link'=>true,'image_action'=>true,'star'=>true));

		$this->get_list_item_slider('list_testimonial1',array('style'=>'testimonial2'),array('title'=>true, 'desc'=>true, 'content'=>true,'image'=>true,'link'=>true,'image_action'=>true,'star'=>true));
		$this->get_list_item_slider('list_testimonial2',array('style'=>'testimonial3'),array('title'=>true, 'desc'=>true, 'content'=>true,'image'=>true,'link'=>true,'image_action'=>true,'star'=>true));
		$this->get_list_item_slider('list_testimonial3',array('style'=>'testimonial4'),array('title'=>true, 'desc'=>true, 'content'=>true,'image'=>true,'link'=>true,'image_action'=>true,'star'=>true));

		$this->get_list_item_slider('brand_slider',array('style'=>'brands'),array('title'=>true,'image'=>true,'link'=>true,'category'=>'brand_woo'));
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .swiper-container' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->get_slider_settings();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_bg_style',
			[
				'label' => esc_html__( 'Image style', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => esc_html__( 'Default', 'bw-medxtore-v2' ),
					'bg-slider-swiper'  => esc_html__( 'Background slider', 'bw-medxtore-v2' ),
					'bg-slider-swiper parallax-slider'  => esc_html__( 'Background parallax', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_responsive_control(
			'width_image_style_default',
			[
				'label' => esc_html__( 'Width image', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 0
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-swiper-slider- .swiper-thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'slider_bg_style' => '',
				]
			]
		);

		$this->get_thumb_styles('image','adv-thumb-link');

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_text_styles('title','item-title a');

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_des',
			[
				'label' => esc_html__( 'Description', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_text_styles('des','item-des');

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Content text', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_text_styles('content','item-content');

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content_box',
			[
				'label' => esc_html__( 'Content box', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_box_settings('content_box','content-wrap');

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_box',
			[
				'label' => esc_html__( 'Box item', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->get_box_settings('box','wslider-item');

		$this->end_controls_section();

		$this->get_slider_styles();
	}
	public function get_slider_settings($condition=array()) {
		$this->start_controls_section(
			'section_slider',
			[
				'label' => esc_html__( 'Slider', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => $condition,
			]
		);
		$this->add_responsive_control(
			'slider_items',
			[
				'label' => esc_html__( 'Items', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 3,
				'condition' => [
					'slider_auto' => '',
					'slider_items_custom' => '',
				]
			]
		);
		$this->add_control(
			'slider_items_custom',
			[
				'label' => esc_html__( 'Items custom by display', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'description'	=> esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:1,375:2,991:3,1170:4', 'bw-medxtore-v2' ),
				'default' => '',
				'condition' => [
					'slider_auto' => '',
				]
			]
		);
		$this->add_responsive_control(
			'slider_space',
			[
				'label' => esc_html__( 'Space(px)', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'For example: 20', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 200,
				'step' => 1,
				'default' => 0
			]
		);

		$this->add_control(
			'slider_column',
			[
				'label' => esc_html__( 'Columns', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
			]
		);

		$this->add_control(
			'slider_speed',
			[
				'label' => esc_html__( 'Speed(ms)', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'For example: 3000 or 5000', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1000,
				'max' => 50000,
				'step' => 100,
			]
		);		

		$this->add_control(
			'slider_auto',
			[
				'label' => esc_html__( 'Auto width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'slider_center',
			[
				'label' => esc_html__( 'Center', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'slider_loop',
			[
				'label' => esc_html__( 'Loop', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'slider_navigation',
			[
				'label' 	=> esc_html__( 'Navigation', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''		=> esc_html__( 'None', 'bw-medxtore-v2' ),
					'style1'		=> esc_html__( 'Style 1', 'bw-medxtore-v2' ),
					'group'		=> esc_html__( 'Style 2 (Group right)', 'bw-medxtore-v2' ),
					'group2'		=> esc_html__( 'Style 3 (Group center)', 'bw-medxtore-v2' ),
					'yes'		=> esc_html__( 'Default custom', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'slider_pagination',
			[
				'label' 	=> esc_html__( 'Pagination', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''		=> esc_html__( 'None', 'bw-medxtore-v2' ),
					'style1'		=> esc_html__( 'Style 1 (Square)', 'bw-medxtore-v2' ),
					'style2'		=> esc_html__( 'style 2 (Round)', 'bw-medxtore-v2' ),
					'style3'		=> esc_html__( 'style 3 (Line)', 'bw-medxtore-v2' ),
					'style4'		=> esc_html__( 'style 4 (Line white)', 'bw-medxtore-v2' ),
					'number'		=> esc_html__( 'style 5 (Number)', 'bw-medxtore-v2' ),
					'yes'		=> esc_html__( 'Default custom', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'slider_scrollbar',
			[
				'label' 	=> esc_html__( 'Scrollbar', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''		=> esc_html__( 'None', 'bw-medxtore-v2' ),
					'yes'		=> esc_html__( 'Default custom', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'slider_type',
			[
				'label' 	=> esc_html__( 'Slider type', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'description'	=> esc_html__( 'Set up slider according to the available template', 'bw-medxtore-v2' ),
				'options'   => [
					''		=> esc_html__( 'None', 'bw-medxtore-v2' ),
					'marquee'		=> esc_html__( 'Marquee type', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'slider_cursor_image',
			[
				'label' 	=> esc_html__( 'Cursor image', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::MEDIA,
				'default' => [
					'url' => ''
				]
			]
		);
		$this->end_controls_section();
	}

	public function get_thumb_styles($key='thumb', $class="thumb-image") {
		$this->start_controls_tabs( $key.'_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			$key.'_opacity',
			[
				'label' => esc_html__( 'Opacity', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => $key.'_css_filters',
				'selector' => '{{WRAPPER}} .'.$class.' img',
			]
		);

		$this->add_control(
			$key.'_overlay',
			[
				'label' => esc_html__( 'Overlay', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':after' => 'background-color: {{VALUE}}; opacity: 1; visibility: visible;',
				],
			]
		);
		// get_box_image
		$this->add_responsive_control(
			$key.'_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img'=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			$key.'_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border',
				'selector' => '{{WRAPPER}} .'.$class.' img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			$key.'_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $key.'_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .'.$class.' img',
			]
		);
		// end get_box_image
		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			$key.'_opacity_hover',
			[
				'label' => esc_html__( 'Opacity hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => $key.'_css_filters_hover',
				'label' => esc_html__( 'Filters hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class.':hover img',
			]
		);

		$this->add_control(
			$key.'_overlay_hover',
			[
				'label' => esc_html__( 'Overlay hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover img' => 'background-color: {{VALUE}}; opacity: 1; visibility: visible;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border_hover',
				'label' => esc_html__( 'Border hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class.':hover img',
				
			]
		);

		$this->add_responsive_control(
			$key.'_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			$key.'_background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover img' => 'transition-duration: {{SIZE}}s',
					'{{WRAPPER}} .'.$class.':hover .adv-thumb-link::after' => 'transition-duration: {{SIZE}}s',
					'{{WRAPPER}} .'.$class.':hover .adv-thumb-link' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			$key.'_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
	}

	public function get_box_image($key='box-key',$class="box-class") {
		$this->add_responsive_control(
			$key.'_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img'=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			$key.'_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border',
				'selector' => '{{WRAPPER}} .'.$class.' img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			$key.'_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class.' img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $key.'_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .'.$class.' img',
			]
		);
	}

	public function get_text_styles($key='text', $class="text-class") {
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => $key.'_typography',
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);

		$this->start_controls_tabs( $key.'_effects' );

		$this->start_controls_tab( $key.'_normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			$key.'_color',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $key.'_shadow',
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( $key.'_hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			$key.'_color_hover',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $key.'_shadow_hover',
				'selector' => '{{WRAPPER}} .'.$class.':hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			$key.'_space',
			[
				'label' => esc_html__( 'Space', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

	}

	public function get_box_settings($key='box-key',$class="box-class") {
		$this->add_responsive_control(
			$key.'_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			$key.'_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => $key.'_background',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .'.$class,
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border',
                'label' => esc_html__( 'Border', 'bw-medxtore-v2' ),
                'separator' => 'before',
				'selector' => '{{WRAPPER}} .'.$class,
			]
        );

        $this->add_responsive_control(
			$key.'_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $key.'_shadow',
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);
	}
	public function get_list_item_slider($key='list_sliders',$condition=array(),$attr = []) {
		$category=$image=$image_hover=$title=$desc=$content=$button=$link=$image_action=$star=$button2=$countdown_number = $countdown_after_number =$countdown_title =$countdown_number2 =$countdown_after_number2 =$countdown_title2 =false;

		extract($attr);
		$repeater_sliders = new Repeater();
		$repeater_sliders->add_control(
			'template',
			[
				'label' 	=> esc_html__( 'Template content', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => bzotech_list_post_type('bzotech_mega_item',true),
			]
		);
		if($category==true)
			$repeater_sliders->add_control(
				'category',
				[
					'label' 	=> esc_html__( 'Get category', 'bw-medxtore-v2' ),
					'description'	=> esc_html__( 'You can change the display category here', 'bw-medxtore-v2' ),
					'type'      => Controls_Manager::SELECT,
					'label_block' => true,
					'options'   => bzotech_get_list_category($category),
					
				]
			);
		if($image==true)
		$repeater_sliders->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => ''
				],
				'condition' => [
					'template' => ''
				]
			]
		);
		if($image_hover==true)
		$repeater_sliders->add_control(
			'image_hover',
			[
				'label' => esc_html__( 'Image hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => ''
				],
				'condition' => [
					'template' => '',
					'image[url]!' => ''
				]
			]
		);
		if($image==true)
		$repeater_sliders->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'include' => [],
				'default' => 'full',
				'condition' => [
					'template' => ''
				]
			]
		);
		
		if($title==true)
		$repeater_sliders->add_control(
			'title', 
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'template' => ''
				]
			]
		);
		if($desc==true)
		$repeater_sliders->add_control(
			'description', 
			[
				'label' => esc_html__( 'Description', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'template' => ''
				]
			]
		);
		
		if($content==true)
		$repeater_sliders->add_control(
			'content',
			[
				'label' => esc_html__( 'Content', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => '',
				'condition' => [
					'template' => ''
				]
			]
		);
				
		if($button==true)
		$repeater_sliders->add_control(
			'button_name', 
			[
				'label' => esc_html__( 'Button name', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'template' => ''
				]
			]
		);
		if($button2==true)
		$repeater_sliders->add_control(
			'button_name2', 
			[
				'label' => esc_html__( 'Button name 2', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'template' => ''
				]
			]
		);
		
		if($image_action==true)
		$repeater_sliders->add_control(
			'image_action',
			[
				'label' => esc_html__( 'Action of the image', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Link', 'bw-medxtore-v2' ),
					'popup' => esc_html__( 'Popup', 'bw-medxtore-v2' ),
					
				],
				'default' => '',
			]
		);
		if($link==true)
		$repeater_sliders->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'bw-medxtore-v2' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		if($star==true)
		$repeater_sliders->add_control(
			'number_star',
			[
				'label' => esc_html__( 'Number star', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'bw-medxtore-v2' ),
					'1' => esc_html__( '1 star', 'bw-medxtore-v2' ),
					'2' => esc_html__( '2 star', 'bw-medxtore-v2' ),
					'3' => esc_html__( '3 star', 'bw-medxtore-v2' ),
					'4' => esc_html__( '4 star', 'bw-medxtore-v2' ),
					'5' => esc_html__( '5 star', 'bw-medxtore-v2' ),
					
				],
				'default' => '5',
			]
		);
		if($countdown_number==true)
		$repeater_sliders->add_control(
			'countdown_number',
			[
				'label' => esc_html__( 'Countdown number', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '12',
			]
		);
		if($countdown_after_number==true)
		$repeater_sliders->add_control(
			'countdown_after_number',
			[
				'label' => esc_html__( 'After countdown number', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		if($countdown_title==true)
		$repeater_sliders->add_control(
			'countdown_title',
			[
				'label' => esc_html__( 'Title countdown', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		if($countdown_number2==true)
		$repeater_sliders->add_control(
			'countdown_number2',
			[
				'label' => esc_html__( 'Countdown number 2', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '12',
			]
		);
		if($countdown_after_number2==true)
		$repeater_sliders->add_control(
			'countdown_after_number2',
			[
				'label' => esc_html__( 'After countdown number 2', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		if($countdown_title2==true)
		$repeater_sliders->add_control(
			'countdown_title2',
			[
				'label' => esc_html__( 'Title countdown 2', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			$key,
			[
				'label' => esc_html__( 'Add slide item', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty'=>false,
				'fields' => $repeater_sliders->get_controls(),
				'title_field' => esc_html__( 'Item', 'bw-medxtore-v2' ),
				'condition' => $condition,
			]
		);
		
		
	}

	public function get_slider_styles() {
		$this->start_controls_section(
			'section_style_slider_nav',
			[
				'label' => esc_html__( 'Slider Navigation', 'bw-medxtore-v2' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'slider_navigation!' => '',
				]
			]
		);

		
		$this->add_responsive_control(
			'width_slider_nav',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height_slider_nav',
			[
				'label' => esc_html__( 'Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .swiper-button-nav i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_slider_nav',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_slider_nav',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'slider_nav_effects' );

		$this->start_controls_tab( 'slider_nav_normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			'color_slider_nav',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' =>['{{WRAPPER}} .swiper-button-nav' => 'color: {{VALUE}};'],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_slider_nav',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .swiper-button-nav',
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'shadow_slider_nav',
				'selector' => '{{WRAPPER}} .swiper-button-nav',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_slider_nav',
				'selector' => '{{WRAPPER}} .swiper-button-nav',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'border_radius_slider_nav',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'slider_nav_hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			'color_slider_nav_hover',
			[
				'label' => esc_html__( 'Color hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_slider_nav_hover',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .swiper-button-nav:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'shadow_slider_nav_hover',
				'selector' => '{{WRAPPER}} .swiper-button-nav:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_slider_nav_hover',
				'selector' => '{{WRAPPER}} .swiper-button-nav:hover',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'border_radius_slider_nav_hover',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();	

		$this->add_control(
			'separator_slider_nav',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'slider_icon_next',
			[
				'label' => esc_html__( 'Icon next', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'las la-long-arrow-alt-right',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'slider_icon_prev',
			[
				'label' => esc_html__( 'Icon prev', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'las la-long-arrow-alt-left',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'slider_icon_size',
			[
				'label' => esc_html__( 'Size icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-nav i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slider_nav_space',
			[
				'label' => esc_html__( 'Space', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_slider_pag',
			[
				'label' => esc_html__( 'Slider Pagination', 'bw-medxtore-v2' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'slider_pagination!' => '',
				]
			]
		);

		
		$this->add_responsive_control(
			'width_slider_pag',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination span' => 'width: {{SIZE}}{{UNIT}};',
				], 
			]
		);

		$this->add_responsive_control(
			'height_slider_pag',
			[
				'label' => esc_html__( 'Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination span' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_bg_normal',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'background_pag_heading',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_slider_pag',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .swiper-pagination span',
			]
		);

		$this->add_control(
			'opacity_pag',
			[
				'label' => esc_html__( 'Opacity', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination span' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'separator_bg_active',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'background_pag_heading_active',
			[
				'label' => esc_html__( 'Active', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_slider_pag_active',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'Active status', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .swiper-pagination span.swiper-pagination-bullet-active',
			]
		);

		$this->add_control(
			'opacity_pag_active',
			[
				'label' => esc_html__( 'Opacity', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination span.swiper-pagination-bullet-active' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'separator_shadow',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'shadow_slider_pag',
				'selector' => '{{WRAPPER}} .swiper-pagination span',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_slider_pag',
				'selector' => '{{WRAPPER}} .swiper-pagination span',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'border_radius_slider_pag',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slider_pag_space',
			[
				'label' => esc_html__( 'Space top bottom', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'slider_pag_space_item',
			[
				'label' => esc_html__( 'Space item', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'magin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .swiper-pagination-bullet:last-child' => 'magin-right: 0px;'
				],
			]
		);
		$this->add_control(
			'slider_pag_position',
			[
				'label' => esc_html__( 'Position', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'center',
				'options'   => [
					'left'		=> esc_html__( 'Left', 'bw-medxtore-v2' ),
					'center'	=> esc_html__( 'Center', 'bw-medxtore-v2' ),
					'right'		=> esc_html__( 'Right', 'bw-medxtore-v2' ),
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_slider_scrollbar',
			[
				'label' => esc_html__( 'Slider Scrollbar', 'bw-medxtore-v2' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'slider_scrollbar!' => '',
				]
			]
		);
		$this->add_control(
			'auto_show_scrollbar',
			[
				'label' => esc_html__( 'Auto show scrollbar', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'height_slider_scrollbar',
			[
				'label' => esc_html__( 'Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-scrollbar' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_slider_scrollbar',
				'label' => esc_html__( 'Background scrollbar', 'bw-medxtore-v2' ),
				'types' => [ 'classic'],
				'selector' => '{{WRAPPER}} .swiper-scrollbar',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'color_slider_scrollbar',
				'label' => esc_html__( 'Color scrollbar', 'bw-medxtore-v2' ),
				'types' => [ 'classic'],
				'selector' => '{{WRAPPER}} .swiper-scrollbar>div',
			]
		);

		$this->add_responsive_control(
			'border_slider_scrollbar',
			[
				'label' => esc_html__( 'Border radius scrollbar', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-scrollbar>div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .swiper-scrollbar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'slider_scrollbar_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', ],
				'selectors' => [
					'{{WRAPPER}} .swiper-scrollbar ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
		
		$this->end_controls_section();
	}
}
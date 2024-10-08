<?php
namespace Elementor;
use WP_Query;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Bzotech_Meta_Product_Global extends Widget_Base {

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
		return 'bzotech-meta-product-global';
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
		return esc_html__( 'Meta Product', 'bw-medxtore-v2' );
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
		return 'eicon-info-box';
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
		return [ 'bzotech-el-logo' ];
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
			'section_image',
			[
				'label' => esc_html__( 'Content', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			'content',
			[
				'label' 	=> esc_html__( 'Content', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'sku',
				'options'   => [
					'category'		=> esc_html__( 'Category', 'bw-medxtore-v2' ),
					'tag'		=> esc_html__( 'Tag', 'bw-medxtore-v2' ),
					'sku'		=> esc_html__( 'SKU', 'bw-medxtore-v2' ),
					'reviews'		=> esc_html__( 'Reviews', 'bw-medxtore-v2' ),
					'sold'		=> esc_html__( 'Sold', 'bw-medxtore-v2' ),
					'stock'		=> esc_html__( 'Stock', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your title', 'bw-medxtore-v2' ),
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'text',
				]
			]
		);

		
		$this->end_controls_section();
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
		$settings = $this->get_settings();
		$attr = array(
			'wdata'		=> $this,
			'settings'	=> $settings,
		);
		echo bzotech_get_template_elementor_global('meta-product/meta-product','',$attr);
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
}
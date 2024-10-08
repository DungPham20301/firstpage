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
class Bzotech_Mailchimp_Global extends Widget_Base {

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
		return 'bzotech-mailchimp-global';
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
		return esc_html__( 'Mailchimp (Global)', 'bw-medxtore-v2' );
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
		return 'eicon-mailchimp';
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
		return [ 'bzotech-el-mailchimp' ];
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
			'section_style',
			[
				'label' => esc_html__( 'Style', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'elbzotech-mailchimp-default',
				'options'   => [
					'default'		=> esc_html__( 'Default', 'bw-medxtore-v2' ),
					'style2'		=> esc_html__( 'Style 2 (Newletter popup)', 'bw-medxtore-v2' ),
					'style3'		=> esc_html__( 'Style 3 (Home 14)', 'bw-medxtore-v2' ),
					'style4'		=> esc_html__( 'Style 4', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title text', 'bw-medxtore-v2' ),
				'label_block' => true,
				'condition' => [
					'style' =>  ['style2'],
				]
			]
		);
		$this->add_control(
			'desc', [
				'label' => esc_html__( 'Description', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter description', 'bw-medxtore-v2' ),
				'label_block' => true,
				'condition' => [
					'style' =>  ['style2'],
				]
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'You can choose the icon image here (Replace for icon)', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'style' =>  ['style2'],
				]
			]
		);
		$repeater_style2 = new Repeater();
		$repeater_style2->add_control(
			'icon', [
				'label' => esc_html__( 'Icon social', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'placeholder' => esc_html__( 'Add Your Content Here', 'bw-medxtore-v2' ),
				'label_block' => true,
			]
		);
		$repeater_style2->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'You can add links for the element here', 'bw-medxtore-v2' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'list_social',
			[
				'label' => esc_html__( 'Add item social', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater_style2->get_controls(),
				'prevent_empty'=>false,
				'condition' => [
					'style' => ['style2'],
				]
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_form',
			[
				'label' => esc_html__( 'Form', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'form_id',
			[
				'label' => esc_html__( 'Form ID', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100000,
				'step' => 1,
			]
		);

		$this->add_control(
			'placeholder',
			[
				'label' => esc_html__( 'Placeholder', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Your email address', 'bw-medxtore-v2' ),
				'placeholder' => esc_html__( 'Type your placeholder here', 'bw-medxtore-v2' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-search',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'mailchimp_bttext',
			[
				'label' => esc_html__( 'Add text', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your text to add search button', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'mailchimp_bttext_pos',
			[
				'label' => esc_html__( 'Text position', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'after-icon',
				'options' => [
					'after-icon'   => esc_html__( 'After icon', 'bw-medxtore-v2' ),
					'before-icon'  => esc_html__( 'Before icon', 'bw-medxtore-v2' ),
				],
				'condition' => [
					'mailchimp_bttext!' => '',
					'icon[value]!' => '',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_popup',
			[
				'label' => esc_html__( 'Popup', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'popup_width',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .content-popup-mailchimp' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'popup_max-width',
			[
				'label' => esc_html__( 'Max Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .content-popup-mailchimp' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'popup_height',
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
					'{{WRAPPER}} .content-popup-mailchimp' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'popup_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .content-popup-mailchimp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'popup_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .content-popup-mailchimp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'popup_background',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .content-popup-mailchimp',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'popup_border',
				'selector' => '{{WRAPPER}} .content-popup-mailchimp',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'popup_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .content-popup-mailchimp' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'popup_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .content-popup-mailchimp',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_mailchimp_button',
			[
				'label' => esc_html__( 'Button', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width_icon',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap *[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);	

		$this->add_responsive_control(
			'height_icon',
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
					'{{WRAPPER}} .elbzotech-mailchimp-wrap *[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .elbzotech-text-bt-mailchimp > *' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);	

		$this->add_responsive_control(
			'size_icon',
			[
				'label' => esc_html__( 'Size icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"] i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_begin_tabs',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'mailchimp_button_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Icon Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"] i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mailchimp_text_button_typography',
				'label' => esc_html__( 'Typography button text', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"]',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_icon',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap *[type="submit"]',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__( 'Icon Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .elbzotech-submit-form:hover . *[type="submit"] i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mailchimp_text_button_typography_hover',
				'label' => esc_html__( 'Typography button text', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap .elbzotech-submit-form:hover . *[type="submit"]',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_icon_hover',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"]:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();		

		$this->add_control(
			'separator_end_tabs',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_responsive_control(
			'padding_icon',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap *[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'icon_border',
				'selector'  => '{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"]',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap  *[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_form',
			[
				'label' => esc_html__( 'Form', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width_form',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'max-width_form',
			[
				'label' => esc_html__( 'Max Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height_form',
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
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'align_form',
			[
				'label' => esc_html__( 'Alignment', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'default'	=> '',
				'options' => [
					'form-left' => [
						'title' => esc_html__( 'Left', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-left',
					],
					'form-center' => [
						'title' => esc_html__( 'Center', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-center',
					],
					'form-right' => [
						'title' => esc_html__( 'Right', 'bw-medxtore-v2' ),
						'icon' => 'eicon-text-align-right',
					],
				],
			]
		);

		$this->add_responsive_control(
			'padding_form',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_form',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background_form',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap form',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_form',
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap form',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'border_form_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap form',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_input',
			[
				'label' => esc_html__( 'Input', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width_input',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height_input',
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
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]' => 'line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_input',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_input',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_input',
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'border_input_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_box_shadow',
				'selector' => '{{WRAPPER}} .elbzotech-mailchimp-wrap .mc4wp-form-fields input[type="email"]',
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
		if(isset($settings['icon']['value'])) $icon_mailchimp = $settings['icon']['value'];
		else $icon = '';
		$attr = array(
			'wdata'		=> $this,
			'icon_mailchimp'		=> $icon_mailchimp,
			'settings'	=> $settings,
		);
		echo bzotech_get_template_elementor_global('mailchimp/mailchimp',$settings['style'],$attr);
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

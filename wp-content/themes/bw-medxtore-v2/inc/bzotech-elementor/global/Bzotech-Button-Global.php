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
class Bzotech_Button_Global extends Widget_Base {

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
		return 'bzotech-button-global';
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
		return esc_html__( 'Button (Global)', 'bw-medxtore-v2' );
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
		return [ 'bzotech-el-button' ];
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
		$this->add_render_attribute( 'button-wrap', 'class', 'button-wrap-global' );
		$check_icon = $settings['button_icon'];
		if(!empty($check_icon['value'])){
			$icon_show = 'icon-on';
		}else{$icon_show = 'icon-off';}

		$image_hover = '';
		$button_link = $settings['button_link'];
		if(!empty($settings['icon_image_hover']['url'])) $image_hover='yes';
		$this->add_render_attribute( 'button-inner', 'class', 'button-inner '.bzotech_implode($settings['css_by_theme_button']).' '.$icon_show.' elbzotech-bt-global-'.$settings['style'].'  elementor-animation-'.$settings['button_hover_animation'] );
		if($settings['button_action'] == 'click' || $settings['button_action'] == 'hover'){
			$this->add_render_attribute( 'button-inner', 'class', 'js-button-trigger-'.$settings['button_action'] );
			if($button_link['url']) $this->add_render_attribute( 'button-inner', 'href', $button_link['url']); else $this->add_render_attribute( 'button-inner', 'role', 'button' );
			$this->add_render_attribute( 'button-inner', 'data-trigger', $settings['elementor_trigger']);
		}else{
			
			if($button_link['is_external']) $this->add_render_attribute( 'button-inner', 'target', "_blank");
			if($button_link['nofollow']) $this->add_render_attribute( 'button-inner', 'rel', "nofollow");
			if($button_link['url']) $this->add_render_attribute( 'button-inner', 'href', $button_link['url']); else $this->add_render_attribute( 'button-inner', 'role', 'button' );
		}
		
		$this->add_render_attribute( 'button-inner', 'class', 'btn-flex-e image_hover-'.$image_hover);
		
		$attr = array(
			'wdata'		=> $this,
			'settings'	=> $settings,
		);
		echo bzotech_get_template_elementor_global('button/button',$settings['style'],$attr);
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
			'section_button',
			[
				'label' => esc_html__( 'Button', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default'		=> esc_html__( 'Style 1', 'bw-medxtore-v2' ),
					'style2'		=> esc_html__( 'Style 2', 'bw-medxtore-v2' ),
					'style3'		=> esc_html__( 'Style 3', 'bw-medxtore-v2' ),
					'style4'		=> esc_html__( 'Style 4', 'bw-medxtore-v2' ),
					'custom'		=> esc_html__( 'Style Custom', 'bw-medxtore-v2' ),
					
				],
			]
		);

		$this->add_control(
			'button_text', 
			[
				'label' => esc_html__( 'Button name', 'bw-medxtore-v2' ),
				'description' => esc_html__( 'Enter text of button', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Read more', 'bw-medxtore-v2' ),
				'placeholder' => esc_html__( 'Read more', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'condition' => [
					'icon_image[url]' =>  '',
				]
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__( 'Icon image', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'You can choose the icon image here (Replace for icon)', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'button_icon[value]' =>  '',
				]
			]
		);
		$this->add_control(
			'icon_image_hover',
			[
				'label' => esc_html__( 'Icon image hover', 'bw-medxtore-v2' ),
				'description'	=> esc_html__( 'You can choose the icon image here (Replace for icon)', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'icon_image[url]!' =>  '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'icon_image[url]!' =>  '',
				]
			]
		);
		$this->add_control(
			'button_action',
			[
				'label' => esc_html__( 'Action', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''   => esc_html__( 'Link dafault', 'bw-medxtore-v2' ),
					'click'  => esc_html__( 'Trigger to click over a certain element', 'bw-medxtore-v2' ),
					'hover'  => esc_html__( 'Trigger to hover over a certain element', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'button_icon_pos',
			[
				'label' => esc_html__( 'Icon position', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'after-text',
				'options' => [
					'after-text'   => esc_html__( 'After text', 'bw-medxtore-v2' ),
					'before-text'  => esc_html__( 'Before text', 'bw-medxtore-v2' ),
				],
				'condition' => [
					'button_icon[value]!' => '',
				]
			]
		);
		$this->add_control(
			'button_display',
			[
				'label' => esc_html__( 'Display', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''   => esc_html__( 'Default', 'bw-medxtore-v2' ),
					'inline-block'  => esc_html__( 'Inline block', 'bw-medxtore-v2' ),
					'block'  => esc_html__( 'block', 'bw-medxtore-v2' ),
					'flex'  => esc_html__( 'Flex', 'bw-medxtore-v2' ),
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'bw-medxtore-v2' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],

				'condition' => [
					'button_action' => ['','hover'],
				]
			]
		);	
		$this->add_control(
			'elementor_trigger',
			[
				'label' 	=> esc_html__( 'Enter select to trigger', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => '',
				'label_block' => true,
				'description'	=> esc_html__( 'EX: div.navi > .next', 'bw-medxtore-v2' ),
				'condition' => [
					'button_action' => ['click','hover'],
				]
			]
		);
		$this->add_responsive_control(
			'button_align',
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
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_button_flex',
			[
				'label' => esc_html__( 'Flex Container Control', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'button_display' =>  ['flex']
				]
			]
		);
		$this->get_style_type_container_flex_base('btn_flex','btn-flex-e');
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => esc_html__( 'Button', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'button_effects' );

		$this->start_controls_tab( 'button_normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .icon-off .text-button,{{WRAPPER}} .icon-on.button-inner',
				'label' => esc_html__( 'Typography', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-inner' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_shadow',
				'selector' => '{{WRAPPER}} .button-inner',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .button-inner',
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .button-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);
		$this->add_responsive_control(
			'button_width_css',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','vw' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button-inner,{{WRAPPER}} .button-wrap-global' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_height_css',
			[
				'label' => esc_html__( 'Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','vw' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button-inner' => 'height: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);
		$this->add_responsive_control(
			'button_line_height_css',
			[
				'label' => esc_html__( 'Line Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','vw' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button-inner' => 'Line-height: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'button_hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_hover',
				'label' => esc_html__( 'Typography hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .icon-off:hover .text-button,{{WRAPPER}} .icon-on.button-inner:hover',
			]
		);
		$this->add_control(
			'text_color_hover',
			[
				'label' => esc_html__( 'Color hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-inner:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .button-inner:hover .text-button' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'label' => esc_html__( 'Background hover', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button-inner:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_shadow_hover',
				'label' => esc_html__( 'button shadow hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .button-inner:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => esc_html__( 'Border hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .button-inner:hover',
			]
		);

		$this->add_responsive_control(
			'button_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button-inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_padding_hover',
			[
				'label' => esc_html__( 'Padding hover', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .icon-off:hover .text-button,{{WRAPPER}} .icon-on.button-inner:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'button_hover_animation',
			[
				'label' => esc_html__( 'Animation Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	

		$this->add_control(
			'button_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'separator'=>'before',
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-off .text-button,{{WRAPPER}} .icon-on.button-inner' => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_control(
			'css_by_theme_button',
			[
				'label' 	=> esc_html__( 'Add class style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT2,
				'default'   => '',
				'options'   => bzotech_list_class_style_by_theme(),
				'multiple'	=> true,
				'label_block' => true,
				'description'	=> esc_html__( 'Add class style by theme', 'bw-medxtore-v2' ),
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->start_controls_tabs( 'icon_effects' );

		$this->start_controls_tab( 'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
			]
		);
		$this->add_responsive_control(
			'size_icon',
			[
				'label' => esc_html__( 'Size icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon-button-el' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-button-el' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_background',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .icon-button-el',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border type', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .icon-button-el',
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-button-el' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab( 'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
			]
		);
		$this->add_responsive_control(
			'size_icon_hover',
			[
				'label' => esc_html__( 'Size icon hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon-button-el:hover' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Color icon hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-button-el:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_background_hover',
				'label' => esc_html__( 'Background Hover', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .icon-button-el:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border_hover',
				'label' => esc_html__( 'Border hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .icon-button-el:hover',
			]
		);

		$this->add_responsive_control(
			'icon_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-button-el:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		
		$this->add_responsive_control(
			'padding_icon',
			[
				'label' => esc_html__( 'Padding icon', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .icon-button-el' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => esc_html__( 'Margin icon', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .icon-button-el' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
	}

	public function get_style_type_container_flex_base($key='container_flex',$class="container-flex-e") {

		
		$start = is_rtl() ? 'right' : 'left';
		$end = is_rtl() ? 'left' : 'right';
		$this->add_responsive_control(
			$key.'_flex_direction',
			[
				'label' => esc_html__( 'Direction', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'responsive' => true,
				'label_block' => true,
				'options' => [
					'row' => [
						'title' => esc_html_x( 'Row - horizontal', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-arrow-' . $end,
					],
					'column' => [
						'title' => esc_html_x( 'Column - vertical', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-arrow-down',
					],
					'row-reverse' => [
						'title' => esc_html_x( 'Row - reversed', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-arrow-' . $start,
					],
					'column-reverse' => [
						'title' => esc_html_x( 'Column - reversed', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-arrow-up',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'flex-direction: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			$key.'_alignment',
			[
				'label' => esc_html__( 'Justify Content', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'responsive' => true,
				'label_block' => true,
				'options' => [
					'flex-start' => [
						'title' => esc_html_x( 'Start', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-start-h',
					],
					'center' => [
						'title' => esc_html_x( 'Center', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-center-h',
					],
					'flex-end' => [
						'title' => esc_html_x( 'End', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-end-h',
					],
					'space-between' => [
						'title' => esc_html_x( 'Space Between', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-space-between-h',
					],
					'space-around' => [
						'title' => esc_html_x( 'Space Around', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-space-around-h',
					],
					'space-evenly' => [
						'title' => esc_html_x( 'Space Evenly', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-justify-space-evenly-h',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'justify-content: {{VALUE}};',
				],
				'default' => '',
			]
		);

		$this->add_responsive_control(
			$key.'align_items',
			[
				'label' => esc_html__( 'Align Items', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'responsive' => true,
				'options' => [
					'flex-start' => [
						'title' => esc_html_x( 'Start', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-align-start-v',
					],
					'center' => [
						'title' => esc_html_x( 'Center', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-align-center-v',
					],
					'flex-end' => [
						'title' => esc_html_x( 'End', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-align-end-v',
					],
					'stretch' => [
						'title' => esc_html_x( 'Stretch', 'Flex Container Control', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-align-stretch-v',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'align-items: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			$key.'gap_item',
			[
				'label' => esc_html__( 'Gap', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			$key.'flex_wrap',
			[
				'label' => esc_html__( 'Wrap', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'nowrap' => [
						'title' => esc_html__( 'No Wrap', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-nowrap',
					],
					'wrap' => [
						'title' => esc_html__( 'Wrap', 'bw-medxtore-v2' ),
						'icon' => 'eicon-flex eicon-wrap',
					],
				],
				'description' => esc_html__(
					'Items within the container can stay in a single line (No wrap), or break into multiple lines (Wrap).','bw-medxtore-v2'
				),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'flex-wrap: {{VALUE}};',
				],
				'responsive' => true,
			]
		);
		
		
	}
}
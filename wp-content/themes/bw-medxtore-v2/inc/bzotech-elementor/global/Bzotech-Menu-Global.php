<?php
namespace Elementor;
use Bzotech_Walker_Nav_Menu;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Bzotech_Menu_Global extends Widget_Base {

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
		return 'bzotech-menu-global';
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
		return esc_html__( 'Menu (Global)', 'bw-medxtore-v2' );
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

	public function get_menus(){
        $list = [];
        $menus = wp_get_nav_menus();
        foreach($menus as $menu){
            $list[$menu->slug] = $menu->name;
        }

        return $list;
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
		return [ 'bzotech-menu' ];
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
            'content_tab',
            [
                'label' => esc_html__('Menu settings', 'bw-medxtore-v2'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
		);

        $this->add_control(
            'nav_menu',
            [
                'label'     =>esc_html__( 'Select menu', 'bw-medxtore-v2' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $this->get_menus(),
            ]
		);

		$this->add_control(
			'main_menu_style',
			[
				'label' => esc_html__( 'Menu style', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => esc_html__( 'Default', 'bw-medxtore-v2' ),
					'icon' => esc_html__( 'Menu icon', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'menu_sticky',
			[
				'label' => esc_html__( 'Menu sticky', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'on',
				'default' => '',
			]
		);
		$this->add_control(
			'megamenu_max_width',
			[
				'label' => esc_html__( 'Mega menu max width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 2000,
				'step' => 1,
				'default' => '',
				'description' => esc_html__( 'This index is used to determine the maximum width of the mega menu. Default is equal to container: 1440px', 'bw-medxtore-v2' ),
			]
		);

        $this->add_responsive_control(
			'alignment_menu_box',
			[
				'label' => esc_html__( 'Justify Content Text', 'bw-medxtore-v2' ),
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
					'{{WRAPPER}} .menu-global-style- .bzotech-navbar-nav' => 'justify-content: {{VALUE}};',
				],
				'default' => '',
				'condition' => [
					'main_menu_style' => '',
				]
			]
		);
		$this->add_responsive_control(
			'align_items_menu_box',
			[
				'label' => esc_html__( 'Align Items', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::CHOOSE,
				'responsive' => true,
				'label_block' => true,
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
					'{{WRAPPER}} .menu-global-style- .bzotech-navbar-nav' => 'align-items: {{VALUE}};',
				],
				'default' => '',
				'condition' => [
					'main_menu_style' => '',
				]
			]
		);
        $this->add_control(
			'menu_icon_position_content',
			[
				'label' => esc_html__( 'Menu position content', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'bw-medxtore-v2' ),
                    'right' => esc_html__( 'Right', 'bw-medxtore-v2' ),
				],

				'condition' => [
					'main_menu_style' => 'icon',
				]
			]
		);
        $this->add_control(
			'sub_menu_icon_display_style',
			[
				'label' => esc_html__( 'Sub menu display style', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'hover-left-or-right',
				'options' => [
					'hover-left-or-right'  => esc_html__( 'Hover show left or right', 'bw-medxtore-v2' ),
                    'accordion' => esc_html__( 'Click show accordion style', 'bw-medxtore-v2' ),
				],

				'condition' => [
					'main_menu_style' => 'icon',
				]
			]
		);
		$this->add_control(
			'menu_mobile_style',
			[
				'label' => esc_html__( 'Display menu style on mobile', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => esc_html__( 'Default dropdown type', 'bw-medxtore-v2' ),
					'left'  => esc_html__( 'Side Left', 'bw-medxtore-v2' ),
                    'right' => esc_html__( 'Side Right', 'bw-medxtore-v2' ),
				],
				'label_block' => true,
				'condition' => [
					'main_menu_style' => '',
				]
			]
		);
		$this->add_control(
			'menu_icon_title_text',
			[
				'label' => esc_html__( 'Menu icon title ', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter text' , 'bw-medxtore-v2' ),
				'condition' => [
					'main_menu_style' => 'icon',
				]
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bzotech_menubar_background',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
                'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .menu-global-style- .bzotech-navbar-nav',
				'condition' => [
					'main_menu_style' => '',
				]
			]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_menu_box',
				'selector' => '{{WRAPPER}} .menu-global-style- .bzotech-navbar-nav',
				'separator' => 'before',
				'condition' => [
					'main_menu_style' => '',
				]
			]
		);
        $this->add_responsive_control(
			'border_radius_menu_box',
			[
				'label' => esc_html__( 'Border radius', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .menu-global-style- .bzotech-navbar-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'main_menu_style' => '',
				]
			]
        ); 


		$this->end_controls_section();

		$this->start_controls_section(
            'content_side_tab',
            [
                'label' => esc_html__('Menu side/mobile', 'bw-medxtore-v2'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
					'main_menu_style' => 'icon',
				]
            ]

		);

		$this->add_control(
			'bzotech_nav_menu_logo',
			[
				'label' => esc_html__( 'Choose Mobile Menu Logo', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_responsive_control(
            'mobile_menu_panel_background',
            [
                'label' => esc_html__( 'Item text color', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-style-icon .bzotech-menu-inner' => 'background-image: linear-gradient(180deg, {{VALUE}} 0%, {{VALUE}} 100%);',
				],
            ]
        );

		$this->add_responsive_control(
			'mobile_menu_panel_spacing',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .menu-style-icon .bzotech-menu-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_menu_panel__head_spacing',
			[
				'label' => esc_html__( 'Head Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-nav-identity-panel.panel-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'mobile_menu_panel_width',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 260,
						'max' => 900,
						'step' => 1,
                    ],
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .menu-style-icon .bzotech-menu-inner' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
        // Custom menu item lv0
        $this->start_controls_section(
            'style_tab_menuitem',
            [
                'label' => esc_html__('Menu item style', 'bw-medxtore-v2'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Typography', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li > a',
			]
		);

        $this->add_responsive_control(
			'menu_item_spacing',
			[
				'label' => esc_html__( 'Spacing', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'menu_item_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
            'nav_menu_tabs'
		);
			// Normal
			$this->start_controls_tab(
				'nav_menu_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'item_background',
					'label' => esc_html__( 'Item background', 'bw-medxtore-v2' ),
					'types' => ['classic', 'gradient'],
					'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li > a',
				]
			);

			$this->add_responsive_control(
				'menu_text_color',
				[
					'label' => esc_html__( 'Item text color', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav > li > a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a .indicator-icon' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->end_controls_tab();

			// Hover
			$this->start_controls_tab(
				'nav_menu_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'bw-medxtore-v2' ),
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'item_background_hover',
					'label' => esc_html__( 'Item background', 'bw-medxtore-v2' ),
					'types' => ['classic', 'gradient'],
					'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li > a:hover, {{WRAPPER}} .bzotech-navbar-nav > li > a:focus, {{WRAPPER}} .bzotech-navbar-nav > li > a:active, {{WRAPPER}} .bzotech-navbar-nav > li:hover > a',
				]
			);
	
			$this->add_responsive_control(
				'item_color_hover',
				[
					'label' => esc_html__( 'Item text color', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:hover' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:focus' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:active' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li:hover > a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li:hover > a .bzotech-submenu-indicator' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:hover .bzotech-submenu-indicator' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:focus .bzotech-submenu-indicator' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li > a:active .bzotech-submenu-indicator' => 'color: {{VALUE}}',
					],
				]
			);

			$this->end_controls_tab();

			// active
			$this->start_controls_tab(
				'nav_menu_active_tab',
				[
					'label' => esc_html__( 'Active', 'bw-medxtore-v2' ),
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'		=> 'nav_menu_active_bg_color',
					'label' 	=> esc_html__( 'Item background', 'bw-medxtore-v2' ),
					'types'		=> ['classic', 'gradient'],
					'selector'	=> '{{WRAPPER}} .bzotech-navbar-nav > li.current-menu-item > a,{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li.current_page_item > a'
				]
			);
	
			$this->add_responsive_control(
				'nav_menu_active_text_color',
				[
					'label' => esc_html__( 'Item text color (Active)', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav > li.current-menu-item > a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li.current-menu-parent > a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li.current-menu-ancestor > a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav > li.current-menu-ancestor > a .bzotech-submenu-indicator' => 'color: {{VALUE}}',
					],
				]
			);	

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'menu_item0_border_heading',
			[
				'label' => esc_html__( 'Items Border', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item0_border',
				'label' => esc_html__( 'Border', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li > a',
			]
		);

		$this->add_control(
			'menu_item0_border_last_child_heading',
			[
				'label' => esc_html__( 'Border Last Child', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item0_border_last_child',
				'label' => esc_html__( 'Border last Child', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li:last-child > a',
			]
		);

		$this->add_control(
			'menu_item0_border_first_child_heading',
			[
				'label' => esc_html__( 'Border First Child', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item0_border_first_child',
				'label' => esc_html__( 'Border First Child', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav > li:first-child > a',
			]
		);
		$this->add_control(
			'style_effect_hover',
			[
				'label' => esc_html__( 'Effect hover style', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => esc_html__( 'None', 'bw-medxtore-v2' ),
					'effect-line-bottom'  => esc_html__( 'Line bottom', 'bw-medxtore-v2' ),
					'effect-line-top' => esc_html__( 'Line top', 'bw-medxtore-v2' ),
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'style_effect_hover_color',
			[
				'label' => esc_html__( 'Background Line', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .effect-line-bottom .bzotech-navbar-nav>li>a:after,{{WRAPPER}} .effect-line-top .bzotech-navbar-nav>li>a:after' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style_effect_hover!' => ''
				]
			]
		);
		$this->add_control(
			'style_effect_line_height',
			[
				'label' => esc_html__( 'Height Line', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .effect-line-bottom .bzotech-navbar-nav>li>a:after,{{WRAPPER}} .effect-line-top .bzotech-navbar-nav>li>a:after' => 'height: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'style_effect_hover!' => ''
				]
			]
		);
        $this->end_controls_section();
        // Custom sub menu item
        $this->start_controls_section(
            'style_tab_submenu_item',
            [
                'label' => esc_html__('Submenu item style', 'bw-medxtore-v2'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'style_tab_submenu_item_arrow',
			[
				'label' => esc_html__( 'Submenu Indicator', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bzotech_line_arrow',
				'options' => [
					'bzotech_line_arrow'  => esc_html__( 'Line Arrow', 'bw-medxtore-v2' ),
					'bzotech_plus_icon' => esc_html__( 'Plus', 'bw-medxtore-v2' ),
					'bzotech_fill_arrow' => esc_html__( 'Fill Arrow', 'bw-medxtore-v2' ),
					'bzotech_none' => esc_html__( 'None', 'bw-medxtore-v2' ),
                ],
			]
		);
		
		$this->add_responsive_control(
			'style_tab_submenu_indicator_color',
			[
				'label' => esc_html__( 'Indicator color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav .sub-menu a .indicator-icon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style_tab_submenu_item_arrow!' => 'bzotech_none'
				]
			]
		);
		$this->add_responsive_control(
			'submenu_indicator_spacing',
			[
				'label' => esc_html__( 'Indicator Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav-default a .indicator-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'style_tab_submenu_item_arrow!' => 'bzotech_none'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_item_typography',
				'label' => esc_html__( 'Typography', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a',
			]
        );

		$this->add_responsive_control(
			'submenu_item_spacing',
			[
				'label' => esc_html__( 'Spacing', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'submenu_active_hover_tabs'
		);
			$this->start_controls_tab(
				'submenu_normal_tab',
				[
					'label'	=> esc_html__('Normal', 'bw-medxtore-v2')
				]
			);

			$this->add_responsive_control(
				'submenu_item_color',
				[
					'label' => esc_html__( 'Item text color', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a' => 'color: {{VALUE}}',
					],
					
				]
			);
	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'menu_item_background',
					'label' => esc_html__( 'Item background', 'bw-medxtore-v2' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'submenu_hover_tab',
				[
					'label'	=> esc_html__('Hover', 'bw-medxtore-v2')
				]
			);
	
			$this->add_responsive_control(
				'item_text_color_hover',
				[
					'label' => esc_html__( 'Item text color (hover)', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:hover' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:focus' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:active' => 'color: {{VALUE}}',
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li:hover > a' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'menu_item_background_hover',
					'label' => esc_html__( 'Item background (hover)', 'bw-medxtore-v2' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '
					{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:hover,
					{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:focus,
					{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a:active,
					{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li:hover > a',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'submenu_active_tab',
				[
					'label'	=> esc_html__('Active', 'bw-medxtore-v2')
				]
			);

			$this->add_responsive_control(
				'nav_sub_menu_active_text_color',
				[
					'label' => esc_html__( 'Item text color (Active)', 'bw-medxtore-v2' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li.current-menu-item > a,{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li.current_page_item > a' => 'color: {{VALUE}} !important'
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'		=> 'nav_sub_menu_active_bg_color',
					'label' 	=> esc_html__( 'Item background (Active)', 'bw-medxtore-v2' ),
					'types'		=> ['classic', 'gradient'],
					'selector'	=> '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li.current-menu-item > a,{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li.current_page_item > a',
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'menu_item_border_heading',
			[
				'label' => esc_html__( 'Sub Menu Items Border', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item_border',
				'label' => esc_html__( 'Border', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li > a',
			]
		);

		$this->add_control(
			'menu_item_border_last_child_heading',
			[
				'label' => esc_html__( 'Border Last Child', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item_border_last_child',
				'label' => esc_html__( 'Border last Child', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li:last-child > a',
			]
		);

		$this->add_control(
			'menu_item_border_first_child_heading',
			[
				'label' => esc_html__( 'Border First Child', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'menu_item_border_first_child',
				'label' => esc_html__( 'Border First Child', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu > li:first-child > a',
			]
		);
		
        $this->end_controls_section();
		
        $this->start_controls_section(
            'style_tab_submenu_panel',
            [
                'label' => esc_html__('Submenu panel style', 'bw-medxtore-v2'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'panel_submenu_border',
				'label' => esc_html__( 'Panel Menu Border', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu',
			]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'submenu_container_background',
                'label' => esc_html__( 'Container background', 'bw-medxtore-v2' ),
                'types' => [ 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu',
            ]
        );

        $this->add_responsive_control(
			'submenu_panel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav .sub-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			'submenu_panel_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bzotech-navbar-nav .sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			'submenu_container_width',
			[
				'label' => esc_html__( 'Container width', 'bw-medxtore-v2' ),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .bzotech-navbar-nav .sub-menu' => 'min-width: {{VALUE}};',
                ]
			]
		);
		

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'panel_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .bzotech-navbar-nav .sub-menu',
			]
		);

        $this->end_controls_section();

       	$this->start_controls_section(
			'menu_toggle_style_tab',
			[
				'label' => esc_html__( 'Icon menu Style', 'bw-medxtore-v2' ),
                'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->get_style_type_container_flex('menu_toggle_style_flex','e-toggle-style-flex');
        $this->add_control(
			'heading_menu_toggle_style_icon',
			[
				'label' => esc_html__( 'Style icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->get_style_type_text('menu_toggle_style_icon','e-toggle-style-icon');
        $this->add_control(
			'heading_menu_toggle_style_title',
			[
				'label' => esc_html__( 'Style title icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->get_style_type_text('menu_toggle_style_icon_title','e-toggle-style-icon-title');



		$this->end_controls_section();

		$this->start_controls_section(
			'mobile_menu_logo_style_tab',
			[
				'label' => esc_html__( 'Mobile Menu Logo', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'mobile_menu_logo_width',
			[
				'label' => esc_html__( 'Width', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mobile-logo > img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_menu_logo_height',
			[
				'label' => esc_html__( 'Height', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mobile-logo > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_menu_logo_margin',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_menu_logo_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mobile-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$settings = $this->get_settings_for_display();
		$attr = array(
			'wdata'		=> $this,
			'settings'	=> $settings,
		);
		echo bzotech_get_template_elementor_global('menu/menu',$settings['main_menu_style'],$attr);
		
	}
	public function get_style_type_text($key='text',$class="item-text-e") {
		$this->start_controls_tabs( $key.'_tabs_style' );
		$this->start_controls_tab(
			$key.'_tab_normal_css',
			[
				'label' => esc_html__( 'Normal Style', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			$key.'_color_css',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'color: {{VALUE}}',
					'{{WRAPPER}} .'.$class.' .sub-color-e' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			$key.'bg_color_css',
			[
				'label' => esc_html__( 'Background Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => $key.'_typography_css',
				'label' => esc_html__( 'Text Typography', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);
		$this->add_responsive_control(
			$key.'_opacity_css',
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
					'{{WRAPPER}} .'.$class => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $key.'_shadow_css',
				'label' => esc_html__( 'Text Shadow', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);
		$this->add_control(
			$key.'display_css',
			[
				'label' => esc_html__( 'Display', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
					'inline' => esc_html__('Inline','bw-medxtore-v2' ),
					'block' => esc_html__('Block','bw-medxtore-v2' ),
					'inline-block' => esc_html__('Inline block	','bw-medxtore-v2' ),
					'flex' => esc_html__('Flex','bw-medxtore-v2' ),
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'display: {{VALUE}}',
				],
				'separator' => '',
			]
		);
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
				'condition' => [
					$key.'display_css' =>  ['flex'],
				]
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
				'condition' => [
					$key.'display_css' =>  ['flex'],
				]
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
				'condition' => [
					$key.'display_css' =>  ['flex'],
				]
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
				'condition' => [
					$key.'display_css' =>  ['flex'],
				]
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
				'condition' => [
					$key.'display_css' =>  ['flex'],
				]
			]
		);
		
		$this->add_responsive_control(
			$key.'_width_css',
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
					'{{WRAPPER}} .'.$class => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			$key.'_height_css',
			[
				'label' => esc_html__( 'Hight', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','vh' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_responsive_control(
			$key.'_padding_css',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			$key.'_margin_css',
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
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border_css',
				'selector' => '{{WRAPPER}} .'.$class,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			 $key.'_border_radius_css',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab(); /*End Normal Style*/

		$this->start_controls_tab(
			$key.'_tab_hover_css',
			[
				'label' => esc_html__( 'Style On Hover', 'bw-medxtore-v2' ),
			]
		);
		$this->add_control(
			$key.'_color_hover_css',
			[
				'label' => esc_html__( 'Color On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .'.$class.':hover .sub-color-e' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			$key.'_bg_color_hover_css',
			[
				'label' => esc_html__( 'Background Color On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover, {{WRAPPER}} .'.$class.':focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => $key.'_typography_hover_css',
				'label' => esc_html__( 'Typography On Hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class.':hover',
			]
		);
		$this->add_responsive_control(
			$key.'_opacity_hover_css',
			[
				'label' => esc_html__( 'Opacity On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => $key.'_shadow_hover_css',
				'label' => esc_html__( 'Shadow On Hover', 'bw-medxtore-v2' ),
				'selector' => '{{WRAPPER}} .'.$class.':hover',
			]
		);
		$this->add_control(
			$key.'_hover_transition_css',
			[
				'label' => esc_html__( 'Transition Duration On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .'.$class => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_control(
			$key.'_animation_hover_css',
			[
				'label' => esc_html__( 'Animation On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();/*End Hover Style*/
		$this->end_controls_tabs();
	}
	public function get_style_type_icon($key='icon',$class="item-icon-e") {
		$this->start_controls_tabs( $key.'_tabs_style' );
		$this->start_controls_tab(
			$key.'_tab_normal',
			[
				'label' => esc_html__( 'Normal Style', 'bw-medxtore-v2' ),
			]
		);
		$this->add_responsive_control(
			$key.'_size_css',
			[
				'label' => esc_html__( 'Font Size', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'max' => 200,
						'min' => 0,
						'step' => 1,
					],
					'em' => [
						'max' => 200,
						'min' => 0,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			$key.'_color_css',
			[
				'label' => esc_html__( 'Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'color: {{VALUE}}',
					'{{WRAPPER}} .'.$class.' .sub-color-e' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			$key.'bg_color_css',
			[
				'label' => esc_html__( 'Background Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border_css',
				'selector' => '{{WRAPPER}} .'.$class,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			 $key.'_border_radius_css',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			$key.'_opacity_css',
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
					'{{WRAPPER}} .'.$class => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_responsive_control(
			$key.'_padding_css',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			$key.'_margin_css',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
		$this->end_controls_tab(); /*End Normal Style*/

		$this->start_controls_tab(
			$key.'_tab_hover',
			[
				'label' => esc_html__( 'Hover Style', 'bw-medxtore-v2' ),
			]
		);
		$this->add_responsive_control(
			$key.'_size_hover_css',
			[
				'label' => esc_html__( 'Size On Hover ', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'max' => 200,
						'min' => 0,
						'step' => 1,
					],
					'em' => [
						'max' => 200,
						'min' => 0,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			$key.'_color_hover_css',
			[
				'label' => esc_html__( 'Color On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .'.$class.':hover .sub_color_e' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			$key.'_bg_hover_css',
			[
				'label' => esc_html__( 'Background Color On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover, {{WRAPPER}} .'.$class.':focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			$key.'_opacity_hover_css',
			[
				'label' => esc_html__( 'Opacity On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class.':hover' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			$key.'_hover_transition_css',
			[
				'label' => esc_html__( 'Transition Duration On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .'.$class => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			$key.'_animation_hover_css',
			[
				'label' => esc_html__( 'Animation On Hover', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();/*End Hover Style*/
		$this->end_controls_tabs();
	}
	public function get_style_type_container_flex($key='container_flex',$class="container-flex-e") {

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => $key.'_bg',
				'label' => esc_html__( 'Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);
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
		
		$this->add_responsive_control(
			$key.'_width_css',
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
					'{{WRAPPER}} .'.$class => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			$key.'_height_css',
			[
				'label' => esc_html__( 'Hight', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','vh' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);
		
		$this->add_responsive_control(
			$key.'_padding_css',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			$key.'_margin_css',
			[
				'label' => esc_html__( 'Margin', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', ],
				'selectors' => [
					'{{WRAPPER}} .'.$class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $key.'_border_css',
				'selector' => '{{WRAPPER}} .'.$class,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			 $key.'_border_radius_css',
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
				'name' =>  $key.'_box_shadow_css',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .'.$class,
			]
		);
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
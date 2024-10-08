<?php
namespace Elementor;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Bzotech_Heading_Global extends Widget_Base {
	public function get_name() {
		return 'bzotech-heading-global';
	}
	public function get_title() {
		return esc_html__( 'Headding and Text Editor (Global)', 'bw-medxtore-v2' );
	}
	public function get_icon() {
		return 'eicon-t-letter';
	}
	public function get_categories() {
		return [ 'aqb-htelement-category' ];
	}
	public function get_keywords() {
		return [ 'heading', 'title', 'text','text editor' ];
	}
	public function get_script_depends() {
		return [ 'hello-world' ];
	}
	public function get_style_depends() {
		return [ 'bzotech-el-heading' ];
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title_id ='';
		if($settings['title_auto'] =='yes'){
			$id = get_the_ID();
			if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
		    if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
		    if($id) $title_id  = get_the_title($id);
		    else $title_id = esc_html__("Our Blog",'bw-medxtore-v2');

		    if(is_single() && !empty($settings['title_single_post'])) $title_id = $settings['title_single_post'];
			
		    if(is_archive()) $title_id = get_the_archive_title();
		    if(is_search()) $title_id =  sprintf( esc_html__( 'Search results for: %s', 'bw-medxtore-v2' ), '<span class="title-search-query">' . get_search_query() . '</span>' );
		    if(bzotech_is_woocommerce_page()) $title_id = woocommerce_page_title(false);
		   	if(is_singular('product') && !empty($settings['title_single_product'])) $title_id = $settings['title_single_product'];
		}

		$attr = array(
			'wdata'		=> $this,
			'settings'	=> $settings,
			'title_id'	=> $title_id,
		);
		
		echo bzotech_get_template_elementor_global('heading-editor/heading-editor',$settings['header_style'],$attr);
	}
	
	protected function content_template() {
		
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
			]
		);

		$this->add_control(
			'header_style',
			[
				'label' 	=> esc_html__( 'Style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					''		=> esc_html__( 'Text Editor', 'bw-medxtore-v2' ),
					'style1'		=> esc_html__( 'Heading Editor', 'bw-medxtore-v2' ),
					'style2'		=> esc_html__( 'Heading Style 2', 'bw-medxtore-v2' ),
					'mouse-cursor'		=> esc_html__( 'Mouse cursor (Drag)', 'bw-medxtore-v2' ),
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your title', 'bw-medxtore-v2' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'bw-medxtore-v2' ),
				'condition' => [
					'header_style!' => '',
					'title_auto' => '',
				]
			]
		);
		
		$this->add_control(
			'editor',
			[
				'label' => esc_html__( 'Text', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'bw-medxtore-v2' ) . '</p>',
				'condition' => [
					'header_style' => '',
				]
			]
		);
		$this->add_control(
			'title_auto',
			[
				'label' => esc_html__( 'Auto title by page', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'title_line',
			[
				'label' => esc_html__( 'Show line', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'bw-medxtore-v2' ),
				'label_off' => esc_html__( 'Off', 'bw-medxtore-v2' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'title_shadow_text',
			[
				'label' => esc_html__( 'Text shadow', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter text shadow', 'bw-medxtore-v2' ),
				'condition' => [
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'image_left',
			[
				'label' => esc_html__( 'Image left', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'header_style' => 'style2',
				]
			]
		);
		$this->add_control(
			'image_right',
			[
				'label' => esc_html__( 'Image right', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'header_style' => 'style2',
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
					'header_style' => 'style2',
				]
			]
		);
		$this->add_responsive_control(
			'title_padding_style2',
			[
				'label' => esc_html__( 'Space between text and image', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-heading-global-style2>span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_space_top',
			[
				'label' => esc_html__( 'Vertical image distance', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elbzotech-heading-global-style2>span> img' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_hedding',
			[
				'label' => esc_html__( 'Icon', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => '',
					'library' => 'solid',
				],
				'condition' => [
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'title_single_post',
			[
				'label' => esc_html__( 'Title Single Post', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'bw-medxtore-v2' ),
				'default' => '',
				'condition' => [
					'title_auto' => 'yes',
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'title_single_product',
			[
				'label' => esc_html__( 'Title Single Product', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'bw-medxtore-v2' ),
				'default' =>'',
				'condition' => [
					'title_auto' => 'yes',
					'header_style!' => '',
				]
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '',
				],
				'separator' => 'before',
				'condition' => [
					'header_style!' => ['','mouse-cursor'],
				]
			]
		);

		$this->add_control(
			'header_size',
			[
				'label' => esc_html__( 'HTML Tag', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
				'condition' => [
					'header_style!' => ['','mouse-cursor'],
				]
			]
		);

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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'bw-medxtore-v2' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'max-width-text',
			[
				'label' => esc_html__( 'Max Width', 'bw-medxtore-v2' ) . ' (px)',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg_color',
				'label' => esc_html__( 'Text Background', 'bw-medxtore-v2' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .text-css-e',
				
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .text-css-e',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .text-css-e',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'css_border_elementor',
				'selector' => '{{WRAPPER}} .text-css-e',
			]
		);
		$this->add_responsive_control(
			'border_radius_box',
			[
				'label' => esc_html__( 'Border Radius', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' 				=> esc_html__('Normal', 'bw-medxtore-v2'),
					'multiply'		=> esc_html__('Multiply', 'bw-medxtore-v2'),
					'screen' 		=> esc_html__('Screen', 'bw-medxtore-v2'),
					'overlay' 		=> esc_html__('Overlay', 'bw-medxtore-v2'),
					'darken' 		=> esc_html__('Darken', 'bw-medxtore-v2'),
					'lighten' 		=> esc_html__('Lighten', 'bw-medxtore-v2'),
					'color-dodge'	=> esc_html__('Color Dodge', 'bw-medxtore-v2'),
					'saturation' 	=> esc_html__('Saturation', 'bw-medxtore-v2'),
					'color' 		=> esc_html__('Color', 'bw-medxtore-v2'),
					'difference' 	=> esc_html__('Difference', 'bw-medxtore-v2'),
					'exclusion' 	=> esc_html__('Exclusion', 'bw-medxtore-v2'),
					'hue' 			=> esc_html__('Hue', 'bw-medxtore-v2'),
					'luminosity' 	=> esc_html__('Luminosity', 'bw-medxtore-v2'),
				],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->add_control(
			'display_css',
			[
				'label' => esc_html__( 'Display', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'bw-medxtore-v2' ),
					'inline' => esc_html__('Inline','bw-medxtore-v2' ),
					'block' => esc_html__('Block','bw-medxtore-v2' ),
					'contents' => esc_html__('Contents','bw-medxtore-v2' ),
					'inline-block' => esc_html__('Inline block	','bw-medxtore-v2' ),
					'flex' => esc_html__('Flex','bw-medxtore-v2' ),
					'grid' => esc_html__('Grid','bw-medxtore-v2' ),
					'inherit' => esc_html__('Inherit','bw-medxtore-v2' ),
					'initial' => esc_html__('Initial','bw-medxtore-v2' ),
					'list-item' => esc_html__('List item','bw-medxtore-v2' ),
					'inline-table' => esc_html__('Inline table','bw-medxtore-v2' ),
					'inline-grid' => esc_html__('Inline grid','bw-medxtore-v2' ),
					'inline-flex' => esc_html__('Inline flex','bw-medxtore-v2' ),
					'table' => esc_html__('Table','bw-medxtore-v2' ),
					'table-caption' => esc_html__('Table caption','bw-medxtore-v2' ),
					'table-column-group' => esc_html__('Table column group','bw-medxtore-v2' ),
					'table-header-group' => esc_html__('Table header group','bw-medxtore-v2' ),
					'table-footer-group' => esc_html__('Table footer group','bw-medxtore-v2' ),
					'table-row-group' => esc_html__('Table row group','bw-medxtore-v2' ),
					'table-cell' => esc_html__('Table cell','bw-medxtore-v2' ),
					'table-column' => esc_html__('Table column','bw-medxtore-v2' ),
					'table-row' => esc_html__('Table row','bw-medxtore-v2' ),
					'run-in' => esc_html__('Run in','bw-medxtore-v2' ),
				],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'display: {{VALUE}}',
				],
				'separator' => '',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .text-css-e' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'css_by_theme_title',
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
			'section_style_container_flex',
			[
				'label' => esc_html__( 'Flex Container Control (Box)', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'header_style!' =>  [''],
					'display_css' =>  'flex'
				]
			]
		);
		$this->get_style_type_container_flex();
		
		$this->end_controls_section(); 
		$this->start_controls_section(
			'section_style_line',
			[
				'label' => esc_html__( 'Line style', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'header_style!' =>  [''],
					'title_line' =>  'yes'
				]
			]
		);
		$this->get_style_type_line();
		
		$this->end_controls_section(); /*End Icon style*/
		$this->start_controls_section(
			'section_style_text_shadow',
			[
				'label' => esc_html__( 'Title shadow', 'bw-medxtore-v2' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'header_style!' =>  [''],
					'title_shadow_text!' =>  ''
				]
			]
		);
		$this->add_control(
			'title_color_text_shadow',
			[
				'label' => esc_html__( 'Text Color', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-title_shadow' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_text_shadow',
				'selector' => '{{WRAPPER}} .type-title_shadow',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_responsive_control(
			'text_shadow_top_css',
			[
				'label' => esc_html__( 'Top', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .type-title_shadow' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'text_shadow_right_css',
			[
				'label' => esc_html__( 'Right', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .type-title_shadow' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'text_shadow_left_css',
			[
				'label' => esc_html__( 'Left', 'bw-medxtore-v2' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px','custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .type-title_shadow' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'text_shadow_width_css',
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
					'{{WRAPPER}} .type-title_shadow' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
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
	public function get_style_type_line($key='line',$class="line-e") {

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
		$this->add_control(
			$key.'_css_by_theme_title',
			[
				'label' 	=> esc_html__( 'Add class style', 'bw-medxtore-v2' ),
				'type'      => Controls_Manager::SELECT2,
				'default'   => '',
				'options'   => bzotech_list_class_style_by_theme(),
				'multiple'	=> true,
				'label_block' => true,
				'description'	=> esc_html__( 'Add class style by theme root', 'bw-medxtore-v2' ),
			]
		);
	}
	
}

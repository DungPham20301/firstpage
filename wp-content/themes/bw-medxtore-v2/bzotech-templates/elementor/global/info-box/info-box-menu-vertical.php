<?php
namespace Elementor;
extract($settings);
use Bzotech_Template;
$wdata->add_render_attribute( 'wrapper', 'class', 'js-info-box-menu-vertical dropdow-style-'.$style_show_dropdow.' bzoteche-info-box-global-'.$settings['style']);
$icon_title_html = '';
if(!empty( $icon['value'])){				
	if( $icon['library'] == 'svg')
		$icon_title_html = '<img class="item-icon-e" alt="'.esc_attr__('svg','bw-medxtore-v2').'" src="'.$icon['value']['url'].'">';
	else $icon_title_html = '<i class="item-icon-e '.$icon['value'].'"></i>';
} 


?>
<div <?php echo apply_filters('bzotech_output_content', $wdata->get_render_attribute_string('wrapper'));?>>
	
	<?php 
	if(!empty($menu_vertical_title)) echo '<div class="header-info header-info-style1"><h3 class="title-info"><span>'.$icon_title_html.$menu_vertical_title.'</span><i class="las la-angle-down"></i></h3></div>';
	?>
	<?php 
	if(!empty($menu_vertical_list) and is_array($menu_vertical_list)) { 
        echo '<div class="list-menu-vertical-wap"><div class = "list-menu-vertical flex-wrapper info-container-flex-e">';?>
        <?php
        foreach ($menu_vertical_list as $key => $item ) {
        	$icon_menu_html = $class_item='';
        	if(!empty($item['template'])) $class_item = 'mega-template';
        	echo '<div class="list-menu-vertical__item '.$class_item.'">';
				if(!empty( $item['icon']['value'])){				
					if( $item['icon']['library'] == 'svg')
						$icon_menu_html = '<img class="item-icon-menu-vertical" alt="'.esc_attr__('svg','bw-medxtore-v2').'" src="'.$item['icon']['value']['url'].'">';
					else $icon_menu_html = '<i class="item-icon-menu-vertical '.$item['icon']['value'].'"></i>';
				}
				$icon_sub_menu = '';
				if(!empty($item['template'])) $icon_sub_menu = '<i class="las la-angle-right icon_sub_menu"></i>';
				$image_html = '';
				if(!empty($item['image']['url'])){
				    $image_html = '<span class="image-icon image-icon1">'.wp_get_attachment_image( $item['image']['id'] ,'full').'</span>';
				}
				if(!empty($item['image_hover']['url'])){
				    $image_html .= '<span class="image-icon image-hover ">'.wp_get_attachment_image( $item['image_hover']['id'] ,'full').'</span>';
				}
				if(!empty($item['link']) )
				$wdata->add_link_attributes( 'data_link_menu'.$key, $item['link']);
				if(!empty($item['image']['url'])){
					
					echo '<a '.$wdata->get_render_attribute_string( 'data_link_menu'.$key ).' class="list-menu-vertical__item-link justify_content-space-between"><div class="item-cont">'.$image_html.'<span class="elementor-repeater-item-'.$item['_id'].'">'.$item['title'].'</span></div>'.$icon_sub_menu.'</a>';
				} else {
					echo '<a '.$wdata->get_render_attribute_string( 'data_link_menu'.$key ).' class="list-menu-vertical__item-link justify_content-space-between"><span>'.$icon_menu_html.'<span class="elementor-repeater-item-'.$item['_id'].'">'.$item['title'].'</span></span>'.$icon_sub_menu.'</a>';
				}
				if(!empty($item['template'])) echo '<div class="list-menu-vertical__item-sub container-base-e">'.Bzotech_Template::get_vc_pagecontent($item['template']).'</div>';	
       		echo '</div>';
        }
        echo '</div></div>';
    }
	?>

</div>
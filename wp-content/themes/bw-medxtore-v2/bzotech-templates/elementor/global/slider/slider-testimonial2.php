<?php
namespace Elementor;
extract($settings); 
use Bzotech_Template;

$icon_testimonial = '<svg xmlns="http://www.w3.org/2000/svg" width="45" height="33" viewBox="0 0 45 33" fill="none"><g clip-path="url(#clip0_98_3059)"><path d="M10.5397 0C13.4097 0 15.8597 1.12 17.8897 3.35C18.8597 4.39 19.6197 5.64 20.1897 7.13C20.7597 8.61 21.0397 10.11 21.0397 11.61C21.0397 14.78 20.0097 17.99 17.9397 21.24C15.8697 24.49 13.0997 27.25 9.63969 29.52C6.70969 31.45 4.39969 32.42 2.73969 32.42C2.06969 32.42 1.51969 32.22 1.08969 31.82C0.649688 31.42 0.429688 30.88 0.429688 30.22C0.429688 29.22 1.05969 28.39 2.32969 27.72C5.35969 26.15 7.57969 24.6 8.97969 23.07C10.3097 21.64 10.9797 20.59 10.9797 19.92C10.9797 19.29 10.4797 18.9 9.47969 18.77L8.82969 18.67L8.07969 18.62C5.90969 18.29 4.14969 17.28 2.79969 15.59C1.44969 13.9 0.769688 11.86 0.769688 9.46C0.769688 6.99 1.59969 4.86 3.26969 3.06C5.17969 1.02 7.59969 0 10.5397 0Z" fill="#FF7831"/><path d="M34.4994 0C37.3694 0 39.8194 1.12 41.8494 3.35C42.8194 4.39 43.5794 5.64 44.1494 7.13C44.7194 8.61 44.9994 10.11 44.9994 11.61C44.9994 14.78 43.9694 17.99 41.8994 21.24C39.8294 24.49 37.0594 27.25 33.5994 29.52C30.6594 31.45 28.3594 32.42 26.6994 32.42C26.0294 32.42 25.4794 32.22 25.0494 31.82C24.6194 31.42 24.3994 30.89 24.3994 30.22C24.3994 29.22 25.0294 28.39 26.2994 27.72C29.3294 26.15 31.5494 24.6 32.9494 23.07C34.2794 21.64 34.9494 20.59 34.9494 19.92C34.9494 19.29 34.4494 18.9 33.4494 18.77L32.7994 18.67L32.0494 18.62C29.8794 18.29 28.1194 17.28 26.7694 15.59C25.4194 13.91 24.7394 11.86 24.7394 9.46C24.7394 6.99 25.5694 4.86 27.2394 3.06C29.1494 1.02 31.5594 0 34.4994 0Z" fill="#FF7831"/></g><defs><clipPath id="clip0_98_3059"><rect width="44.57" height="32.42" fill="white" transform="translate(0.429688)"/></clipPath></defs></svg>';

$icon_star = '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<g id="STAR"><path id="Vector" d="M-1.96127e-08 19.9995C-3.0444e-08 20.2473 8.9543 20.4481 20 20.4481C31.0457 20.4481 40 20.2473 40 19.9995C40 19.7517 31.0457 19.5508 20 19.5508C8.9543 19.5508 -8.78138e-09 19.7517 -1.96127e-08 19.9995Z" fill="#2E2E2E"/><path id="Vector_2" d="M19.5519 20C19.5519 31.0457 19.7528 40 20.0005 40C20.2483 40 20.4492 31.0457 20.4492 20C20.4492 8.95432 20.2483 -8.78067e-09 20.0005 -1.9612e-08C19.7528 -3.04433e-08 19.5519 8.95432 19.5519 20Z" fill="#2E2E2E"/><path id="Vector_3" d="M20.2332 20.2327C14.5324 25.9334 9.80825 30.4517 9.68156 30.3251C9.55488 30.1984 14.0732 25.4742 19.7739 19.7734C25.4746 14.0727 30.1988 9.55438 30.3255 9.68107C30.4522 9.80775 25.9339 14.532 20.2332 20.2327Z" fill="#2E2E2E"/><path id="Vector_4" d="M20.2332 19.7673C25.9339 25.4681 30.4522 30.1923 30.3255 30.3189C30.1988 30.4456 25.4746 25.9273 19.7739 20.2266C14.0732 14.5258 9.55488 9.80165 9.68156 9.67496C9.80825 9.54828 14.5324 14.0666 20.2332 19.7673Z" fill="#2E2E2E"/><path id="Vector_5" d="M20.305 20.1204C17.3808 27.6369 14.8788 33.6702 14.7099 33.6068C14.541 33.5435 16.7738 27.3941 19.6927 19.8829C22.617 12.3664 25.119 6.33315 25.2879 6.39649C25.4568 6.45983 23.224 12.6092 20.305 20.1204Z" fill="#2E2E2E"/><path id="Vector_6" d="M20.1225 19.693C27.639 22.6173 33.6722 25.1192 33.6089 25.2881C33.5455 25.4571 27.3962 23.2243 19.8849 20.3053C12.3684 17.381 6.3352 14.8791 6.39854 14.7102C6.46188 14.5412 12.6113 16.774 20.1225 19.693Z" fill="#2E2E2E"/><path id="Vector_7" d="M20.137 20.3005C12.7947 23.6312 6.7826 26.2018 6.7087 26.0382C6.6348 25.8746 12.5255 23.0401 19.8678 19.7041C27.2101 16.3734 33.2223 13.8028 33.2962 13.9664C33.3701 14.13 27.4794 16.9645 20.137 20.3005Z" fill="#2E2E2E"/><path id="Vector_8" d="M20.3018 19.863C23.6325 27.2053 26.2031 33.2174 26.0395 33.2913C25.8758 33.3652 23.0413 27.4745 19.7054 20.1322C16.3747 12.7899 13.8041 6.77771 13.9677 6.70381C14.1313 6.62991 16.9658 12.5206 20.3018 19.863Z" fill="#2E2E2E"/>
</svg>';
?>

<?php echo '<div '.$wdata->get_render_attribute_string( 'elbzotech-wrapper' ).'>';?>
    <?php echo '<div '.$wdata->get_render_attribute_string( 'elbzotech-wrapper-slider' ).'>';?>
        <?php echo '<div '.$wdata->get_render_attribute_string( 'elbzotech-inner' ).'>';?>
            <?php 
            foreach (  $list_testimonial1 as $key => $item ) {

                $wdata->add_render_attribute( 'elbzotech-item-slider-'.$style.'-'.$key, 'class', 'swiper-slide wslider-item elementor-repeater-item-'.$item['_id'] );
                echo '<div '.$wdata->get_render_attribute_string( 'elbzotech-item-slider-'.$style.'-'.$key ).'><div class="item-slider-global-'.$style.'">';
                    
                    echo '<div class="flex-wrapper align_items-center">';
                        if(!empty($item['image']['url'])) {
                            if($item['link']['is_external']) $wdata->add_render_attribute( 'img-link', 'target', "_blank");
                            if($item['link']['nofollow']) $wdata->add_render_attribute( 'img-link', 'rel', "nofollow");
                            
                            if($item['image_action']){
                                $wdata->add_render_attribute( 'img-link', 'href', $item['image']['url']);
                            } else
                            if($item['link']['url']) $wdata->add_render_attribute( 'img-link', 'href', $item['link']['url']);

                            echo '<div class="image-wrap zoom-image elementor-animation-'.$image_hover_animation.'"><a '.$wdata->get_render_attribute_string('img-link').' class="img-wrap adv-thumb-link">';
                            echo Group_Control_Image_Size::get_attachment_image_html( $list_testimonial1[$key], 'thumbnail', 'image' );
                            echo '</a></div>';
                        }
                        echo '<div class="info-client">';
                            echo '<div class="info-client1">';
                                echo '<div class="icon_testimonial">'.$icon_testimonial.'</div>';
                                if(!empty($item['title'])) echo '<h3 class="title title26 text-uppercase main-color font-bold">'.$item['title'].'</h3>';
                                if(!empty($item['description'])) echo '<p class="desc title16">'.$item['description'].'</p>';
                                if(!empty($item['number_star'])) echo '<div class="product-rate"><div class="product-rating number-star_'.$item['number_star'].'"></div></div>';
                                echo '<div class="content-slider-custom box-content-custom title20 font-medium">'.bzotech_parse_text_editor( $item['content']).'</div>';
                                
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                   
                       
                echo '</div></div>';

                $wdata->remove_render_attribute( 'img-link', 'target', "_blank" );
                $wdata->remove_render_attribute( 'img-link', 'rel', "nofollow");
                $wdata->remove_render_attribute( 'img-link', 'href', $item['link']['url']);
                $wdata->remove_render_attribute( 'img-link', 'href', $item['image']['url']);
                $wdata->remove_render_attribute( 'elbzotech-item', 'class', 'elementor-repeater-item-'.$item['_id'] );
            }
            ?>
        </div>
    </div>
    <?php if ( $slider_navigation !== '' ):?>
        <div class="bzotech-swiper-navi">
            <div class="swiper-button-nav swiper-button-next"><?php Icons_Manager::render_icon( $slider_icon_next, [ 'aria-hidden' => 'true' ] );?></div>
            <div class="swiper-button-nav swiper-button-prev"><?php Icons_Manager::render_icon( $slider_icon_prev, [ 'aria-hidden' => 'true' ] );?></div>
        </div>
    <?php endif?>
    <?php if ( $slider_pagination !== '' ):?>
        <div class="swiper-pagination"></div>
    <?php endif?>
    <?php if ( $slider_scrollbar !== '' ):?>
        <div class="swiper-scrollbar"></div>
    <?php endif?>
</div>
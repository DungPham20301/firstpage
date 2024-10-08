<?php
$zoom_style = bzotech_get_option('product_image_zoom');
global $product;
$thumb_id = array(get_post_thumbnail_id());
$attachment_ids = $product->get_gallery_image_ids();
$attachment_ids = array_merge($thumb_id,$attachment_ids);
$gallerys = ''; $i = 1;
foreach ( $attachment_ids as $attachment_id ) {
    $image_link = wp_get_attachment_url( $attachment_id );
    if($i == 1) $gallerys .= $image_link;
    else $gallerys .= ','.$image_link;
    $i++;
}

$sidebar=bzotech_get_sidebar();
$sidebar_pos=$sidebar['position'];
$thumb_class = 'bzotech-col-sm-6 bzotech-col-xs-12';
$info_class = 'bzotech-col-sm-6 bzotech-col-xs-12';

if($sidebar_pos!=='no'){
    $thumb_class = 'bzotech-col-sm-6 bzotech-col-xs-12';
    $info_class = 'bzotech-col-sm-6 bzotech-col-xs-12';
}
?>
<div class="product-detail detail-<?php echo esc_attr($style_woo_single);?>">
    <div class="bzotech-row">
        <div class="<?php echo esc_attr($thumb_class)?>">
            <div class="detail-gallery detail-gallery-sticky">
                <?php
                global $product;
                $thumb_id = array(get_post_thumbnail_id());
                $attachment_ids = $product->get_gallery_image_ids();
                $attachment_ids = array_merge($thumb_id,$attachment_ids);
                $gallerys = ''; $i = 1;
                foreach ( $attachment_ids as $attachment_id ) {
                    $image_link = wp_get_attachment_url( $attachment_id );
                    if($i == 1) $gallerys .= $image_link;
                    else $gallerys .= ','.$image_link;
                    $i++;
                }
                if ( $attachment_ids && has_post_thumbnail() ) {
                    ?>
                    <div class="wrap-gallery-sticky">
                        <div class="list-gallery-sticky">
                            <?php
                            foreach ( $attachment_ids as $attachment_id ) {
                                $attributes      = array(
                                    'data-src'      => wp_get_attachment_image_url( $attachment_id, 'shop_single' ),
                                    'data-srcset'   => wp_get_attachment_image_srcset( $attachment_id, 'shop_single' ),
                                    'data-srcfull'  => wp_get_attachment_image_url( $attachment_id, 'full' ),
                                );
                                $html = wp_get_attachment_image($attachment_id,'shop_single',false,$attributes );
                                echo   '<div class="item-gallery-sticky">
										<a title="'.esc_attr( get_the_title( $attachment_id ) ).'" class="fancybox-product-detail" href="'.esc_url(wp_get_attachment_image_url($attachment_id,'full')).'"  data-fancybox-group="gallery">
											'.apply_filters( 'woocommerce_single_product_image_thumbnail_html',$html,$attachment_id).'
										</a>
									</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    do_action( 'woocommerce_product_thumbnails' );
                }
                ?>
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>
        </div>
        <div class="<?php echo esc_attr($info_class)?>">
            <div class="summary entry-summary product-detail-info info-sticky">
                <h2 class="product-title-single title36 font-bold font-title color-title"><?php the_title()?></h2>
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>
        </div>
    </div>
    <?php bzotech_product_sticky_addcart(); ?>
</div>
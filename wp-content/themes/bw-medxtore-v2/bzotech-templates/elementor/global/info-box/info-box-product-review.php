<?php
namespace Elementor;
use WP_Query;
if(!class_exists('woocommerce')) return;
extract($settings); 
$args = array(
    'post_type'      => 'product', // Loại bài viết là sản phẩm
    'posts_per_page' => -1, // Lấy tất cả sản phẩm
    'orderby'        => 'comment_date', // Sắp xếp theo ngày đánh giá
    'order'          => 'DESC',
    'meta_query'     => array(
        array(
            'key'     => '_wc_review_count',
            'value'   => 0,
            'compare' => '>',
            'type'    => 'NUMERIC',
        ),
    ),
);

$products_query = new WP_Query( $args );

?>
<div class ="bzoteche-info-box-global-product-reviews">
    <?php echo '<div class="elbzotech-swiper-slider swiper-container display-swiper-navi-style1" data-items-custom="" data-items="5" data-items-widescreen="5" data-items-laptop="5" data-items-tablet-extra="4" data-items-tablet="3" data-items-mobile-extra="3" data-items-mobile="1" data-space="30" data-space-widescreen="" data-space-laptop="" data-space-tablet-extra="" data-space-tablet="" data-space-mobile-extra="" data-space-mobile="16" data-column="1" data-auto="" data-center="" data-loop="no" data-speed="" data-navigation="style1" data-pagination="style2" data-slidertype="">';?>
        <?php echo '<div class="swiper-wrapper">';?>
            <?php 
            while ( $products_query->have_posts() ) {
                $products_query->the_post();
                $reviews = get_comments( array(
                    'post_id' => get_the_ID(),
                    'status'  => 'approve', // Chỉ lấy các đánh giá đã được duyệt
                    'meta_query' => array(
                        array(
                            'key'     => 'rating',
                            'value'   => $number_star_order,
                            'compare' => '=',
                            'type'    => 'NUMERIC',
                        ),
                    ),
                ) );
                if ( $reviews ) {
                    foreach ( $reviews as $key=> $review ) {
                        $avatar_url = get_avatar_url( $review->comment_author_email, array( 'size' => 42 ) );
                        $rating = get_comment_meta( $review->comment_ID, 'rating', true );
                        echo '<div class="swiper-slide"><div class="item-slider-'.$style.'">';
                            echo '<div class="content-top"><img src="' . esc_url( $avatar_url ) . '" alt="'.esc_attr( $review->comment_author).'"><h4>'. $review->comment_author .'</h4></div>';
                            echo bzotech_get_rating_html(true, false,'',  $rating);
                            echo '<div class="review-content">'.$review->comment_content.'</div>';
                            echo '<a class="info-product" href="'.get_the_permalink($review->comment_post_ID).'">'.get_the_post_thumbnail($review->comment_post_ID,array(60,60)).'<span>'.$review->post_title.'</span></a>';
                        echo '</div></div>';
                    }
                }
            }
            ?>
        
    </div>
    <?php //if ( $slider_navigation !== '' ):?>
        <div class="bzotech-swiper-navi">
            <div class="swiper-button-nav swiper-button-next"><i aria-hidden="true" class=" las la-arrow-right"></i></div>
            <div class="swiper-button-nav swiper-button-prev"><i aria-hidden="true" class=" las la-arrow-left"></i></div>
        </div>
    <?php //endif?>

</div></div>
<?php wp_reset_postdata();
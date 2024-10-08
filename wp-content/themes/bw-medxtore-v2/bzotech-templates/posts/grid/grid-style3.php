
<?php
// $column set column in grid style
// $item_wrap set attribute in wrap div
// $item_inner set attribute in wrap inner div
// $item_thumbnail on/off thumbnail yes or empty
// $item_meta on/off meta yes or empty
// $item_title on/off title yes or empty
// $item_excerpt on/off excerpt yes or empty
// $item_button on/off button yes or empty
if(empty($size)) $size = array(560,350);
if(is_array($size)) $size = bzotech_size_random($size);
if(empty($item_thumbnail)){
    $item_thumbnail = 'yes';
}
if(empty($item_title)){
    $item_title = 'yes';
}
if(empty($item_excerpt)){
    $item_excerpt = 'yes';
}
if(empty($item_button)){
    $item_button = 'no';
}
if(empty($item_meta)) {
    $item_meta = 'no';
} 
if(empty($item_meta_select)) {
    $item_meta_select = ['author','date'];
}
$thumbnail_animation_default = '';
if(empty($thumbnail_hover_animation)) {
    $thumbnail_animation_default = 'zoom-image';
}
$thumbnail_default = bzotech_get_option('bzotech_thumbnail_default');
?>
<?php echo '<div '.$item_wrap.'>';?>
<?php echo '<div '.$item_inner.'>';?>
    <?php if($item_thumbnail == 'yes' && (has_post_thumbnail() || !empty($thumbnail_default["id"]))):?>
        <div class="post-thumb <?php echo esc_attr($thumbnail_animation_default) ?>">
            <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link elementor-animation-<?php echo esc_attr($thumbnail_hover_animation)?>">
                <?php if(has_post_thumbnail()) echo get_the_post_thumbnail(get_the_ID(),$size);
                else echo wp_get_attachment_image($thumbnail_default["id"],$size); ?>
            </a>
            <?php bzotech_display_metabox('detail-post',['cats'],'','style-item-meta__cats'); ?>
        </div>
    <?php endif?>
    <div class="post-info">
        <?php if($item_meta == 'yes') bzotech_display_metabox('detail-post',$item_meta_select,'','meta-post-style1');?>
        <?php if($item_title == 'yes'):?><h3 class="title20 post-title font-semibold"><a class="color-title" href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3><?php endif ?>
         <?php if($item_excerpt == 'yes') echo '<p class="desc">'.bzotech_substr(get_the_excerpt(),0,$excerpt).'</p>';?>
        <?php if($item_button == 'yes'):?>
            <div class="readmore-wrap">
                <a href="<?php echo esc_url(get_the_permalink()) ?>" class="readmore elbzotech-bt-style2">
                    <?php if($button_icon_pos == 'before-text' && $button_icon) echo '<i class="'.$button_icon['value'].'"></i>';?>
                    <?php echo apply_filters('bzotech_output_content',$button_text); ?>
                    <?php if($button_icon_pos == 'after-text' && $button_icon) echo '<i class="'.$button_icon['value'].'"></i>';?>                    
                </a>
            </div>
        <?php endif?>
    </div>
</div>
</div>
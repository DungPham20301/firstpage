<form role="search" class="wg-search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" value="<?php echo get_search_query() ?>"  name="s" placeholder="<?php echo esc_attr__('Search..','bw-medxtore-v2')?>">
    
    <button type="submit" value="<?php esc_attr_e("Search",'bw-medxtore-v2')?>">
        <i class="icon-bzo icon-bzo-search"></i>
    </button>
</form>
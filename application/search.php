<form  role="search" method="get" id="searchform" action="<?php echo get_site_url().'/blog/' ?>" class="aside__search-form">
    <input type="text" name="s" id="s" placeholder="O que você procura?" value="<?php echo get_search_query(); ?>"/>
    <input type="hidden" name="search" value="1" />
    <button type="submit"><i class="icon-magnifier"></i></button>
</form>

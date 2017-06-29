<?php
	global $base_url;
	if (isset($_GET['style'])) {
		$shop_style = $_GET['style'];
	} else $shop_style = theme_get_setting('shop_style', 'fakre');
	if(empty($shop_style)) $shop_style = 'grid3cols_rightsidebar';
	if($shop_style == 'listdefault' || $shop_style == 'list_leftsidebar' || $shop_style == 'list_rightsidebar') {
		print views_embed_view('_fakre_shop','block_list_products');
	} else {
		print views_embed_view('_fakre_shop','block_grid_products');
	}
?>
<?php



$out = '';
$i =0;


if($block->region == 'section'){

	$out .= '<section id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h2>'.$block->subject.'</h2>';

	endif;

	$out .= $content;

	$out .= '</section>';





} else if($block->region == 'header_top' || $block->region == 'header_center'){



	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	$out .= $content;

	$out .= '</div>';



} else if($block->region == 'icon_list_menu'){


	$out .= render($title_suffix);

	$out .= $content;


} else if($block->region == 'menu_nav'){



	$out .= '<section id="'.$block_html_id.'" class="side-widget '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h2>'.$block->subject.'</h2>';

	endif;

	$out .= $content;

	$out .= '</section>';



} else if($block->region == 'side_menu' || $block->region == 'related_products'){



	$out .= '<div class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h2>'.$block->subject.'</h2>';

	endif;

	$out .= $content;

	$out .= '</div>';



} else if($block->region == 'main_menu' || $block->region == 'one_menu'){



	$out .= '<div class="nav-holder '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	$out .= $content;

	$out .= '</div>';



} else if($block->region == 'sidebar_first' || $block->region == 'sidebar_second'){



	$out .= '<section class="widget '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h2>'.$block->subject.'</h2>';

	endif;

	$out .= $content;

	$out .= '</section>';



} else if($block->region == 'related_post'){



	$out .= '<div class="container-fluid related-post-widget bg-grey dark-bottom-border '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<div class="container"><div class="row"><div class="col-xs-12">';

		$out .= '<h5>'.$block->subject.'</h5></div></div></div>';

	endif;

	$out .= $content;

	$out .= '</div>';



} else if($block->region == 'bottom_portfolio'){



	$out .= '<div class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<div class="container"><div class="row"><header class="page-heading left-align col-xs-12 col-md-12">';

		$out .= '<h2 class="lime text-capitalize font-light">'.$block->subject.'</h2></header></div></div>';

	endif;

	$out .= $content;

	$out .= '</div>';



} else if($block->region == 'shop_sidebar'){



	$out .= '<div class="shop-widget '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h3>'.$block->subject.'</h3>';

	endif;

	$out .= $content;

	$out .= '</div>';

} else if($block->region == 'shopping_cart'){

	$out .= '<div class="cart-holder '.$classes.'" '.$attributes.'>';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<strong class="main-title">'.$block->subject.'</strong>';
	endif;
	$out .= $content;
	$out .= '</div>';

} else if($block->region == 'sidebar'){



	$out .= '<aside id="'.$block_html_id.'" class="widget '.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h4 class="widget-title">'.$block->subject.'</h4>';

	endif;

	$out .= $content;

	$out .= '</aside>';



} else if($block->region == 'footer'){
	$footer_column = theme_get_setting('footer_column', 'fakre');

	if(empty($footer_column)) $footer_column = '4cols';

	if($footer_column == '4cols') {

		$out .= '<div class="col-xs-12 col-sm-6 col-md-3 info-box column">';

	} elseif ($footer_column == '2cols') {

		$out .= '<div class="col-xs-12 col-sm-6 col-md-6 info-box">';

	} else {

		$out .= '<div class="col-xs-12 col-sm-6 col-md-4 info-box">';

	} 

	$out .= '<div class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	if ($block->subject):

		$out .= '<h5>'.$block->subject.'</h5>';

	endif;

	$out .= $content;

	$out .= '</div></div>';





} else {

	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';

	$out .= render($title_suffix);

	 if ($block->subject)

		$out .= '<h5>'.$block->subject.'</h5>';

	$out .= $content;

	$out .= '</div>';

}

	print $out;

?>
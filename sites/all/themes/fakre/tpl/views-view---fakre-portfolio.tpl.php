<?php
	if (isset($_GET['style'])) {
		$portfolio_style = $_GET['style'];
	} else $portfolio_style = theme_get_setting('portfolio_style', 'fakre');
	if (empty($portfolio_style)) $portfolio_style = 'grid2colsspace';
	if ($portfolio_style == 'grid1colspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_1column_space');
	} elseif ($portfolio_style == 'grid2colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_2column_space');
	} elseif ($portfolio_style == 'grid3colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_3column_space');
	} elseif ($portfolio_style == 'grid4colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_4column_space');
	} elseif ($portfolio_style == 'fullwidth4colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_4column_space');
	} elseif ($portfolio_style == 'grid5colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_5column_space');
	} elseif ($portfolio_style == 'grid6colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_6column_space');
	} elseif ($portfolio_style == 'grid1colnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_1column_nospace');
	} elseif ($portfolio_style == 'grid2colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_2column_nospace');
	} elseif ($portfolio_style == 'grid2colsnospacestyle2') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_2column_nospace_style2');
	} elseif ($portfolio_style == 'grid3colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_3column_nospace');
	} elseif ($portfolio_style == 'grid4colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_4column_nospace');
	} elseif ($portfolio_style == 'fullwidth4colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_4column_nospace');
	} elseif ($portfolio_style == 'grid5colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_5column_nospace');
	} elseif ($portfolio_style == 'grid6colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_6column_nospace');
	} elseif ($portfolio_style == 'masonry2colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_2column_space');
	} elseif ($portfolio_style == 'masonry3colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_3column_space');
	} elseif ($portfolio_style == 'masonry4colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_4column_space');
	} elseif ($portfolio_style == 'masonry2colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_2column_nospace');
	} elseif ($portfolio_style == 'masonry3colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_3column_nospace');
	} elseif ($portfolio_style == 'masonry4colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_4column_nospace');
	} elseif ($portfolio_style == 'masonry4colsfullwidthspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_4column_fullwidth_space');
	} elseif ($portfolio_style == 'masonry4colsfullwidthnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_4column_fullwidth_nospace');
	} elseif ($portfolio_style == 'masonry5colsfullwidthspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_5column_fullwidth_space');
	} elseif ($portfolio_style == 'masonry5colsfullwidthnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_5column_fullwidth_nospace');
	} elseif ($portfolio_style == 'masonryaltnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_masonry_alt');
	} elseif ($portfolio_style == 'gridvertical1colspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_1column_space');
	} elseif ($portfolio_style == 'gridvertical1colnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_1column_nospace');
	} elseif ($portfolio_style == 'gridvertical2colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_2column_space');
	} elseif ($portfolio_style == 'gridvertical3colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_3column_space');
	} elseif ($portfolio_style == 'gridvertical4colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_4column_space');
	} elseif ($portfolio_style == 'gridvertical5colsspace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_5column_space');
	} elseif ($portfolio_style == 'gridvertical2colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_2column_nospace');
	} elseif ($portfolio_style == 'gridvertical3colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_3column_nospace');
	} elseif ($portfolio_style == 'gridvertical4colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_4column_nospace');
	} elseif ($portfolio_style == 'gridvertical5colsnospace') {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_vertical_5column_nospace');
	} elseif ($portfolio_style == 'parallaxfullwidth') {
		print views_embed_view('_fakre_portfolio','block_portfolio_parallax_fullwidth');
	} elseif ($portfolio_style == 'parallax') {
		print views_embed_view('_fakre_portfolio','block_portfolio_parallax');
	} else {
		print views_embed_view('_fakre_portfolio','block_portfolio_grid_2column_space');
	}
?>
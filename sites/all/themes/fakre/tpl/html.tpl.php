<!DOCTYPE html>

<html lang="<?php print $language->language; ?>">

	<head>

		<!-- set the encoding of your site -->

		<meta charset="utf-8">

		<!-- set the viewport width and initial-scale on mobile devices -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- set the title of your site -->

		<title><?php print $head_title; ?></title>

		<?php print $styles; ?><?php print $head; ?>

		<?php

			//Tracking code

			$tracking_code = theme_get_setting('general_setting_tracking_code', 'fakre');

			print $tracking_code;

			//Custom css

			$custom_css = theme_get_setting('custom_css', 'fakre');

			if(!empty($custom_css)):

		?>

			<style type="text/css" media="all">

			<?php print $custom_css;?>

			</style>

		<?php endif; ?>

	</head>

	<?php

		if (isset($_GET['layout'])) {

			$layout_portfolio = $_GET['layout'];

		} else $layout_portfolio = theme_get_setting('portfolio_layout', 'fakre');

		if(empty($layout_portfolio)) $layout_portfolio = 'default';

		if(isset($home_body_class) && !empty($home_body_class)) {

			$body_class = $home_body_class;

		} else $body_class = '';

		if(isset($menu_layout) && !empty($menu_layout)) {

			$header_layout = $menu_layout;

		} else $header_layout = theme_get_setting('header_layout', 'fakre');

		if(empty($header_layout)) $header_layout = 'header1';

		if($header_layout == 'header7' || $header_layout == 'header7b') {

			$wrap_class = 'w9';

		} elseif ($header_layout == 'header8' || $layout_portfolio == 'vertical') {

			$wrap_class = 'w7';

		} else $wrap_class = 'w1';

		$theme_style = theme_get_setting('fakre_theme_style', 'fakre');
		if(empty($theme_style)) $theme_style = 'light';
		if($theme_style == 'dark') $body_class = $body_class.' dark';
	?>

	<body class="<?php print $classes.' '.$body_class;?>" <?php print $attributes;?>>

		<!-- Page pre loader -->

	    <div id="pre-loader">

	        <div class="loader-holder">

	            <div class="frame">

	                <img src="<?php print base_path().path_to_theme(); ?>/logo.png" alt="Fakre"/>

	                <div class="spinner7">

	                    <div class="circ1"></div>

	                    <div class="circ2"></div>

	                    <div class="circ3"></div>

	                    <div class="circ4"></div>

	                </div>

	            </div>

	        </div>

	    </div>

	    <div id="skip-link">

			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>

		</div>

		<!-- main container of all the page elements -->

		<div id="wrapper">

			<div class="<?php print $wrap_class; ?>">

				<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>

			</div>

			<!-- fa fa-chevron-up -->

			<div class="fa fa-chevron-up" id="gotoTop"></div>

			<input type="hidden" id="path-theme" value="<?php print base_path().path_to_theme(); ?>" />

		</div>
		<!-- Style changer -->
	<?php
		$disable_switch = theme_get_setting('fakre_disable_switch', 'fakre');
		if(empty($disable_switch)) $disable_switch = 'on';
	?>
	<?php if($disable_switch == 'on'): ?>
		<div id="style-changer" data-src="<?php print base_path().path_to_theme(); ?>/inc/style-changer.html" data-path-theme="<?php print base_path().path_to_theme(); ?>"></div>
	<?php endif; ?>
		<!-- JS begin -->	

		<?php print $scripts; ?>

	</body>

</html>
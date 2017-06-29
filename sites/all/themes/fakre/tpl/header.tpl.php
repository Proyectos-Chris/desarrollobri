<?php

	global $base_url;

	if (!isset($header_layout) || empty($header_layout)) {

		if (isset($node->field_header_layout) && !empty($node->field_header_layout)) {

			$header_layout = $node->field_header_layout['und'][0]['value'];

		} else $header_layout = theme_get_setting('header_layout', 'fakre');

		if (empty($header_layout)) $header_layout = 'header1';

	}

	if (!isset($class_header) || empty($class_header)) {

		if (isset($node->field_header_class) && !empty($node->field_header_class)) {

			$class_header = $node->field_header_class['und'][0]['value'];

		} else $class_header = theme_get_setting('header_layout', 'fakre');

		if (empty($class_header)) $class_header = '';

	}

	if (empty(drupal_is_front_page()) && arg(0) != 'node' && arg(0) != 'blog' && arg(0) != 'shop' && arg(0) != 'portfolio') {

		$header_layout = 'header4';

		$class_header = 'style5';

	}

	if (isset($plogo)) {

		$logo = $plogo;

	}

	if (isset($node->field_logo) && !empty($node->field_logo)) {

		$logo = file_create_url($node->field_logo['und'][0]['uri']);

		if(isset($node->field_logo['und'][1])) {

			$blogo = file_create_url($node->field_logo['und'][1]['uri']);

		} else $blogo = '';

	} else $blogo = '';

	if (empty($blogo)) {

		$fixedmenu_logo = theme_get_setting('fixedmenu_logo','fakre');

		if (!empty($fixedmenu_logo)) {

			$blogo = file_create_url(file_load($fixedmenu_logo)->uri);

		} else $blogo = $logo;

	}

	$site_name = variable_get('site_name', 'Fakre');

	if (isset($node->field_menu_nav) && !empty($node->field_menu_nav)) {

		$menu_nav = $node->field_menu_nav['und'][0]['value'];

	} else $menu_nav = theme_get_setting('menu_nav', 'fakre');

	if (empty($menu_nav)) $menu_nav = 'on';

	if (isset($node->field_onepage) && !empty($node->field_onepage)) {

		$onepage = $node->field_onepage['und'][0]['value'];

	} else $onepage = theme_get_setting('onepage', 'fakre');

	if (empty($onepage)) $onepage = 'off';

?>

<?php if ($header_layout == 'header15'): ?>

	<?php if ($page['slider']): ?>

		<?php print render($page['slider']); ?>

	<?php endif; ?>

<?php endif; ?>

<!-- header of the page -->

<?php if ($header_layout == 'header1' || $header_layout == 'header2' || $header_layout == 'header3' || $header_layout == 'header4'

|| $header_layout == 'header13' || $header_layout == 'header9' || $header_layout == 'header10' || $header_layout == 'header12'

|| $header_layout == 'header14' || $header_layout == 'header15' || $header_layout == 'header16' || $header_layout == 'header17'

|| $header_layout == 'header2b'): ?>

<header id="header" class="<?php print $class_header; ?>">

	<div class="container<?php if($header_layout == 'header14') print '-fluid'; ?>">

	<?php if (($header_layout == 'header2' || $header_layout == 'header3' || $header_layout == 'header10' || $header_layout == 'header17' || $header_layout == 'header2b' || $header_layout == 'header16')): ?>

		<?php if($page['header_top'] || $header_layout == 'header3'): ?>

		<div class="row">

			<!-- header top -->
			
			<div class="col-xs-12 header-top">			

				<!-- page logo -->

				<?php if(!empty($logo) && $header_layout == 'header3'): ?>

				<div class="logo">

					<a href="<?php print $base_url; ?>">

						<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive w-logo">

						<img src="<?php print $blogo; ?>" alt="<?php print $site_name; ?>" class="img-responsive b-logo">

					</a>

				</div>

				<?php endif ?>				

				<?php print render($page['header_top']);?>
			<?php if ($header_layout == 'header3'): ?>

				<!-- icon list -->
				
				<?php if($page['icon_list_menu']): ?>
				<ul class="list-unstyled icon-list">
					<?php print render($page['icon_list_menu']); ?>
					<?php if($page['shopping_cart']): ?>
					<li class="cart-box">
						<a href="#" class="cart-opener">
							<i class="fa fa-shopping-cart"></i>
							<span class="txt"><?php print t('Cart') ?> (<span>0</span>)</span>
							<span class="arrow"><i class="fa fa-angle-down"></i></span>
						</a>
						<!-- cart drop -->
						<div class="cart-drop">
							<?php print render($page['shopping_cart']); ?>
						</div>
					</li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
			<?php endif; ?>

			</div>

		</div>
		<?php endif; ?>

	<?php endif; ?>

		<div class="row">

			<div class="col-xs-12 <?php if($header_layout == 'header17') print 'header-cent'; ?>">

			<?php if ($header_layout == 'header1' || $header_layout == 'header2' || $header_layout == 'header4' || $header_layout == 'header9'

			|| $header_layout == 'header13' || $header_layout == 'header10' || $header_layout == 'header12' || $header_layout == 'header15'

			|| $header_layout == 'header14' || $header_layout == 'header16' || $header_layout == 'header17' || $header_layout == 'header2b'): ?>

				<!-- page logo -->

				<?php if(!empty($logo)): ?>

				<div class="logo">

					<a href="<?php print $base_url; ?>">

						<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive w-logo">

						<img src="<?php print $blogo; ?>" alt="<?php print $site_name; ?>" class="img-responsive b-logo">

					</a>

				</div>

				<?php endif; ?>

				<?php if ($header_layout == 'header17'): ?>

					<?php if($page['header_center']): ?>

						<?php print render($page['header_center']); ?>

					<?php endif; ?>

				<?php endif; ?>

			<?php endif; ?>

			<?php if($header_layout != 'header14'): ?>

				<div class="holder">

			<?php endif; ?>

				<?php if ($header_layout == 'header1' || $header_layout == 'header2' || $header_layout == 'header4' || $header_layout == 'header9'

				|| $header_layout == 'header12' || $header_layout == 'header13' || $header_layout == 'header15' || $header_layout == 'header16'

				|| $header_layout == 'header2b'): ?>

					<!-- icon list -->
					
					<?php if($page['icon_list_menu']): ?>
					<ul class="list-unstyled icon-list">
						<?php print render($page['icon_list_menu']); ?>
					<?php if($page['shopping_cart']): ?>
						<li class="cart-box">
							<a href="#" class="cart-opener opener-icons">
								<i class="fa fa-shopping-cart"></i>
								<span class="cart-num">0</span>
							</a>
							<!-- cart drop -->
							<div class="cart-drop">
								<?php print render($page['shopping_cart']); ?>
							</div>
						</li>
					<?php endif; ?>
					</ul>
					<?php endif; ?>

				<?php endif; ?>

					<!-- main navigation of the page -->

				<?php if($onepage == 'off'): ?>

					<?php if($page['main_menu'] && $header_layout != 'header17'): ?>

					<nav id="nav">

						<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

						<?php print render($page['main_menu']); ?>

					</nav>

					<?php endif; ?>

				<?php else: ?>

					<?php if($page['one_menu'] && $header_layout != 'header17'): ?>

					<nav id="nav">

						<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

						<?php print render($page['one_menu']); ?>

					</nav>

					<?php endif; ?>

				<?php endif; ?>

				<?php if ($header_layout == 'header14'): ?>

					<!-- icon list -->
					
					<?php if($page['icon_list_menu']): ?>
					<ul class="list-unstyled icon-list">
						<?php print render($page['icon_list_menu']); ?>
					<?php if($page['shopping_cart']): ?>
						<li class="cart-box">
							<a href="#" class="cart-opener opener-icons">
								<i class="fa fa-shopping-cart"></i>
								<span class="cart-num">0</span>
							</a>
							<!-- cart drop -->
							<div class="cart-drop">
								<?php print render($page['shopping_cart']); ?>
							</div>
						</li>
					<?php endif; ?>
					</ul>
					<?php endif; ?>

				<?php endif; ?>

			<?php if($header_layout != 'header14'): ?>

				</div>

			<?php endif; ?>

			</div>

		</div>

		<?php if($onepage == 'off' && $page['main_menu'] && $header_layout == 'header17'): ?>

		<div class="row">

			<div class="col-xs-12">

				<nav id="nav">

					<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

					<?php print render($page['main_menu']); ?>

				</nav>

			</div>

		</div>

		<?php elseif($page['one_menu'] && $header_layout == 'header17'): ?>

		<div class="row">

			<div class="col-xs-12">

				<nav id="nav">

					<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

					<?php print render($page['one_menu']); ?>

				</nav>

			</div>

		</div>

		<?php endif; ?>

	</div>

</header>

<?php elseif ($header_layout == 'header5'): ?>

<?php if($page['side_menu']): ?>

	<a href="#" class="portfolio-nav-opener"><i class="fa fa-bars"></i></a>

	<!-- sidenav port style2 -->

	<nav class="sidenav-port style2">

		<div class="win-height jcf-scrollable">

			<?php if($logo): ?>

			<strong class="lancer-logo"><a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" height="120" width="120" alt="<?php print $site_name; ?>"></a></strong>

			<?php endif; ?>

			<?php print render($page['side_menu']); ?>

		</div>

	</nav>

<?php endif; ?>

<?php elseif ($header_layout == 'header6'): ?>

	<?php if($logo): ?>

	<div class="logo port-logo">

		<a href="<?php print $base_url; ?>">

			<img src="<?php print $logo; ?>" alt="fakre studio" class="w-logo">

		</a>

	</div>

	<?php endif; ?>

	<?php if($page['side_menu']): ?>

	<a href="#" class="portfolio-nav-opener"><i class="fa fa-bars"></i></a>

	<!-- sidenav port -->

	<nav class="sidenav-port">

		<div class="win-height jcf-scrollable">

		<?php print render($page['side_menu']); ?>

		</div>

	</nav>

	<?php endif; ?>

<?php elseif ($header_layout == 'header7'): ?>

	<!-- sidemenu photo v9 -->

	<div class="sidemenu-photo v9">

		<div class="win-height jcf-scrollable">

		<?php if($page['side_menu']): ?>

			<!-- sidemenu holder -->

			<div class="sidemenu-holder">

				<!-- header7 -->

				<header id="header7">

				<?php if($logo): ?>

					<div class="logo">

						<a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></a>

					</div>

				<?php endif; ?>

					<nav id="nav7">

						<a class="nav-opener" href="#">

							<i class="fa fa-bars"></i>

						</a>

						<div class="nav-holder">

							<?php print render($page['side_menu']); ?>

						</div>

					</nav>

				</header>

			</div>

		<?php endif; ?>

		</div>

		<?php if($logo): ?>

		<div class="logo-v9">

			<a href="<?php print $base_url; ?>"><img class="b-logo" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></a>

		</div>

		<?php endif; ?>

	</div>

<?php elseif ($header_layout == 'header7b'): ?>

	<!-- sidemenu photo v10 -->

	<div class="sidemenu-photo v10">

		<div class="win-height jcf-scrollable">

		<?php if($page['side_menu']): ?>

			<!-- sidemenu holder -->

			<div class="sidemenu-holder">

				<!-- header7 -->

				<header id="header7">

				<?php if($logo): ?>

					<div class="logo">

						<a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></a>

					</div>

				<?php endif; ?>

					<nav id="nav7">

						<a class="nav-opener" href="#">

							<i class="fa fa-bars"></i>

							<span class="txt"><?php print t('MENU'); ?></span>

						</a>

						<div class="nav-holder">

							<?php print render($page['side_menu']); ?>

						</div>

					</nav>

				</header>

			</div>

		<?php endif; ?>

		</div>

		<?php if($logo): ?>

		<div class="logo-v9">

			<a href="<?php print $base_url; ?>"><img class="b-logo" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></a>

		</div>

		<?php endif; ?>

	</div>

<?php elseif ($header_layout == 'header8'): ?>

	<!-- sidemenu photo -->

	<div class="sidemenu-photo">

		<div class="win-height jcf-scrollable">

			<!-- sidemenu holder -->

			<div class="sidemenu-holder">

				<header id="header7">

				<?php if($logo): ?>

					<div class="logo">

						<a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></a>

					</div>

				<?php endif; ?>

				<?php if($page['side_menu']): ?>

					<nav id="nav7">

						<a class="nav-opener" href="#">

							<span class="txt">Menu</span>

							<i class="fa fa-bars"></i>

						</a>

						<div class="nav-holder">

							<?php print render($page['side_menu']); ?>

						</div>

					</nav>

				<?php endif; ?>

				</header>

				<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>

			</div>

		</div>

	</div>

<?php elseif ($header_layout == 'header18'): ?>

<header id="header" class="<?php print $class_header; ?>">

	<?php if($page['header_top']): ?>

	<div class="header-top">

		<div class="container">

			<div class="row">

				<!-- header top -->

				<div class="col-xs-12">

					<?php print render($page['header_top']); ?>

				</div>

			</div>

		</div>

	</div>

	<?php endif; ?>

	<div class="container">

		<div class="row">

			<div class="col-xs-12">

			<?php if(!empty($logo)): ?>

				<div class="logo">

					<a href="<?php print $base_url; ?>">

						<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive w-logo">

						<img src="<?php print $blogo; ?>" alt="<?php print $site_name; ?>" class="img-responsive b-logo">

					</a>

				</div>

			<?php endif; ?>

			<?php if($onepage == 'off'): ?>

				<?php if($page['main_menu']): ?>

				<nav id="nav">

					<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

					<?php print render($page['main_menu']); ?>

				</nav>

				<?php endif; ?>

			<?php else: ?>

				<?php if($page['one_menu']): ?>

				<nav id="nav">

					<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>

					<?php print render($page['one_menu']); ?>

				</nav>

				<?php endif; ?>

			<?php endif; ?>

			</div>

		</div>

	</div>

</header>

<?php endif; ?>

<?php if ($page['header_search']): ?>

<!-- search popup -->

<div class="search-popup win-height">

	<div class="holder">

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<a href="#" class="close-btn"><?php print t('close'); ?></a>

					<?php print render($page['header_search']); ?>

				</div>

			</div>

		</div>

	</div>

</div>

<?php endif; ?>

<?php if ($page['menu_nav'] && $menu_nav == 'on'): ?>

<!-- menu nav -->

<div class="menu-nav">

	<div class="win-height jcf-scrollable">

		<?php print render($page['menu_nav']); ?>

	</div>

</div>

<?php endif; ?>


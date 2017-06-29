<?php

	global $base_url;

	if (isset($_GET['layout'])) {

		$layout = $_GET['layout'];

	} else $layout = theme_get_setting('portfolio_layout', 'fakre');

	if(empty($layout)) $layout = 'default';

	$header_layout = theme_get_setting('portfolio_header_layout', 'fakre');

	$class_header = theme_get_setting('portfolio_header_class', 'fakre');

	$footer_layout = theme_get_setting('portfolio_footer_layout', 'fakre');

	$footer_class = theme_get_setting('portfolio_footer_class', 'fakre');

	$footer_bg = theme_get_setting('portfolio_footer_background','fakre');

	if(!empty($footer_bg)) {

		$footer_bg = file_create_url(file_load($footer_bg)->uri);

	} else $footer_bg = '';

	$portfolio_logo = theme_get_setting('portfolio_logo', 'fakre');

	$portfolio_page_title_bg = theme_get_setting('portfolio_page_title_background','fakre');

	$portfolio_slogan = theme_get_setting('portfolio_slogan', 'fakre');

	if (isset($_GET['style'])) {

		$portfolio_style = $_GET['style'];

	} else $portfolio_style = theme_get_setting('portfolio_style', 'fakre');

	if(strpos($portfolio_style, 'nospace')) {

		$section_class = '';

	} else $section_class = 'space';

	if (!empty($portfolio_page_title_bg)) {

		$page_title_background = file_create_url(file_load($portfolio_page_title_bg)->uri);

	}

	if (!empty($portfolio_logo)) {

		$plogo = file_create_url(file_load($portfolio_logo)->uri);

		$logo = $plogo;

	}

	$page_title_size = theme_get_setting('portfolio_page_title_size', 'fakre');

	if(empty($page_title_size)) $page_title_size = 'small';

	$page_title_style = theme_get_setting('portfolio_page_title_style','fakre');

	if(empty($page_title_style)) $page_title_style = 'greybg';

	if($page_title_size =='default') {

		$page_banner_class = '';

	} elseif(!empty($portfolio_slogan)) {

		$page_banner_class = 'style2';

	} else $page_banner_class = 'small';

	if ($page_title_style == 'rightalign') {

		$page_banner_class .= ' grey rightalign';

	} elseif ($page_title_style == 'centeralign') {

		$page_banner_class .= ' grey center';

	} elseif ($page_title_style == 'pattern') {

		$page_banner_class .= ' pattern';

		$bg_pattern = 'style="background: url('.$page_title_background.');"';

	} elseif ($page_title_style == 'greybg' || $page_title_style == 'leftalign') {

		$page_banner_class .= ' grey';

	} elseif ($page_title_style == 'darkbg') {

		$page_banner_class .= ' dark dark-bottom-border';

	}

	if ($layout != 'vertical') {

		require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');

	} else {

?>

	<div class="sidemenu-photo v11">

		<div class="win-height jcf-scrollable">

		<?php if($page['side_menu']): ?>

			<!-- sidemenu holder -->

			<div class="sidemenu-holder">

				<!-- header7 -->

				<header id="header7">

				<?php if($logo): ?>

					<div class="logo">

						<a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="b-logo"></a>

					</div>

				<?php endif; ?>

					<nav id="nav7">

						<a class="nav-opener" href="#">

							<span class="txt"><?php print t('Menu'); ?></span>

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

	</div>

<?php		

	}

?>

<!-- contain main informative part of the site -->

<main id="main" role="main">



<?php if ($layout == 'vertical' && !empty($page_title_background)): ?>

	<!-- page banner -->

	<header class="page-banner style2">

		<div class="container-max">

			<div class="row">

				<div class="col-xs-12">

					<div class="holder">

						<h1><?php print drupal_get_title(); ?></h1>

					<?php if($portfolio_slogan): ?>

						<p><?php print $portfolio_slogan; ?></p>

					<?php endif; ?>

					</div>

					<?php if($breadcrumb): ?>

						<?php print $breadcrumb; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

		<div class="stretch">

			<img src="<?php print $page_title_background;   ?>" alt="<?php print drupal_get_title(); ?>">

		</div>

	</header>

<?php else: ?>

	<header class="page-banner <?php print $page_banner_class; ?>" <?php if(isset($bg_pattern)) print $bg_pattern; ?>>

	<?php if(isset($page_title_background) && $page_title_style == 'imagebg'): ?>

		<div class="stretch">

			<img alt="<?php print drupal_get_title(); ?>" src="<?php print $page_title_background; ?>">

		</div>

	<?php endif; ?>

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<div class="holder">

						<h1 class="heading text-capitalize"><?php print drupal_get_title(); ?></h1>

						<?php if(!empty($portfolio_slogan)): ?>

						<p><?php print $portfolio_slogan; ?></p>

						<?php endif; ?>

					</div>

					<?php if($breadcrumb): ?>

						<?php print $breadcrumb; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</header>

<?php endif; ?>

<?php if(!empty($layout) && ($portfolio_style == 'parallax' || $portfolio_style == 'parallaxfullwidth')): ?>

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

    <?php endif; ?>

<?php elseif ($layout == 'default' && (strpos($portfolio_style, 'fullwidth') === FALSE)): ?>

	<section class="work-section padding-top-90 padding-bottom-90 <?php print $section_class; ?>">

	<?php if ($page['content']): ?>

		<?php if (strpos($portfolio_style, 'grid') !== FALSE && $portfolio_style != 'grid6colsspace' && $portfolio_style != 'grid6colsnospace' && $portfolio_style != 'grid5colsnospace' && $portfolio_style != 'grid5colsspace'): ?>

		<div class="container padding-zero">

		<?php endif; ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

			<?php print render($page['content']); ?>

		<?php if (strpos($portfolio_style, 'grid') !== FALSE): ?>

		</div>

		<?php endif; ?>

    <?php endif; ?>

    </section>

<?php elseif ($layout == 'fullwidth' || (strpos($portfolio_style, 'fullwidth') !== FALSE)): ?>

	<section class="work-section padding-top-100 padding-bottom-100 <?php print $section_class; ?>">

	<?php if ($page['content']): ?>

		<?php if (strpos($portfolio_style, 'grid') !== FALSE): ?>

		<div class="container padding-zero">

		<?php endif; ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

			<?php print render($page['content']); ?>

		<?php if (strpos($portfolio_style, 'grid') !== FALSE): ?>

		</div>

		<?php endif; ?>

    <?php endif; ?>

	</section>

<?php elseif ($layout == 'sidebarleft'): ?>

	<section class="work-section padding-top-100 padding-bottom-100">

		<div class="container">

		<?php if ($page['content']): ?>

			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">

				<?php

					if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

					print render($tabs);

					endif;

					print $messages;

				?>

				<?php print render($page['content']); ?>

				</div>

			<?php if ($page['sidebar_first']): ?>

				<div class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

					<?php print render($page['sidebar_first']); ?>

				</div>

			<?php endif; ?>

			</div>

		<?php endif; ?>

		</div>

	</section>

<?php elseif ($layout == 'sidebarright'): ?>

	<section class="work-section padding-top-100 padding-bottom-100">

		<div class="container">

		<?php if ($page['content']): ?>

			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-9">

				<?php

					if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

					print render($tabs);

					endif;

					print $messages;

				?>

				<?php print render($page['content']); ?>

				</div>

			<?php if ($page['sidebar_second']): ?>

				<div class="col-xs-12 col-sm-4 col-md-3">

					<?php print render($page['sidebar_second']); ?>

				</div>

			<?php endif; ?>

			</div>

		<?php endif; ?>

		</div>

	</section>

<?php elseif ($layout == 'sidebarboth'): ?>

	<section class="work-section padding-top-100 padding-bottom-100">

		<div class="container">

		<?php if ($page['content']): ?>

			<div class="row">

				<div class="col-xs-12 col-md-6 col-md-push-3">

				<?php

					if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

					print render($tabs);

					endif;

					print $messages;

				?>

				<?php print render($page['content']); ?>

				</div>

			<?php if ($page['sidebar_first']): ?>

				<div class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6">

					<?php print render($page['sidebar_first']); ?>

				</div>

			<?php endif; ?>

			<?php if ($page['sidebar_second']): ?>

				<div class="col-xs-12 col-sm-6 col-md-3">

					<?php print render($page['sidebar_second']); ?>

				</div>

			<?php endif; ?>

			</div>

		<?php endif; ?>

		</div>

	</section>

<?php else: ?>

	<section class="work-section padding-top-100 padding-bottom-100 bg-grey dark-bottom-border">

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

    <?php endif; ?>

	</section>

<?php endif; ?>

</main>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>
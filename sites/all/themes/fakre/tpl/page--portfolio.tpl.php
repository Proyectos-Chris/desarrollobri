<?php

	global $base_url;

	$header_layout = theme_get_setting('portfolio_header_layout', 'fakre');

	$class_header = theme_get_setting('portfolio_header_class', 'fakre');

	$footer_layout = theme_get_setting('portfolio_footer_layout', 'fakre');

	$footer_class = theme_get_setting('portfolio_footer_class', 'fakre');

	$footer_bg = theme_get_setting('portfolio_footer_background','fakre');

	if(!empty($footer_bg)) {

		$footer_bg = file_create_url(file_load($footer_bg)->uri);

	} else $footer_bg = '';

	$portfolio_logo = theme_get_setting('portfolio_logo', 'fakre');

	if (isset($node->field_background_image) && !empty($node->field_background_image)) {

		$bg_uri = $node->field_background_image['und'][0]['uri'];

		$background = file_create_url($bg_uri);

	} else $portfolio_page_title_bg = theme_get_setting('portfolio_page_title_background','fakre');

	$portfolio_slogan = theme_get_setting('portfolio_slogan', 'fakre');

	if(empty($portfolio_slogan))  $portfolio_slogan = variable_get('site_slogan');

	if (!empty($portfolio_page_title_bg)) {

		$background = file_create_url(file_load($portfolio_page_title_bg)->uri);

	}

	if (!empty($portfolio_logo)) {

		$plogo = file_create_url(file_load($portfolio_logo)->uri);

		$logo = $plogo;

	}

	if(isset($node->field_page_tite_size) && !empty($node->field_page_tite_size)) {

		$page_title_size = $node->field_page_tite_size['und'][0]['value'];

	} else $page_title_size = 'small';

	if(isset($node->field_page_title_style) && !empty($node->field_page_title_style)) {

		$page_title_style = $node->field_page_title_style['und'][0]['value'];

	} else $page_title_style = 'greybg';

	if($page_title_size =='default') {

		$page_banner_class = '';

	} elseif(!empty($page_slogan)) {

		$page_banner_class = 'style2';

	} else $page_banner_class = 'small';

	if ($page_title_style == 'rightalign') {

		$page_banner_class .= ' grey rightalign';

	} elseif ($page_title_style == 'centeralign') {

		$page_banner_class .= ' grey center';

	} elseif ($page_title_style == 'pattern') {

		$page_banner_class .= ' pattern';

	} elseif ($page_title_style == 'greybg' || $page_title_style == 'leftalign') {

		$page_banner_class .= ' grey';

	} elseif ($page_title_style == 'darkbg') {

		$page_banner_class .= ' dark dark-bottom-border';

	}

	if(isset($node->field_portfolio_layout) && !empty($node->field_portfolio_layout)) {

		$portfolio_layout = $node->field_portfolio_layout['und'][0]['value'];

	} else $portfolio_layout ='default';

	require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');

?>

<!-- contain main informative part of the site -->

<main id="main" role="main">

	<!-- page banner  -->

	<header class="page-banner <?php print $page_banner_class; ?>">

		<?php if(!empty($background) && $page_title_style == 'imagebg'): ?>

		<div class="stretch">

			<img alt="Image Background" src="<?php print $background; ?>">

		</div>

		<?php endif; ?>

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<div class="holder">

						<h1 class="heading text-capitalize"><?php print drupal_get_title(); ?></h1>

						<?php if(!empty($page_slogan)): ?>

						<p><?php print $page_slogan; ?></p>

						<?php endif; ?>

					</div>

					<?php if($breadcrumb): ?>

					<?php print $breadcrumb; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</header>

	<section class="port-single padding-top-100">

	<?php if($portfolio_layout == 'default'): ?>

		<div class="container">

		<?php if(isset($node)): ?>

			<div class="row">

				<div class="col-xs-12 text-center">

					<?php print single_navigation($node->type, $node->nid, 'prev'); ?>

					<a href="<?php print $base_url; ?>/portfolio?layout=default&style=masonry3colsspace" class="dashboard"><i class="fa fa-th"></i></a>

					<?php print single_navigation($node->type, $node->nid, 'next'); ?>

				</div>

			</div>

			<div class="row text-upercase">

				<div class="col-xs-12 text-center">

					<h2><?php print $node->title; ?></h2>

					<p><?php print t('IN'); ?> <?php print $node->field_portfolio_category['und'][0]['taxonomy_term']->name; ?></p>

				</div>

			</div>

		<?php endif; ?>

		<?php if ($page['content']): ?>

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

		<?php endif; ?>

		</div>

	<?php else: ?>

		<div class="container">

		<?php if(isset($node)): ?>

			<div class="row">

				<div class="col-xs-12 text-center">

					<?php print single_navigation($node->type, $node->nid, 'prev'); ?>

					<a href="<?php print $base_url; ?>/portfolio?layout=default&style=masonry3colsspace" class="dashboard"><i class="fa fa-th"></i></a>

					<?php print single_navigation($node->type, $node->nid, 'next'); ?>

				</div>

			</div>

			<div class="row text-upercase">

				<div class="col-xs-12 text-center">

					<h2><?php print $node->title; ?></h2>

					<p><?php print t('IN'); ?> <?php print $node->field_portfolio_category['und'][0]['taxonomy_term']->name; ?></p>

				</div>

			</div>

		<?php endif; ?>

		</div>

		<?php if ($page['content']): ?>

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

		<?php endif; ?>

	<?php endif; ?>	

	</section>

<?php if($page['bottom_portfolio']): ?>

	<aside class="port-aside bg-grey dark-bottom-border padding-top-100 padding-bottom-90">

		<?php print render ($page['bottom_portfolio']); ?>

	</aside>

<?php endif; ?>

</main>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>
<?php

	$header_layout = theme_get_setting('shop_header_layout', 'fakre');

	$class_header = theme_get_setting('shop_header_class', 'fakre');

	$shop_slogan = theme_get_setting('shop_slogan', 'fakre');

	$footer_layout = theme_get_setting('shop_footer_layout', 'fakre');

	$footer_class = theme_get_setting('shop_footer_class', 'fakre');

	$footer_bg = theme_get_setting('shop_footer_background','fakre');

	if(!empty($footer_bg)) {

		$footer_bg = file_create_url(file_load($footer_bg)->uri);

	} else $footer_bg = '';

	$page_title_size = theme_get_setting('shop_page_title_size', 'fakre');

	if(empty($page_title_size)) $page_title_size = 'small';

	$page_title_style = theme_get_setting('shop_page_title_style','fakre');

	if(empty($page_title_style)) $page_title_style = 'greybg';

	$shop_page_title_bg = theme_get_setting('shop_background_breadcrumb','fakre');

	if (!empty($shop_page_title_bg)) {

		$page_title_background = file_create_url(file_load($shop_page_title_bg)->uri);

	}

	if($page_title_size =='default') {

		$page_banner_class = '';

	} elseif(!empty($shop_slogan)) {

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



?>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php'); ?>

<!-- contain main informative part of the site -->

<main id="main" role="main">

	<!-- page banner  -->

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

						<?php if(!empty($shop_slogan)): ?>

						<p><?php print $shop_slogan; ?></p>

						<?php endif; ?>

					</div>

					<?php if($breadcrumb): ?>

						<?php print $breadcrumb; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</header>

	<section class="contact-block shop container">

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

	<?php endif; ?>

	<?php if($page['related_products']): ?>

		<div class="row related-shop">
			<?php print render($page['related_products']); ?>
		</div>

	<?php endif; ?>

	</section>

</main>
<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>
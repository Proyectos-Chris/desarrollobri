<?php
if(drupal_is_front_page()){
          unset($page['content']['system_main']);
        }

	if (isset($node->field_background_image) && !empty($node->field_background_image)) {

		$bg_uri = $node->field_background_image['und'][0]['uri'];

		$background = file_create_url($bg_uri);

	} else $background = '';

	if(isset($node->field_page_tite_size) && !empty($node->field_page_tite_size)) {

		$page_title_size = $node->field_page_tite_size['und'][0]['value'];

	} else $page_title_size = 'small';

	if(isset($node->field_page_title_style) && !empty($node->field_page_title_style)) {

		$page_title_style = $node->field_page_title_style['und'][0]['value'];

	} else $page_title_style = 'greybg';

	if(isset($node->field_page_slogan) && !empty($node->field_page_slogan)) {

		$page_slogan = $node->field_page_slogan['und'][0]['value'];

	} else $page_slogan = '';

	if($page_title_size =='default') {

		$page_banner_class = '';

	} elseif(!empty($page_slogan)) {

		$page_banner_class = 'style2';

	} else $page_banner_class = 'small';

	if ($page_title_style == 'rightalign' && empty($background)) {

		$page_banner_class .= ' grey rightalign';

	} elseif ($page_title_style == 'rightalign' && !empty($background)) {

		$page_banner_class .= ' rightalign';

	} elseif ($page_title_style == 'centeralign' && empty($background)) {

		$page_banner_class .= ' grey center';

	} elseif ($page_title_style == 'centeralign' && !empty($background)) {

		$page_banner_class .= ' center';

	} elseif ($page_title_style == 'pattern') {

		$page_banner_class .= ' pattern';

	} elseif ($page_title_style == 'greybg' || $page_title_style == 'leftalign' && empty($background)) {

		$page_banner_class .= ' grey';

	} elseif ($page_title_style == 'darkbg') {

		$page_banner_class .= ' dark dark-bottom-border';

	}

	if (isset($node->field_header_layout) && !empty($node->field_header_layout)) {

		$header_layout = $node->field_header_layout['und'][0]['value'];

	} else $header_layout = theme_get_setting('header_layout', 'fakre');

	if (empty($header_layout)) {
		$header_layout = 'header1';
	}
	
	if (isset($node->field_header_class) && !empty($node->field_header_class)) {

		$class_header = $node->field_header_class['und'][0]['value'];

	} else $class_header = theme_get_setting('header_class', 'fakre');

	if (empty($class_header)) $class_header = '';
	if (($page_title_style == 'greybg') || ($page_title_style == 'rightalign' || $page_title_style == 'lefttalign' || $page_title_style == 'centeralign' || $page_title_style == 'darkbg' && ($page_title_size == 'small' || empty($background)))) {
			$header_layout == 'header4';
			$class_header = 'style5';
	}
	if (isset($node->field_page_layout) && !empty($node->field_page_layout)) {

		$page_layout = $node->field_page_layout['und'][0]['value'];

	} elseif (isset($node)) {
		$page_layout = 'fullwidth';
	} else $page_layout = 'default';

?>



<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');?>



<!-- contain main informative part of the site -->

<main id="main" role="main">

	<!-- page banner  -->

	<header class="page-banner <?php print $page_banner_class; ?>" <?php if(!empty($background) && $page_title_style == 'pattern') print 'style="background-image:url('.$background.');"'; ?>>

	<?php if(!empty($background) && $page_title_style != 'greybg' && $page_title_style != 'darkbg' && $page_title_style != 'parallax' && $page_title_style != 'pattern'): ?>

		<div class="stretch">

			<img alt="<?php print $site_name; ?>" src="<?php print $background; ?>">

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

		<?php if(!empty($background) && $page_title_style == 'parallax'): ?>

		<div class="parallax-holder">

			<div class="parallax-frame">

				<img src="<?php print $background; ?>" alt="<?php print $site_name; ?>">

			</div>

		</div>

		<?php endif; ?>

	</header>

<?php if(arg(0) == 'node' && $page_layout == 'default'): ?>

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

	<?php endif; ?>

<?php elseif (arg(0) == 'node' && $page_layout == 'wide'): ?>

	<div class="container-fluid padding-bottom-100 padding-top-100">

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

<?php elseif (arg(0) == 'node' && $page_layout == 'fullwidth'): ?>

	<div class="container padding-bottom-100 padding-top-100">

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

<?php elseif (arg(0) == 'node' && $page_layout == 'leftsidebar'): ?>

	<div class="container padding-bottom-100 padding-top-100">

		<div class="row">

		<?php if ($page['content']): ?>

			<div class="col-xs-12 col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

			</div>

		<?php endif; ?>

		<?php if ($page['sidebar_first']): ?>

			<aside class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

				<?php print render($page['sidebar_first']); ?>

			</aside>

		<?php endif; ?>

		</div>

	</div>

<?php elseif (arg(0) == 'node' && $page_layout == 'rightsidebar'): ?>

	<div class="container padding-bottom-100 padding-top-100">

		<div class="row">

		<?php if ($page['content']): ?>

			<div class="col-xs-12 col-sm-8 col-md-9">

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

			</div>

		<?php endif; ?>

		<?php if ($page['sidebar_second']): ?>

			<aside class="col-xs-12 col-sm-4 col-md-3">

				<?php print render($page['sidebar_second']); ?>

			</aside>

		<?php endif; ?>

		</div>

	</div>

<?php elseif (arg(0) == 'node' && $page_layout == 'bothsidebar'): ?>

	<div class="container padding-bottom-100 padding-top-100">

		<div class="row">

		<?php if ($page['content']): ?>

			<div class="col-xs-12 col-md-6 col-md-push-3">

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

			</div>

		<?php endif; ?>

		<?php if ($page['sidebar_first']): ?>

			<aside class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6">

				<?php print render($page['sidebar_first']); ?>

			</aside>

		<?php endif; ?>

		<?php if ($page['sidebar_second']): ?>

			<aside class="col-xs-12 col-sm-6 col-md-3 ">

				<?php print render($page['sidebar_second']); ?>

			</aside>

		<?php endif; ?>

		</div>

	</div>

<?php elseif (arg(0) == 'node' && $page_layout == 'sidenav'): ?>

	<div class="container padding-bottom-100 padding-top-100">

		<div class="row">

		<?php if ($page['content']): ?>

			<div class="col-xs-12 col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">
				<?php
					if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
					print render($tabs);
					endif;
					print $messages;
				?>
				<!-- tab content -->

				<div class="tab-content">

					<?php print render($page['content']); ?>

				</div>

			</div>

		<?php endif; ?>

		<?php if ($page['sidebar_first']): ?>

			<aside class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

				<?php print render($page['sidebar_first']); ?>

			</aside>

		<?php endif; ?>

		</div>

	</div>

<?php else: ?>

	<div class="container padding-top-100 padding-bottom-100 page-system">

	<?php if ($page['content']): ?>

		<div class="row">

			<div class="col-xs-12">

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

			<?php print render($page['content']); ?>

			</div>

		</div>

	</div>

	<?php endif; ?>

<?php endif; ?>

	<?php if ($page['section']): ?>

		<?php print render($page['section']); ?>

	<?php endif; ?>

</main>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>
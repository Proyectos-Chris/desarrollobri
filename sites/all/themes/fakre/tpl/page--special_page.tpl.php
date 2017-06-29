<?php

	if (!empty($node->field_page_style)) {

		$page_style = $node->field_page_style['und'][0]['value'];

	} else $page_style = '';

	if($page_style == 'blank') {

		$main_class = 'padding-top-60';

	} elseif ($page_style == 'christmasv1' || $page_style == 'christmasv2') {

		$main_class = 'win-height';

	} elseif ($page_style == 'christmasv3') {

		$main_class = 'christmasv3';

	} elseif($page_style == 'christmasv4') {

		$main_class = 'win-height christmasv4';

	} elseif ($page_style == 'comingsoon1') {

		$main_class = 'comingsoon1';

	} elseif ($page_style == 'comingsoon2') {

		$main_class = 'comingsoon2';

	} elseif ($page_style == 'comingsoon3') {

		$main_class = 'comingsoon3';

	} elseif ($page_style == 'comingsoon4') {

		$main_class = 'comingsoon4';

	} else $main_class = '';

	if (!empty($node->field_header_layout)) {

		$header_layout = $node->field_header_layout['und'][0]['value'];

	} else $header_layout = 'disable';

	if (!empty($node->field_footer_layout)) {

		$footer_layout = $node->field_footer_layout['und'][0]['value'];

	} else $footer_layout = 'disable';

	if(isset($node->field_page_title_style) && !empty($node->field_page_title_style)) {

		$page_title_style = $node->field_page_title_style['und'][0]['value'];

	} else $page_title_style = 'disable';

	if(isset($node->field_page_slogan) && !empty($node->field_page_slogan)) {

		$page_slogan = $node->field_page_slogan['und'][0]['value'];

	} else $page_slogan = '';

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

	if (isset($node->field_background_image) && !empty($node->field_background_image)) {

		$bg_uri = $node->field_background_image['und'][0]['uri'];

		$background = file_create_url($bg_uri);

	} else $background = '';

	$footer_copyright = theme_get_setting('footer_copyright_message', 'fakre');

?>

<?php if($header_layout != 'disable'): ?>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');?>

<?php endif; ?>

<?php if ($page['slider']): ?>

	<?php print render($page['slider']); ?>

<?php endif; ?>

<!-- contain main informative part of the site -->

<main id="main" role="main" class="<?php print $main_class; ?>">

<?php if($page_title_style != 'disable' ): ?>

	<header class="page-banner <?php print $page_banner_class; ?>">

	<?php if(!empty($background) && $page_title_style == 'imagebg'): ?>

		<div class="stretch">

			<img alt="image description" src="<?php print $background; ?>">

		</div>

	<?php endif; ?>

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<div class="holder">

						<h1 class="heading"><?php print drupal_get_title(); ?></h1>

						<p><?php print $page_slogan; ?></p>

					</div>

					<ul class="breadcrumbs list-inline">

						<li><a href="#">HOME</a></li>

						<li class="active"><a href="#">404</a></li>

					</ul>

				</div>

			</div>

		</div>

	</header>

<?php endif; ?>

<?php if ($page_style == 'blank' || empty($page_style)): ?>

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

	<?php endif; ?>

<?php elseif ($page_style == 'comingsoon1'): ?>

	<section class="error-section text-center style3 win-height">

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

<?php elseif ($page_style == 'comingsoon2'): ?>

	<section class="error-section text-center style4 win-height">

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

<?php elseif ($page_style == 'comingsoon3'): ?>

	<section class="error-section text-center style5">

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

<?php elseif ($page_style == 'comingsoon4'): ?>

	<section class="error-section text-center style7 win-height">

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

<?php elseif ($page_style == '404style1'): ?>

	<section class="error-section text-center win-height">

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

<?php elseif ($page_style == '404style2'): ?>

	<div class="container lost-block">

		<div class="row">

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

	</div>

<?php elseif ($page_style == '404style3'): ?>

	<section class="error-section text-center style2 win-height">

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

<?php elseif ($page_style == '404style4'): ?>

	<section class="error-section text-center win-height no-bg style6 page-404">

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

<?php elseif ($page_style == 'christmasv1' || $page_style == 'christmasv2' || $page_style == 'christmasv4'): ?>

	<!-- Let it snow! -->

	<canvas id="xmas"></canvas>

	<?php if ($page['content']): ?>

		<?php

			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

			print render($tabs);

			endif;

			print $messages;

		?>

		<?php print render($page['content']); ?>

	<?php endif; ?>

<?php else: ?>

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

	<?php if ($page['section']): ?>

		<?php print render($page['section']); ?>

	<?php endif; ?>

</main>

<!-- footer of the page -->

<?php if($page_style == 'christmasv1' || $page_style == 'christmasv2' || $page_style == 'christmasv4'): ?>

	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>

	<footer id="footer" class="xmas">

		<!-- footer bottom -->

		<div class="footer-bottom">

			<div class="container">

				<div class="row">

					<div class="col-xs-12">

						<div class="bottom-box1">

							<?php print render($page['footer_bottom']); ?>

							<?php if(!empty($footer_copyright)): ?>

							<span class="copyright"><?php print $footer_copyright; ?></span>

							<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</footer>

	<?php endif; ?>

	<?php if($page_style == 'christmasv1'): ?>

		<script src="<?php print base_path().path_to_theme(); ?>/js/snow1.js"></script>

	<?php else: ?>

		<script src="<?php print base_path().path_to_theme(); ?>/js/snow2.js"></script>

	<?php endif; ?>

<?php elseif($footer_layout != 'disable'): ?>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>

<?php endif; ?>
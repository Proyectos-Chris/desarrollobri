<?php
	if (isset($node->field_background_image) && !empty($node->field_background_image)) {
		$bg_uri = $node->field_background_image['und'][0]['uri'];
		$background = file_create_url($bg_uri);
	} else $background = '';
	if (isset($node->field_header_layout) && !empty($node->field_header_layout)) {
		$header_layout = $node->field_header_layout['und'][0]['value'];
	} else $header_layout = theme_get_setting('header_layout', 'fakre');
	if (empty($header_layout)) $header_layout = 'header1';
	if (isset($node->field_header_class) && !empty($node->field_header_class)) {
		$class_header = $node->field_header_class['und'][0]['value'];
	} else $class_header = theme_get_setting('header_class', 'fakre');
	if (empty($class_header)) $class_header = '';
	if(isset($node->field_page_slogan) && !empty($node->field_page_slogan)) {
		$page_slogan = $node->field_page_slogan['und'][0]['value'];
	} else $page_slogan = '';
	if(isset($node->field_page_tite_size) && !empty($node->field_page_tite_size)) {
		$page_title_size = $node->field_page_tite_size['und'][0]['value'];
	} else $page_title_size = 'default';
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
?>
<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');?>
<!-- contain main informative part of the site -->
<main id="main" role="main">
	<!-- page banner  -->
	<header class="page-banner <?php print $page_banner_class; ?>">
	<?php if(!empty($background) && ($page_title_style != 'greybg' || $page_title_style != 'darkbg' || $page_title_style != 'videobg')): ?>
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
	<?php if ($page['content']): ?>
	<section class="whatwedo-section container style3 padding-top-90 padding-bottom-60">
		<div class="row">
		<?php
			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
			endif;
			print $messages;
		?>
		<?php print render($page['content']); ?>
		</div>
	</section>
	<?php endif; ?>
	<?php if ($page['section']): ?>
		<?php print render($page['section']); ?>
	<?php endif; ?>
</main>
<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>
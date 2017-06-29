<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<div class="container">
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="row">
		<?php print $rows; ?>
	</div>
<div class="row text-center padding-top-30">
	<a href="<?php print $base_url; ?>/blog" class="btn btn-dark"><?php print t('VIEW  ALL'); ?></a>
</div>
<?php endif; ?>
</div>
<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<div class="container">
<?php if ($header): ?>
	<header class="page-heading text-capitalize">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="holder" id="masonry-container">
				<?php print $rows; ?>
			</div>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-xs-12">
			<a href="shortcode-galleries.html" class="btn btn-dark"><?php print t('VIEW ALL') ?></a>
		</div>
	</div>
<?php endif; ?>
</div>
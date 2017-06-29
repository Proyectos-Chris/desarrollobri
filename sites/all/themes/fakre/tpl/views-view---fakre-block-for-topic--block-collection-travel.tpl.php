<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<?php if ($header): ?>
<header class="page-heading small">
    <div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<div class="row">
	<?php print $rows; ?>
	<?php if ($attachment_before): ?>
	<div class="col-sm-8 col-xs-12">
		<div class="row ">
			<?php print $attachment_before; ?>
		</div>
		<?php if ($attachment_after): ?>
		<div class="row ">
			<?php print $attachment_after; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<div class="row text-center padding-top-60 padding-bottom-60">
	<div class="col-xs-12">
		<a class="btn btn-dark" href="<?php print $base_url; ?>/tags/travel"><?php print t('VIEW ALL DESTINATIONS') ?></a>
	</div>
</div>
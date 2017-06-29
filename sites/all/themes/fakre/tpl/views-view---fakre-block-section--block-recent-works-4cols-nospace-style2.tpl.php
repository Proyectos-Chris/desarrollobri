<?php global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading margin-bottom-60">
	<?php print $header; ?>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<div class="icotop-holder padding-bottom-60">
	<?php print $rows; ?>
</div>
<?php endif; ?>
<div class="row text-center">
	<a class="btn btn-resume" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW  ALL') ?></a>
</div>
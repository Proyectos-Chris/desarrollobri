<?php print render($title_prefix); ?>
<?php
	global $base_url;
?>
<?php if ($header): ?>
<header class="page-heading">
	<?php print $header; ?>
</header>
<?php endif; ?>

<?php if ($rows): ?>
<div class="margin-bottom-60 icotop-holder">
	<?php print $rows; ?>
	<?php if ($attachment_after): ?>
      	<?php print $attachment_after; ?>
  	<?php endif; ?>
</div>
<div class="row text-center">
	<a class="btn btn-dark" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW OUR PORTFOLIO'); ?></a>
</div>
<?php endif; ?>

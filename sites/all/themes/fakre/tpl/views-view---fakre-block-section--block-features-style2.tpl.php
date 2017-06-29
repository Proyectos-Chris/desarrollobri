<?php print render($title_prefix); ?>
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
</div>
<?php endif; ?>
<?php if ($footer): ?>
<div class="row" data-animate="fadeInUp" data-delay="300">
	<?php print $footer; ?>
</div>
<?php endif; ?>
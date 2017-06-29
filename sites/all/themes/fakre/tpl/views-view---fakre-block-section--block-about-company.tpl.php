<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading style2">
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
<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<?php if ($header): ?>
<header class="page-heading color-stack style2">
	<div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<!-- beans stepslider -->
<div class="beans-stepslider" data-rotate="true">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<div class="beans-pagination">
		<!-- pagination generated here -->
	</div>
</div>
<?php endif; ?>
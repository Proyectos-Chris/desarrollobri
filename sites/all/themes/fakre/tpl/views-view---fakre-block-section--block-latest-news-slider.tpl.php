<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading small">
    <div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<!-- beans-stepslider -->
<div data-rotate="true" class="beans-stepslider">
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
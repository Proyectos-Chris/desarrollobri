<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="beans-slider">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<div class="beans-pagination"></div>
</div>
<?php endif; ?>
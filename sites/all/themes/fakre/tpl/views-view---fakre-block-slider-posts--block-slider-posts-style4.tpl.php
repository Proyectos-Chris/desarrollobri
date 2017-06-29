<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="main-slider beans-slider style3" data-rotate="truee">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<div class="beans-pagination"></div>
</div>
<?php endif; ?>

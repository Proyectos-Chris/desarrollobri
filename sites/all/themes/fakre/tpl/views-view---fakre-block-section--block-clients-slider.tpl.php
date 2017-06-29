<?php print render($title_prefix); ?>
<div class="container">	
	<?php if ($rows): ?>
	<div class="beans-stepslider" data-rotate="true">
		<div class="beans-mask">
			<div class="beans-slideset">
				<?php print $rows; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
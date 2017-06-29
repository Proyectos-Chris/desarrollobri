<?php print render($title_prefix); ?>
<div class="container">	
	<?php if ($rows): ?>
	<div class="beans-stepslider padding-top-60" data-rotate="true">
		<div class="beans-mask">
			<div class="beans-slideset">
				<?php print $rows; ?>
			</div>
		</div>
		<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
		<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
	</div>
	<?php endif; ?>
</div>
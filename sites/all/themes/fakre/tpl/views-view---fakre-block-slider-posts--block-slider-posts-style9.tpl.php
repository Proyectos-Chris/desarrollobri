<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<!-- mainslider -->
<div class="travel-slider beans-slider" data-rotate="true">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
	<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
</div>
<?php endif; ?>
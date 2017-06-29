<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<!-- mainslider -->
<div class="main-slider beans-slider style2" data-rotate="true">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
	<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
	<div class="beans-pagination"></div>
</div>
<?php endif; ?>
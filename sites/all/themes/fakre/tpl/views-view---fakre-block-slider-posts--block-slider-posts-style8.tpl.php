<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<!-- mainslider -->
<div class="beans-fadeslider croporate-slider style4 win-height">
	<div class="slideset">
		<?php print $rows; ?>
	</div>
	<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
	<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
	<div class="beans-pagination"></div>
</div>
<?php endif; ?>
<?php if($rows): ?>
<div data-rotate="true" class="shop-gallery beans-slider fitness">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
	<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
</div>
<?php endif; ?>
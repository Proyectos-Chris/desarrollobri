<?php if($rows): ?>
	<div class="beans-stepslider">
		<div class="beans-mask">
			<div class="beans-slideset">
			<?php
				$rows = trim(str_replace('<article class="new-product first">', '</div><div class="beans-slide"><article class="new-product">', $rows));
				$rows = substr($rows, 6);
				$rows = str_replace('$', '<sub>$</sub>', $rows);
				$rows = str_replace('Add to cart', '[ Add to cart ]', $rows);
				print $rows;
			?>
			</div>
		</div>
		<div class="bottons-box">
			<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i></a>
			<a href="#" class="btn-prev"><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
<?php endif; ?>
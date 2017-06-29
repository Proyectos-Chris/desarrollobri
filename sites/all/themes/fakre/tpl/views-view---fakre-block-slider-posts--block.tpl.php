<?php print render($title_prefix); ?>
<?php if ($rows): ?>
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i></a>
	<a href="#" class="btn-next"><i class="fa fa-angle-right"></i></a>
<?php endif; ?>
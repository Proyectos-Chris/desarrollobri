<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<!-- beans-fadeslider -->
<div class="beans-fadeslider win-height">
	<div class="slideset">
		<?php print $rows; ?>
	</div>
	<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
	<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
	<div class="beans-pagination">
		<!-- pagination generated here -->
	</div>
</div>
<?php endif; ?>
<?php if ($footer): ?>
<div class="container">
	<div class="row">
		<?php print $footer ?>
	</div>
</div>
<?php endif; ?>
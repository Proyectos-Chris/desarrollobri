<?php print render($title_prefix); ?>
<div class="container">
	<?php if ($header): ?>
	<header class="page-heading text-capitalize">
		<?php print $header; ?>
	</header>
	<?php endif; ?>
	<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12">
			<?php print $rows; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
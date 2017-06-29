<?php print render($title_prefix); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php if ($header): ?>
			<header class="page-heading">
				<?php print $header; ?>
			</header>
		<?php endif; ?>
		<?php if ($rows): ?>
			<?php print $rows; ?>
		<?php endif; ?>
		</div>
	</div>
</div>
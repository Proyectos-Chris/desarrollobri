<?php print render($title_prefix); ?>
<div class="container">
	<?php if ($header): ?>
	<header class="page-heading text-capitalize">
		<?php print $header; ?>
	</header>
	<?php endif; ?>
	<?php if ($rows): ?>
	<div class="row">
		<?php print $rows; ?>
	</div>
	<?php endif; ?>
</div>
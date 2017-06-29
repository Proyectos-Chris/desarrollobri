<?php print render($title_prefix); ?>
<div class="work-section">
	<?php if ($header): ?>
	<header class="page-heading text-capitalize">
		<?php print $header; ?>
	</header>
	<?php endif; ?>
	<?php if ($rows): ?>
		<?php print $rows; ?>
	<?php endif; ?>
</div>